<?php

namespace App\Http\Controllers\Admin;

use App\Story;
use App\User;
use App\Visitor;
use Carbon\Carbon;
use Charts;
use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use Validator;


class SuccessController extends BaseController
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    // Show all Success Story
    public function index()
    {
    	$successstories  = Story::Orderby('created_at','=','desc')->get();
      return view('admin.custom.successstory.successstory',compact('successstories'));
    }

    // Show Success Story
    public function show($id)
    {
      $successstory  = Story::find($id);
      return view('admin.custom.successstory.viewsuccessstory',compact(['successstory','id']));
    }

    // Show Add Success Story page
    public function add()
    {
      return view('admin.custom.successstory.addsuccessstory');
    }

    // Add Success Story
    public function create(Request $request)
    {
      // Validation
      $data = Input::all();                 
      $rules=array(
        'title' => 'required',
        'image' => 'required', 
        'description' => 'required'
      );
      $valid=Validator::make($data,$rules);
      if($valid->fails()){
        return Redirect()->back()->withErrors($valid)->withInput($request->all);
      }

      $story = new Story();
      $story->title = $request->title;
      $story->description = $request->description;
      
      $file = Input::file('image');
      $destinationPath = 'stories';
      $image = $file->getClientOriginalName();
      $upload_success = $file->move($destinationPath, $image);
      $story->image = $upload_success; 


      $story->save();

      return redirect('/matchup/success-story');

    }


    // Show Edit Success Story page
    public function edit($id)
    {
      $successstory = Story::find($id);
      return view('admin.custom.successstory.editsuccessstory',compact(['successstory','id']));
    }


    // Update Success Story
    public function update(Request $request,$id)
    {
      // Validation
      $data = Input::all();                 
      $rules=array(
        'title' => 'required',
        'description' => 'required'
      );
      $valid=Validator::make($data,$rules);
      if($valid->fails()){
        return Redirect()->back()->withErrors($valid)->withInput($request->all);
      }

      $story = Story::find($id);
      $story->title = $request->title;
      $story->description = $request->description;
      
      if ($request->image != null) {
        $file = Input::file('image');
        $destinationPath = 'stories';
        $image = $file->getClientOriginalName();
        $upload_success = $file->move($destinationPath, $image);
        $story->image = $upload_success; 
      }


      $story->save();

      return redirect('/matchup/success-story');

    }

    // Delete Success Story page
    public function destroy(Request $request)
    {
      $successstory = Story::find($request->id);
      $successstory->delete();

      return Response()->json(200);
    }

    // Search Success Story
    public function search(Request $request)
    {
       $search = $request->value;

       if ($search == null) {
          $data = DB::table('stories')
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(created_at, "%d %b %Y") as created_at'))
          ->get(); 
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }
      else{
          $data = DB::table('stories')
          ->where('title','LIKE',"%{$search}%")
          ->orderBy('created_at', 'desc')
          ->select('*',DB::raw('DATE_FORMAT(created_at, "%d %b %Y") as created_at'))
          ->get();
          $data = $data->unique('id');
          $data = array_slice($data->values()->all(), 0,50,true);
      }

      return response ()->json(array('data' => $data));
    }

}

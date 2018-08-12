<?php

namespace App\Http\Controllers\Admin;

use App\Charts\AdminChart;
use App\Charts\VisitorChart;
use App\Project;
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


class IndexController extends BaseController
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {

        $visiotr = DB::table('visitlogs')->count();
        $admin = DB::table('admins')->count();
        $user = DB::table('users')->count();
        $paid = DB::table('userinfos')->where('user_level','!=','Registered')->count();


        // Visitor Chart
        $now = date('Y-m-d h:m:s ' , strtotime('-7 days'));
        $items = array();
        $totals = array();
        $j=DB::table('visitlogs')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
        ->where('created_at','>=', $now)
        ->groupBy('date')
        ->get();
        $result = count($j);
        for ($i=0; $i <$result; $i++) { 
            $items[$i]=$j[$i]->date;
            $totals[$i]=$j[$i]->views;
        }
        $visiotrchart = new AdminChart;
        $visiotrchart->dataset('Visitor', 'Line', $totals)->options(['backgroundColor' => '#799797']);
        $visiotrchart->labels($items);
        $visiotrchart->width('1400');
        $visiotrchart->height('300');


    
        // User Level
        $userlevels = DB::table('userinfos')
                ->where('user_level','!=','Registered')
                ->select('user_level', DB::raw('count(*) as total'))
                ->groupBy('user_level')
                ->get();


        for ($i=0; $i <count($userlevels); $i++) { 
            $user_level[$i]=$userlevels[$i]->user_level;
            $totallevel[$i]=$userlevels[$i]->total;
        }

        $userlevel = new AdminChart;
        $userlevel->dataset('User Level', 'bar', $totallevel)->options(['backgroundColor' => ['#C0C0C0','#cd7f32','#FFD700','#e5e4e2','#91165B']]);;
        $userlevel->labels($user_level);
        $userlevel->width('1400');
        $userlevel->height('300');





        // User by Division
        $userinfos = DB::table('userinfos')
                ->where('division','!=',null)
                ->select('division', DB::raw('count(*) as total'))
                ->groupBy('division')
                ->get();

        for ($i=0; $i <count($userinfos); $i++) { 
            $division[$i]=$userinfos[$i]->division;
            $totaldivision[$i]=$userinfos[$i]->total;
        }

        $divisions = new AdminChart;
        $divisions->dataset('Division', 'doughnut', $totaldivision)->options(['backgroundColor' => ['#8B0000','#FF8C00','#FF1493','#228B22','#ADFF2F','#ff0040','#4d78d3','#000040']]);;
        $divisions->labels($division);
        $divisions->width('1400');
        $divisions->height('300');




        return view('admin.index',compact(['visiotr','admin','user','paid','visiotrchart','userlevel','divisions']));
    }

}

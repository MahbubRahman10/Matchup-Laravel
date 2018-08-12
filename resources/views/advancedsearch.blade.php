@extends('layouts.master')

@section('content')
<style type="text/css">
header{
  padding-top: 40px;
}
</style>


<!-- Advanced search starts -->
  
  <div class="container">
    
    <div class="container search_bottom_pd search_panel">
    <form id="advancedsearch" name="quicksearch" action="/searchs/profile" method="get" autocomplete="off" class="">
      <div class="container_inner">
        <div class="">
          <div class="col-md-3">
            <div class="container_drop_txt">I'm looking for a</div>

            <select name="gender" id="gender" class="form-control form_dropdown" onchange="toggleAgeByGender(this)">
              <option value="Female" label="Woman" selected="selected">Woman</option>
              <option value="Male" label="Man">Man</option>
            </select>   
      </div>

      <div class="col-md-3">
        <div class="search_pannel_agg_wrap search_bottom_pd lets-dropdown-right">
            <div class="container_drop_txt">Age From</div>
            <div class="age_wrap">
              <div class="white_txt pull-left">

                <!-- <input type="text" name="agefrom" id="agefrom" class="form-control form_dropdown search_pannel_age" placeholder="18"> -->

                <select name="agefrom" id="agefrom" class="form-control form_dropdown search_pannel_age">
                  <option value="18" label="18" selected="selected">18</option>
                  <?php 
                  for ($i=19; $i <=70 ; $i++) { 
                    echo "<option  value=".$i." label=".$i.">".$i."</option>";
                  }
                  ?>

                </select>       
              </div>

              <div class="search_pannel_to">To</div>
              <div class="pull-left">

                <!-- <input type="text" name="ageto" id="ageto" class="form-control form_dropdown search_pannel_age" placeholder="25"> -->
                <select name="ageto" id="ageto" class="form-control form_dropdown search_pannel_age">

                  <option value="25" label="25" selected="selected">25</option>
                  <?php 
                  for ($i=26; $i <=70 ; $i++) { 
                    echo "<option  value=".$i." label=".$i.">".$i."</option>";
                  }
                  ?>
                </select>       
              </div>
            </div>
          </div>
      </div>

          <div class="col-md-3">
            <div class="container_drop_txt">Division</div>

            <select name="city" id="frm-city" class="form-control form_dropdown search_pannel_religion" style="width: 150px;">
              <option value="All" label="All">All</option>
              <option value="Barishal" label="Barishal">Barishal</option>
              <option value="Chattagram" label="Chattagram">Chattagram</option>
              <option value="Dhaka" label="Dhaka">Dhaka</option>
              <option value="Khulna" label="Khulna">Khulna</option>
              <option value="Mymensingh" label="Mymensingh">Mymensingh</option>
              <option value="Rangpur" label="Rangpur">Rangpur</option>
              <option value="Rajshahi" label="Rajshahi">Rajshahi</option>
              <option value="Sylhet" label="Sylhet">Sylhet</option>
            </select>
                    
          </div>

          <div class="col-md-3"> 
            <div class="container_drop_txt">Religion</div>

            <select name="community" id="frm-community" class="form-control form_dropdown search_pannel_religion">
              <option value="" label="Select" selected="selected">Select</option>

              <option value="Islam" label="Islam">Islam</option>
              <option value="Hinduism" label="Hinduism">Hinduism</option>
              <option value="Christian" label="Christian">Christian</option>
              <option value="Buddhist" label="Buddhist">Buddhist</option>
              <option value="Other" label="Other">Other</option>
            </select> 
          </div>


          <div class="col-md-3">
            <div class="container_drop_txt">Marital Status</div>

            <select name="maritalstatus" id="frm-maritalstatus" class="form-control form_dropdown search_pannel_mt">
              <option value="" label="Select" selected="selected">Select</option>
              <option value="Unmarried" label="Unmarried">Unmarried</option>
              <option value="Divorced" label="Divorced">Divorced</option>
              <option value="Widowed" label="Widowed">Widowed</option>
              <option value="Separated" label="Separated">Separated</option>
            </select>

          </div>

          <div class="col-md-3">
            

            <div class="container_drop_txt">Blood Group</div>

            <select name="blood_group" id="frm-blood_group" class="form-control form_dropdown search_pannel_mt">
              <option value="" label="Select" selected="selected">Select</option>
              <option value="A+" label="A+">A+</option>
              <option value="A-" label="A-">A-</option>
              <option value="B+" label="B+">B+</option>
              <option value="B-" label="B-">B-</option>
              <option value="AB+" label="AB+">AB+</option>
              <option value="AB-" label="AB-">AB-</option>
              <option value="O+" label="O+">O+</option>
              <option value="O-" label="O-">O-</option>
            </select>
          </div>

          <div class="col-md-3">
            <div class="container_drop_txt">Body Type</div>

            <select name="body_type" id="frm-body_type" class="form-control form_dropdown search_pannel_mt">
              <option value="" label="Select" selected="selected">Select</option>
              <option value="Slim" label="Slim">Slim</option>
              <option value="Average" label="Average">Average</option>
              <option value="Fat" label="Fat">Fat</option>
              <option value="Any" label="Any">Any</option>
            </select>

          </div>

          <div class="col-md-3">
            
            <div class="container_drop_txt">Family Values</div>

            <select name="family_values" id="frm-family_values" class="form-control form_dropdown search_pannel_mt">
              <option value="" label="Select" selected="selected">Select</option>
              <option value="Religious" label="Religious">Religious</option>
              <option value="Traditional" label="Traditional">Traditional</option>
              <option value="Moderate" label="Moderate">Moderate</option>
            </select>

          </div>

          <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="search_pannel_lets waves-effect waves-light touch-feedback">Search
            </button>
          </div>
        </div>
      </div>
    </div>






  </div>

  </div>



@endsection





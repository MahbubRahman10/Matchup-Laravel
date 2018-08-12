@extends('layouts.master')

<style type="text/css">
	
			.mySlides {display:none;}
		
</style>

@section('content')

 <section id="newsletter">
		 <div class="banner-top">
			<section id="showcase">
				<div class="container">
				<h1> #1 Bangladeshi Matrimonial Website</h1>
			</div>
	</section>	

		</div>
	</section>

	 <!-- <section id="newsletter">
		 <div class="container"> -->
				<!-- <div class="w3-content w3-section" >
		  			
		  			<img class="mySlides" src="img/banner2.jpg" style="width:100%">
		  			<img class="mySlides" src="img/banner4.jpg" style="width:100%">
		  			<img class="mySlides" src="img/banner5.jpg" style="width:100%">
		  			<img class="mySlides" src="img/banner3.jpg" style="width:100%">
		  			<img class="mySlides" src="img/banner6.jpg" style="width:100%">
		  			<img class="mySlides" src="img/banner1.jpg" style="width:100%">
		  			
			</div>
		</div>
	</section>

	<script>
		var myIndex = 0;
		carousel();

	function carousel() {
    	var i;
    	var x = document.getElementsByClassName("mySlides");
    	for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    	}
    	myIndex++;
    	if (myIndex > x.length) {myIndex = 1}    
    	x[myIndex-1].style.display = "block";  
    	setTimeout(carousel, 2000); // Change image every 2 seconds
		}
	</script> -->

 	<!-- <section id="showcase">
		<div class="container">
			<h1> #1 Bangladeshi Matrimonial Website</h1>
		</div>
	</section> -->

 <!-- Guest Message -->
 <div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index"><i class="fa fa-home home_1"></i></a>
        <span class="divider">|</span>
        <li class="current-page">Regular Search</li>
     </ul>
   </div>


   <div class="col-md-9 search_left">
  <form action="" method="post">	
   <div class="form_but1">
	<label class="col-sm-5 control-lable1" for="sex">I Am Looking For : </label>
	<div class="col-sm-7 form_radios">
		  <input type="radio" class="radio_1" name="sex" value="male" <?php echo "checked";?>/> Groom 
		  <input type="radio" class="radio_1" name="sex" value="female"/> Bride
  </div>

	<div class="clearfix"> </div>
  </div>
  <div class="form_but1">
	<label class="col-sm-5 control-lable1" for="Marital Status">Marital Status : </label>
	<div class="col-sm-7 form_radios">
		<input type="checkbox" class="radio_1" name="maritalstatus" value="Single" <?php echo "checked" ?>/> Single &nbsp;&nbsp;
		<input type="checkbox" class="radio_1" name="maritalstatus" value="divorced" /> Divorced &nbsp;&nbsp;
		<input type="checkbox" class="radio_1" name="maritalstatus" value="widowed" /> Widowed &nbsp;&nbsp;
		<input type="checkbox" class="radio_1" name="maritalstatus" value="seperated"/> Separated &nbsp;&nbsp;
		<input type="checkbox" class="radio_1" name="maritalstatus" value="any" /> Any
	</div>
	<div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <!-- <label class="col-sm-5 control-lable1" for="country">Country : </label> -->
    

    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>


  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="Division">Division : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="district">
            <option value="">District</option>
            <option value="Wayanad">Wayanad</option>
            <option value="Calicut">Calicut</option>
            <option value="Malappuram">Malappuram</option> 
            <option value="Trivandrum">Trivandrum</option> 
            <option value="Kannur">Kannur</option> 
            <option value="Kasargode">Kasargode</option>
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="State">State : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="state">
            <option value="">State</option>
            <option value="Kerala">Kerala</option>
            <option value="Tamilnadu">Tamilnadu</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Madhyapradesh">Madhyapradesh</option>
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="Religion">Religion : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="religion">
            <option value="">Religion</option>
            <option value="Hindu">Hindu</option>
            <option value="Sikh">Sikh</option>
            <option value="Jain-All">Jain-All</option>
            <option value="Jain-Digambar">Jain-Digambar</option>
            <option value="Jain-Others">Jain-Others</option>
            <option value="Muslim-All">Muslim-All</option> 
            <option value="Muslim-Shia">Muslim-Shia</option> 
            <option value="Muslim-Sunni">Muslim-Sunni</option> 
            <option value="Muslim-Others">Muslim-Others</option> 
            <option value="Christian-All">Christian-All</option> 
            <option value="Christian-Catholic">Christian-Catholic</option> 
            <option value="Jewish">Jewish</option> 
            <option value="Inter-Religion">Inter-Religion</option> 
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
    <label class="col-sm-5 control-lable1" for="Mother Tongue">Mother Tongue : </label>
    <div class="col-sm-7 form_radios">
      <div class="select-block1">
        <select name="mothertounge">
            <option value="Bangla">Bangla</option>
            <option value="Malayalam">Malayalam</option>
            <option value="English">English</option>
            <option value="French">French</option>
            <option value="Telugu">Telugu</option>
            <option value="Bihari">Bihari</option>
            <option value="Hindi">Hindi</option>
            <option value="Tamil">Tamil</option> 
            <option value="Urdu">Urdu</option> 
            <option value="Manipuri">Manipuri</option> 
        </select>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="form_but1">
	<label class="col-sm-5 control-lable1" for="Age">Age : </label>
	<div class="col-sm-7 form_radios">
	  <div class="col-sm-5 input-group1">
        <input class="form-control has-dark-background" name="agemin" id="slider-name" placeholder="" type="text" required=""/>
      </div>
      
      <div class="col-sm-5 input-group1">
        <input class="form-control has-dark-background" name="agemax" id="slider-name" placeholder="" type="text" required=""/>
      </div>
      <div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
  <input type="submit" name="search" value="Search"/>
  </div>
 </form>

 </div>
  </div>
   </div>
 	

@endsection





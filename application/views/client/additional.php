<section id="accomodation" class="contact-section spad wow fadeInUp" style="padding-bottom: 50px; padding-top: -50px;">
<div class="container intro-text">
		<div class="row">
	      <div class="col-sm-6 ">
	         <div class="contact-title">
	          <div class="section-title">
	             <center><span><h4>Additional Reservation</h4></span></center>
	          </div>
	        </div>
	      </div>
	      <div class="col-sm-6 section-title">
	        <center>
	          <span id="datetime">
	          </span>
	        </center>
	      </div>
	    </div>
<input type="hidden" id="reservation_mode" name="reservation_mode" value="<?php if(isset($_SESSION["mode"])){ echo $_SESSION["mode"]; } ?>">
	<form id="additional_form" class="contact-form" method="post" enctype="multipart/form-data" validate>
		<div class="row">
			<input type="hidden" id="rs_id" name="rs_id" value="<?php echo $this->uri->segment(4); ?>">
			<input type="hidden" id="rs_parent_days" name="rs_parent_days" value="<?php if(isset($_SESSION["days"])){ echo $_SESSION["days"]; }else { redirect('Client/signout'); } ?>">
			<input type="hidden" id="e_code" name="e_code" value="<?php if(isset($_SESSION["token"])){ echo $_SESSION["token"]; }else { redirect('Client/signout'); } ?>">
			<div class="col-lg-12 col-sm-12 form-group">
	          <label for="rs_days">Number of Day/s:</label>
	          <input class="form-control" type="number" id="rs_days" name="rs_days" placeholder="No. of Day/s" min="1" max="<?php if(isset($_SESSION["days"])){ echo $_SESSION["days"]; }else { redirect('Client/signout'); } ?>" required>
	       </div>
	    </div>
	    <div id="btn-continue" class="row form-group">
            <div class="col-lg-12">
               <center><button type="submit" class="btn btn-primary"> ADD </button></center>
              </div>
          </div>
	</form>

</div>
</section>
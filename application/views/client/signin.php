<section class="contact-section spad wow fadeInUp" style="padding-bottom: 50px;">
	<div class="container intro-text">
		 <!-- SIGN UP PAGE  -->
         <div class="row">
                <div class="col-lg-6">
                    <div class="info-box">
                      <div class="contact-title">
                       <div class="section-title">
                          <h2>LOG IN FORM</h2>
                        </div>
                       </div>
                        <form id="signin_form" class="contact-form" method="post" enctype="multipart/form-data" validate>
                        <div class="row">
                            <input type="hidden" name="token" id="token" value="<?php if(isset($_SESSION["token"])){ echo $_SESSION["token"]; }else { redirect('Client/signout'); } ?>">
                            <div class="col-lg-12 form-group">
                                <input type="email" name="sign_email" placeholder="Email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  title="Please enter a valid email address." required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="password" name="sign_pass" placeholder="Password" required>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                              <button type="submit" class="btn-primary"> LOG IN </button>
                            </div>
                            <div class="col-lg-12 col-sm-12" style="padding-top: 20px;">
                              <h6><a href="#" class="text-info">Forgot Password.</a></h6>
                            </div>
                            <div class="col-lg-12 col-sm-12" style="padding-top: 20px;">
                              <h4><a href="<?php echo base_url(); ?>Client/sign_up" class="text-info">Create an Account.</a></h4>
                            </div>
                        </div>
                    </form>
                    <div class="row" style="padding-top: 20px;">
                        <div class='col-lg-12'><center>
                            <label class="alert alert-danger alert-dismissible" style="display: none;"></label>
                            </center> 
                         </div>
                     </div>
                  </div>
                </div>
                <div class="col-lg-6">
                 <?php foreach ($sectionD as $secD): ?>
                    <div class="info-box">
                        <img src="<?php echo base_url(); ?>assets/img/logo/<?php echo $secD->company_logo; ?>" alt="" style="background: rgb(0,0,0);">
                        <ul>
                            <li><?php echo $secD->company_address; ?></li>
                            <li>For reservation, <br/>please contact us at &nbsp;<br/> <b><?php echo $secD->company_no; ?></b>, &nbsp; <b><?php echo $secD->company_tel; ?></b></li>
                            <li><a class="text-info" href="mailto:<?php echo $secD->company_email; ?>"><?php echo $secD->company_email; ?></a></li>
                            <li>Everyday: 08:00 -18:00</li>
                        </ul>
                        <div class="social-links">
                            <a href="<?php echo $secD->company_fbpage; ?>"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                 <?php endforeach; ?>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-12">
                   <div class="contact-title">
                     <div class="section-title">
                        <center><span><h4>Sign In Form</h4></span></center>
                     </div>
                 </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                </div> 
            </div> -->
	 </div>
</section>
 <!-- <script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LfFCvYZAAAAAFw2QhwyXHF1by5BsysnSbpoo-ZJ', {action: 'submit'}).then(function(token) {
            alert(okay);
              // Add your logic to submit to your backend server here.
          });
        });
      }
  </script> -->
 <!-- <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script> -->
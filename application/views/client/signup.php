<section class="contact-section spad wow fadeInUp" style="padding-bottom: 50px;">
    <div class="container intro-text">
         <!-- SIGN UP PAGE  -->
         <div class="row">
                <div class="col-lg-6">
                    <div class="info-box">
                      <div class="contact-title">
                       <div class="section-title">
                          <h2>SIGN UP FORM</h2>
                        </div>
                       </div>
                        <form id="signup_form" class="contact-form" method="post" enctype="multipart/form-data" validate>
                        <div class="row">
                            <input type="hidden" name="token" id="token" value="<?php if(isset($_SESSION["token"])){ echo $_SESSION["token"]; }else { redirect('Client/signout'); } ?>">
                            <input type="hidden" name="cs_province_code" id="cs_province_code" value="">
                            <div class="col-lg-12 form-group">
                                <input type="text" name="cs_fname" placeholder="Firstname" required pattern="([a-zA-Z \'\.\-]){2,50}" title="Please enter your real name.">
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="text" name="cs_lname" placeholder="Lastname" required pattern="([a-zA-Z \'\.\-]){2,50}" title="Please enter your real surname.">
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="text" name="cs_mname" placeholder="M.I - Optional" pattern="([a-zA-Z \'\.\-]){1,2}" title="Please enter a valid middle initial only.">
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="text" name="cs_company_name"placeholder="Company Name - Optional" pattern="([a-zA-Z \'\.\-]){3,50}" title="Please enter company name.">
                            </div> 
                            <div class="col-lg-12 form-group">
                                <label>Address:</label>
                            </div>
                            <div class="col-lg-12 col-sm-12 form-group">
                                <label for="cs_province">Province:</label>
                                <select id="cs_province" class="form-control" name="cs_province" required>
                                    <option selected disabled>Select Province..</option>
                                </select>
                                <input type="hidden" id="cs_province_txt" name="cs_province_txt" value="">
                            </div>
                            <div class="col-lg-12 col-sm-12 form-group">
                                <label for="cs_city">City:</label>
                                <select class="form-control" id="cs_city" name="cs_city" required>
                                    <option selected disabled>Select City..</option>
                                </select>
                                <input type="hidden" id="cs_city_txt" name="cs_city_txt" value="">
                            </div>
                            <div class="col-lg-12 col-sm-12 form-group">
                                  <label for="cs_brgy">Barangay:</label>
                                 <select class="form-control" id="cs_brgy" name="cs_brgy" required>
                                    <option selected disabled>Select Barangay..</option>
                                </select>
                                <input type="hidden" id="cs_brgy_txt" name="cs_brgy_txt" value="">
                            </div>
                            <div class="col-lg-12 form-group" style="padding-top: 20px;">
                                <input type="tel" id="cs_company_mobile" name="cs_company_mobile" placeholder="Mobile Number" required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="tel" id="cs_company_tel" name="cs_company_tel" placeholder="Telephone Number - Optional">
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="email" name="cs_email" placeholder="Your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  title="Please enter a valid email address." required>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="password" id="cs_pass" name="cs_pass" placeholder="Create Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters." required>
                                <span style="display: inline;">Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.</span>
                            </div>
                            <div class="col-lg-12 form-group">
                                <input type="password" id="cs_confirm" name="cs_confirm" placeholder="Confirm Password" required>
                            </div>
                            
                            <div class="col-lg-12 form-group" style="padding-bottom: 20px;">
                                <center>
                                    <div id="html_element"></div>
                               </center>
                            </div>
                            <div class="col-lg-12">
                                <center>
                                  <button type="submit" class="btn-primary"> SIGN UP </button>
                               </center>
                            </div>
                            <div class="col-lg-12 col-sm-12" style="padding-top: 20px;">
                              <h4>Already have account?<a href="<?php echo base_url(); ?>Client/signin" class="text-info"> Sign In.</a></h4>
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
 <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
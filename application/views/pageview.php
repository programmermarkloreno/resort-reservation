<?php if($section == 'A'): ?>
<!-- SECTION A -->
   <section class="contact-section spad wow fadeInUp" style="padding-bottom: 50px;">
        <div class="container intro-text">
        <?php if($mode == 'A1'):?>
        
         <!-- END SIGN UP PAGE  -->
       <?php elseif($mode == 'A2'):?>
        
        <?php else:?>
         
        <?php endif; ?>
            <div class="row">
              <div class='col-lg-12'><center>
                  <label class="alert alert-danger alert-dismissible" style="display: none;"></label>
                  </center> 
               </div>
            </div>
      </div>
  </section>
<!-- END SECTION A -->

<!-- SECTION B -->
<!-- <?php elseif($section == 'B'): ?>

    <?php if($mode == 'B1' && isset($_SESSION["entry"])):?>

                <?php if($_SESSION["entry"] == $this->uri->segment(3)): ?> -->
                <!-- ROOM SELECTION -->
                <div id="info" class="white-popup mfp-hide">
                   <section class="intro-section">
                       <div class="container intro-text">
                        <div class="row">
                          <div class="col-lg-12">
                              <center><div class="section-title">
                                  <h4>WELCOME</h4><h1 class="welcome-msg">to Hoyoland Eco-Tropical Resort, <?php echo $_SESSION["fname"].' '.$_SESSION["lname"]; ?></h1>
                              </div></center>
                          </div>
                        </div>
                     </div>
                   </section>
                </div>
                

 
               <?php else: redirect('Client/index'); ?>
               <?php endif; ?>
     <?php else:?>
      <!-- NO PERMISSION SECTION -->
         <section class="contact-section spad wow fadeInUp" style="padding-bottom: 50px;">
           <div class="container intro-text">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-title">
                        <center>
                            <i class="fas fa-sad-tear fa-3x"></i>
                            <div class="section-title">
                            <span>We're sorry!</span>
                            <h2>You have no permission to access this page!</h2>
                        </div></center>
                    </div>
                </div>
                <div class="col-lg-4">
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
      <!-- END NO PERMISSION SECTION -->
    <?php endif; ?>

<?php elseif($section == 'C'): ?>

  <?php if($mode == 'C1' && isset($_SESSION["entry"])): ?>

       <?php if($_SESSION["captcha"] == $this->uri->segment(3)):?>
        
              
        <?php else: redirect('Client/index'); ?>
        <?php endif; ?>

    <?php else:?>
          <section class="contact-section spad wow fadeInUp" style="padding-bottom: 50px;">
              <div class="container intro-text">
                  <div class="row">
                      <div class="col-lg-8">
                          <div class="contact-title">
                              <center>
                                  <i class="fas fa-sad-tear fa-3x"></i>
                                  <div class="section-title">
                                  <span>We're sorry!</span>
                                  <h2>You have no permission to access this page!</h2>
                              </div></center>
                          </div>
                      </div>
                      <div class="col-lg-4">
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
    <?php endif; ?>

<?php endif; ?>

    <!-- Contact Section End -->

    <!-- Map Section Begin -->
   <!--  <div class="map" style="padding-top: 50px;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26440.72384129847!2d-118.24906619231132!3d34.06719475913053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c659f50c318d%3A0xe2ffb80a9d3820ae!2sChinatown%2C%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1570213740685!5m2!1sen!2sbd"
            height="910" style="border:0;" allowfullscreen=""></iframe>
    </div>-->

    <!-- sitekey/6LdqtdcZAAAAAD6tHGuCuycBevHAOiA99vZOJhGm -->
    <!-- secretkey/6LdqtdcZAAAAAAhlGDV8099vLri_XwtNOC8wbajg -->


     <div id="alert-danger-a" class="alert alert-danger alert-dismissible" style="display: none;"></div>
                            <div id="alert-success-a" class="alert alert-success alert-dismissible" style="display: none;"></div>  
                             <div class="row form-group">
                                <div class="col-12">
                                  <div class="card card-primary">
                                    <div class="card-header">
                                      <div class="card-title">
                                        Choose Event Hall
                                      </div>
                                    </div>
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <div class="btn-group w-100 mb-2">
                                          <!--  <a class="btn btn-info active btnA" href="javascript:void(0)" data-filter="all"> All items </a> -->
                                          <?php foreach ($packages as $packageskey): ?>
                                            <a class="btn btn-info btnA" href="javascript:void(0)" data-filter="<?php echo 'A'.$packageskey->id; ?>"> <?php echo $packageskey->pcks_title; ?> </a>
                                          <?php endforeach; ?>
                                        </div>
                                      </div>
                                      <div class="justify-content-center">
                                        <div class="filter-containerA p-0 row">
                                        <?php foreach ($packages as $packageskey): ?>
                                           <?php foreach ($packagesfile as $packagesfilekey): ?>
                                            <?php if($packagesfilekey->file_parent_id == $packageskey->id): ?>
                                            <div id="itemA" class="filtr-item col-sm-2" data-category="<?php echo 'A'.$packagesfilekey->file_parent_id; ?>">
                                              <a href="<?php echo base_url().'assets/img/packages/'.$packagesfilekey->file_name; ?>" data-toggle="lightbox" data-title="<?php echo $packageskey->pcks_title; ?>
                                              <p class='text-light bg-dark'><b>Rates per head: </b>&nbsp <?php echo 'PHP'.' '.number_format($packageskey->pcks_price, 2);
                                              ; ?></p><p class='text-light bg-dark'><b>Capacity:</b> <?php echo $packageskey->pcks_capacity; ?></p>" data-footer="
                                              <button class='btn btn-primary form-control select-package' data-id='<?php echo $packageskey->id; ?>'>Select</button>">
                                                <img src="<?php echo base_url().'assets/img/packages/'.$packagesfilekey->file_name; ?>" class="img-fluid mb-2" alt="white sample"/>
                                              </a>
                                             </div>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                        <?php endforeach; ?>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    <input id="packagesid" class="form-control" type="hidden" name="packagesid" value="" required="" />
                                    <input id="packagesprice" class="form-control" type="hidden" name="packagesprice" value="" required=""/>
                                  </div>
                                </div>
                              <div id="alert-danger-b" class="alert alert-danger alert-dismissible" style="display: none;"></div>
                              <div id="alert-success-b" class="alert alert-success alert-dismissible" style="display: none;"></div>
                              
                              <div class="row form-group">
                                 <div id="add_days" class="col-12 col-sm-12 form-group">
                                      
                                  </div>
                                <div class="col-12">
                                  <div class="card card-primary">
                                    <div class="card-header">
                                      <div class="card-title">
                                        Additional Reservations
                                      </div>
                                    </div>
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <div class="btn-group w-100 mb-2">
                                           <!-- <a class="btn btn-info active btnB" href="javascript:void(0)" data-filter="all"> All items </a> -->
                                          <?php foreach ($categories as $categorieskey): ?>
                                            <a class="btn btn-info btnB" href="javascript:void(0)" data-filter="<?php echo 'B'.$categorieskey["id"]; ?>"> <?php echo $categorieskey["Category_title"]; ?> </a>
                                          <?php endforeach; ?>
                                        </div>
                                      </div>
                                      <div style="width: auto; height: auto;">
                                        <div class="filter-containerB p-0 row form-group">
                                        <?php foreach ($subcategories as $subcategorieskey): ?>
                                           <?php foreach ($subcatfiles as $subcatfileskey): ?>
                                            <?php if($subcatfileskey["Subcategory_Id"] == $subcategorieskey["sub_category_id"]): ?>
                                            <div class="filtr-item col-sm-2" data-category="<?php echo 'B'.$subcatfileskey["Category_Id"]; ?>">
                                              <a href="<?php echo base_url().'assets/img/acommodationfile/'.$subcatfileskey["imgfile_name"]; ?>" data-toggle="lightbox" data-title="<?php echo $subcategorieskey["Category_title"]; ?>
                                              <p class='text-light bg-dark'><b>Price: </b>&nbsp <?php echo 'PHP'.' '.number_format($subcategorieskey["price"], 2); ?></p><p class='text-light bg-dark'><b>Capacity:</b> <?php echo $subcategorieskey["capacity"]; ?></p>" data-footer="<label for='rs_add_days'>Days:</label>
                                              <input class='form-control rs_add_days' type='number' name='rs_add_days' placeholder='No. of days' min='1' required><button class='btn btn-primary form-control select-additional' data-id='<?php echo $subcategorieskey["sub_category_id"]; ?>' disabled> ADD </button></div>">
                                                <img src="<?php echo base_url().'assets/img/acommodationfile/'.$subcatfileskey["imgfile_name"]; ?>" class="img-fluid mb-2" alt="white sample"/>
                                              </a>
                                             </div>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                        <?php endforeach; ?>
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                    <input id="addedreserveid" type="hidden" name="addedreserveid" value=""/>
                                    <input id="addedreserveprice" type="hidden" name="addedreserveprice" value="0"/>
                                  </div>
                                </div>







(function ($) {
    'use strict';


    var base = $('#base_url').val();
    var segment = $('#segment').val();

     $('.btnB[data-filter]').on('click', function() {
          $('.btnB[data-filter]').removeClass('active');
          $(this).addClass('active');
        });

     $('.btnA[data-filter]').on('click', function() {
          $('.btnA[data-filter]').removeClass('active');
          $(this).addClass('active');
     });

    if(segment == 'reservation'){
        //loadoccasion();
        //  $.magnificPopup.open({
        //    items: {
        //     src: '#info',
        //     type: 'inline',
        //     midClick: true
        //   }
        // });

        // $('.filter-containerA').filterizr({
        //     gutterPixels: 3, 
        //     layout: 'sameWidth',
        //     delay: 250,
        //     delayMode: 'alternate' 
        // });
       
        // $('.filter-containerB').filterizr({
        //   gutterPixels: 3, 
        //   layout: 'sameWidth',
        //   delay: 250,
        //   delayMode: 'alternate' 
        // });
        
    }else if(segment == 'sign_up'){
       loadprovince();
    }

     $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });


    $('#cs_company_mobile').mask("(+63)00-0000-0000");
    $('#cs_company_tel').mask("(00)0000-0000");
    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    $('.dropdown-toggle').dropdown();

    /*------------------
    Navigation
  --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
    Date Picker
  --------------------*/
    $(".datepicker-1").datepicker();
    $(".datepicker-2").datepicker();

    /*------------------
    Nice Selector
  --------------------*/
    $('.suit-select').niceSelect();

    /*------------------
        Room Slider
    --------------------*/
    var hero_s = $(".ri-sliders");
    hero_s.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        items: 1,
        dots: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        smartSpeed: 200,
        autoHeight: true,
        autoplay: true,
        responsiveClass:true,
        onInitialized: function () {
            var a = this.items().length;
            $("#snh-1").html("<span>1</span><span>" + a + "</span>");
        }
    });

    /*------------------
        Milestone Counter
    --------------------*/
    $('.counter').each(function () {
        $(this).prop('Counter',0).animate({
        Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
            $(this).text(Math.ceil(now));
            }
        });
    });

   
    /*-------------------
    Quantity change
  --------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    /*------------------
        Magnific Popup
    --------------------*/
    $('.pop-up').magnificPopup({
        type: 'image',
        preloder: true
    });

     $('.open-popup-link').magnificPopup({
        type: 'inline',
        midClick: true
    });

     // $('.open-popup-more').magnificPopup({
     //    items: {
     //        src: '#show-more',
     //        type: 'inline',
     //        midClick: true
     //      }
     // });


     $('#rotate').Morphext({
          animation: "bounceIn",
          separator: ",",
          speed: 2000,
        })

      $('.welcome-msg').Morphext({
          animation: "bounceIn",
          separator: ",",
          speed: 2000,
        })

        var wow = new WOW({
          boxClass: 'wow',
          animateClass: 'animated',
          offset: 0,
          mobile: true,
          live: true
        })
        wow.init();
//////////
    // $('#btn-submit').on('click', function(){
    //    var from = $('.datepicker-1').parent().find('input').val();
    //    var to = $('.datepicker-2').parent().find('input').val();
    //    localStorage.setItem('from', from);
    //    localStorage.setItem('to', to);
    //    location.replace(base+"Client/reservation?true");
    // });
      // var from = localStorage.getItem('from');
         // var to = localStorage.getItem('to');
         // var html = '';
         //     html += '<input type="hidden" name="from" value="'+from+'">'+
         //             '<input type="hidden" name="to" value="'+to+'">';
         // $('.data-info').html(html);
      $('#generate').on('click', function(){
            window.print();
      });

      
      

    var storage = [];

    function reservation(){
      
          $(".loader").fadeIn();
          $("#preloder").show(); 

         var JSONObj = JSON.stringify(storage);
         var data = $('#reservation_form').serializeArray();
         var seg = $('#e_code').val();
         
         $.ajax({
            url: base+'admin/crud/client/reservation',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: {dataA: data, dataB: JSONObj},
            cache: false,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                 window.top.location = base+'Client/reserved/'+seg+'/reservation?true';
               }else{
                 $(".loader").fadeOut();
                 $("#preloder").delay(200).fadeOut("slow");
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't reserve at this moment. Please try again.</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $(".loader").fadeOut();
              $("#preloder").delay(200).fadeOut("slow");
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
            }
        });
    }

     const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'PHP',
        minimumFractionDigits: 2
      });

    function _computeRates(){

      // var guests = $('#rs_guest').val();
      // var excessGuest = $('#rs_excess').val();
      // var totalofguests = parseInt(excessGuest) + parseInt(guests);
      // var nDays = $('#rs_days').val();

      // var total = 0;

      // var packagerates = $('#packagesprice').val();
      // var totalAdd = $('#rs_total_add').val();

      // if(parseInt(packagerates) > 0){

      //     if(guests > 0 && parseFloat(packagerates) > 0){
      //          total = parseInt(totalofguests) * parseFloat(packagerates);
      //     }
      //     if(nDays > 1 && parseFloat(packagerates) > 0){
      //         var setTot = parseInt(totalofguests) * parseFloat(packagerates);
      //              total = setTot * nDays;
      //     }
      //    var compute = parseFloat(totalAdd) + parseFloat(total);
      //    $('#rs_total').val(parseFloat(compute));
      //   // $('#totalAmount').html(formatter.format(parseFloat(compute)));
      //    _computeAllResults(0, compute);
      // }
      //console.log(guest);   
      var totGuests;
      var totComp;
      var total;
       if(parseFloat(price) > 0 && parseInt(guest) > 0 && parseInt(days) > 0){
           parseInt(excess) > 0 ? totGuests = parseInt(guest) + parseInt(excess) : totGuests = parseInt(guest);
            
           totComp = parseFloat(price) * parseInt(totGuests);
           total = parseFloat(totComp) * parseInt(days);
           _computeAllResults('A', parseFloat(total));
       }
       
    }
     var compResults = [];
     function _computeAllResults(mode, getVal){
       
          jQuery(compResults).each(function(index){
              compResults[index].mode == 'A' ? compResults.splice(index, 1) : false;
          });
          compResults.push({
             mode: mode,
             results: getVal
          });
          var a;
          var res = 0;
          var tot;
        for(a = 0; a < compResults.length; a++){
           tot = compResults[a].results + res;
           res = tot;
        }
        //$('#totalAmount').html(formatter.format(parseFloat(tot)));
        console.log(tot);
     }
       
     function _computeAdditionalRates(p, d){

           var result = p * d;
           _computeAllResults('B', result);

           //$('#rs_total_add').val(parseFloat(results));        
       }

    reserve_dates();

    var disabledDates = new Array();
    function reserve_dates(){
       $.ajax({
            url: base+'admin/crud/client/reserved_dates',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            async: true,
            dataType: 'json',
            success: function(response){
              if(response.success){
                var i, j;
                for(i=0; i<response.data.length; i++){
                    for(j=0; j<=response.data[i].NDays; j++){
                      let dates = new Date(response.data[i].CheckIn);
                      var month = dates.getMonth() + 1, 
                          date = dates.getDate() + j,
                          year = dates.getFullYear();
                         disabledDates.push(month+"-"+date+"-"+year);
                    }
                  }
               }
            },
            error: function(xhr){
               $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
            }
        });
    }

    $('#rs_date').change(function(){

         var startDate = $(this).datepicker('getDate');
         var strtTime = startDate.getTime();
         var i;
         var getDisabled;
         var field = document.getElementById('rs_days');
         var att = document.createAttribute("max");

         for(i = 0; i < disabledDates.length; i++){
             let getDates = new Date(disabledDates[i]);
             if(startDate < getDates){
              var endtime = getDates.getTime();
              var diffTime = endtime - strtTime;
              var diffdays = diffTime / (1000 * 3600 * 24);
              var maxDays = diffdays - 1; 
              if(maxDays != 0){
                 att.value = maxDays;
                 field.setAttributeNode(att);
               }else{
                 att.value = 1;
                 field.setAttributeNode(att);
               }
               return;
             }else {
               att.value = 15;
               field.setAttributeNode(att);
             }
         }
    });

    function _reservedDates(date){
        date =  (date.getMonth() + 1) + '-' + date.getDate() + '-' + date.getFullYear();
        if(disabledDates.indexOf(date) >= 0){ 
          return [false, "notav", "Not Available"];
        }else {
          return [true, "av", "Available"];
        }
    }  

     $('#rs_date').datepicker({
          showAnim: 'fold',
          minDate: '+15d',
          maxDate: '+3m +15d',
          dateFormat: 'mm-dd-yy',
          beforeShowDay: _reservedDates
     });

     $.validator.setDefaults({
        submitHandler: function () {

            var seg = $('#segment').val();
            var token = $('#e_code').val();
            if(seg == 'accommodation'){

       localStorage.setItem('reserved_id', document.getElementById('rs_id').value);
       localStorage.setItem('occasion', document.getElementById('rs_occasion').value);
       localStorage.setItem('reserved_date', document.getElementById('rs_date').value);
       localStorage.setItem('arrived_time', document.getElementById('rs_time').value);
       localStorage.setItem('reserved_days', document.getElementById('rs_days').value);
       localStorage.setItem('guests', document.getElementById('rs_guest').value);
       localStorage.setItem('excess', document.getElementById('rs_excess').value);
       localStorage.setItem('notes', document.getElementById('rs_message').value);

       window.top.location = base+'Client/reservation_summary/'+token;
            }else if(seg == 'sign_up'){
                create();
            }
        }
     });

     

     $('#reservation_form').validate({
       rules: {  
                rs_date: { required: true},
                rs_time: { required: true, min: '08:00', max: '18:00'},
                rs_guest: { required: true }
              },
    messages: {
             rs_date: {
                  required: "Please enter date of reservation!"
               },
             rs_time: {
                  required: "Please enter time of arrival!",
                  min: "Resort time is open at 8:00 AM",
                  max: "Resort time is until 6:00 PM"
               },
             rs_guest: {
                  required: "Please determine the total of guests!",
               },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
     });

     $('#cs_province').change(function(){
        var provinceCode = $(this).val();
        $('#cs_province_code').val(provinceCode);
        loadcity(provinceCode);
     });

     $('#cs_city').change(function(){
        var cityCode = $(this).val();
        loadbrgy(cityCode);
     });

     var price, guest, days, excess;

     $('#rs_guest').on('keyup', function(){
         guest = $(this).val();
         _computeRates();
     });

      $('#rs_guest').change(function(){
         guest = $(this).val();
        _computeRates();
     });

     $('#rs_days').on('keyup', function(){
        days = $(this).val();
        _computeRates();
     });

     $('#rs_days').change(function(){
        days = $(this).val();
        _computeRates();
     });

      $('#rs_excess').on('keyup', function(){
         excess = $(this).val();
        _computeRates();
     });

      $('#rs_excess').change(function(){
         excess = $(this).val();
         _computeRates();
     });

     $("body").on('click', '.select-package', function(e){
            e.preventDefault();

            var modal = document.getElementsByClassName('ekko-lightbox');
            var terminate = $(modal).attr('id');
            
            var packagesid = $(this).attr('data-id');
           
            var field = document.getElementById('rs_guest');
            var att = document.createAttribute("max");
           
                  $.ajax({
                    url: base+'admin/crud/client/packages/'+packagesid,
                    headers: {'X-Requested-With':'XMLHttpRequest'},
                    method: 'GET',
                    async: true,
                    dataType: 'json',
                    success: function(response){
                      if(response.success){

                        const result = storage.some(pckgs => pckgs.id === packagesid);
                        
                        if(result){
                              $('#alert-danger-a').html("<h6><i class='fas fa fa-check'></i>&nbsp You've already select this package. </h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>").fadeIn().delay(5000).fadeOut('slow');
                             $('#'+terminate).modal('hide');
                        }else{
                          var html = '';
                          html ='<tr>'+
                                  '<td>'+response.data[0].pcks_title+'</td>'+
                                  '<td>'+response.data[0].pcks_desc+'</td>'+
                                  '<td>'+formatter.format(response.data[0].pcks_price)+' - rates per head</td>'+
                                '</tr>';

                          att.value = response.data[0].pcks_capacity;
                          field.setAttributeNode(att);

                          $('#packagesprice').val(response.data[0].pcks_price);
                          $('#tbl-summary').append(html);
                          $('#'+terminate).modal('hide');
                           $('#alert-success-a').html("<h6><i class='fas fa fa-check'></i>&nbsp "+response.data[0].pcks_title+"  is successfully selected.</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>").fadeIn().delay(5000).fadeOut('slow');
                           price = response.data[0].pcks_price;
                           _computeRates();

                           storage.push({
                              mode: 'A',
                              id: response.data[0].id,
                              package: response.data[0].pcks_title,
                              desc: response.data[0].pcks_desc,
                              price: response.data[0].pcks_price,
                           });
                        }
                      }
                    },
                    error: function(xhr){
                       $('#'+terminate).modal('hide');
                       $('#alert-danger-a').html("<h6><i class='fas fa fa-check'></i>&nbsp Server error found - "+xhr.status + " " + xhr.statusText+" </h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>").fadeIn().delay(5000).fadeOut('slow');
                    }
              });
        });

       $("body").on('keyup', '.rs_add_days', function(e){
            e.preventDefault();
            var getVal = $(this).val();
            var getDays = $('#rs_days').val();
             $(this).attr('max', getDays);
             parseInt(getVal) > parseInt(getDays) ? $(this).val(getDays) : false;

             getVal != '' ? $('.select-additional').removeAttr('disabled') :
               ($('.select-additional').attr('disabled', 'disabled'));
             getVal == 0 ? $('.select-additional').attr('disabled', 'disabled') : false;
            
       });

       $("body").on('change', '.rs_add_days', function(e){
            e.preventDefault();
             var getVal = $(this).val();
             var getDays = $('#rs_days').val();
             $(this).attr('max', getDays);
             getVal != '' ? $('.select-additional').removeAttr('disabled') :
               $('.select-additional').attr('disabled', 'disabled');
       });

        $("body").on('click', '.select-additional', function(e){
            e.preventDefault();

            var modal = document.getElementsByClassName('ekko-lightbox');
            var terminate = $(modal).attr('id');

            var categid = $(this).attr('data-id');

           $('#addedreserveid').val(categid);
              $.ajax({
                    url: base+'admin/crud/client/additional/'+categid,
                    headers: {'X-Requested-With':'XMLHttpRequest'},
                    method: 'GET',
                    async: true,
                    dataType: 'json',
                    success: function(response){
                      if(response.success){
                        var cost = response.data[0].price;
                        var addNdays = $('.rs_add_days').val();
                        var html = '';
                        html ='<tr>'+
                                '<td>'+response.data[0].Category_title+'</td>'+
                                '<td>'+response.data[0].Category_desc+'</td>'+
                                '<td>'+formatter.format(cost)+'</td>'+
                              '</tr>';

                        $('#addedreserveprice').val(response.data[0].price);
                        $('#tbl-summary').append(html);
                        $('#'+terminate).modal('hide');

                        $('#alert-success-b').html("<h6><i class='fas fa fa-check'></i>&nbsp "+response.data[0].Category_title+"  is successfully selected.</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>").fadeIn().delay(5000).fadeOut('slow');
                         _computeAdditionalRates(cost, addNdays);
 
                         storage.push({
                            mode: 'B',
                            id: response.data[0].sub_category_id,
                            days: addNdays,
                            package: response.data[0].Category_title,
                            desc: response.data[0].Category_desc,
                            price: cost,
                         });
                      }
                    },
                    error: function(xhr){

                       $('#'+terminate).modal('hide');
                       $('#alert-danger-b').html("<h6><i class='fas fa fa-check'></i>&nbsp Server error found - "+xhr.status + " " + xhr.statusText+" </h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>").fadeIn().delay(5000).fadeOut('slow');
                    }
             });

        });

})(jQuery);



 <div class="row">
            <div class="col-lg-12">
               <div class="contact-title">
                  <div class="section-title">
                     <center><span><h4>Payment Details</h4></span></center>
                  </div>
                </div>
             </div>
         </div>
          <div class="row invoice-info">
              <div class="col-12">
            <?php foreach ($sectionD as $secD): ?>
                <div class="callout callout-info">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  <?php echo $secD->invoice_note; ?>
                </div>
             <?php endforeach; ?>
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                      <!-- title row -->
                    <?php foreach ($sectionD as $secD): ?>
                      <div class="row">
                        <div class="col-12">
                          <h4>
                            <i class="fas fa-money-check"></i><?php echo $secD->company_name; ?>
                            <!-- <small class="float-right">Date:&nbsp<?php echo $res_details[0]->datetime; ?></small> -->
                          </h4><br/><br/>
                        </div>
                        <!-- /.col -->
                      </div>
                   <?php endforeach; ?>
                      <!-- info row -->
                      <div class="row">
                        <div class="col-sm-4 invoice-col">
                            From:
                        <?php foreach ($sectionD as $secD): ?>
                          <address>
                            <strong><?php echo $secD->company_name; ?></strong><br>
                            <?php echo $secD->company_address; ?><br>
                            Phone: <?php echo $secD->company_no; ?><br>
                            Tel: <?php echo $secD->company_tel; ?><br>
                            Email: <?php echo $secD->company_email; ?>
                          </address>
                        <?php endforeach; ?>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            To:
                          <address>
                            <strong><?php echo $clientInfo[0]->$Lastname->Lastname.', '.$clientInfo[0]->Firstname.' '.$clientInfo[0]->Middlename; print_r($clientInfo) ?></strong><br>
                            Address: <?php if($clientDetails[0]->Address!=''){echo $clientDetails[0]->Address;}else{echo 'N/A';} ?><br>
                            Phone: <?php if($clientDetails[0]->Mobile!=''){echo $clientDetails[0]->Mobile;}else{echo 'N/A';} ?><br>
                            Tel: <?php if($clientDetails[0]->TelNo!=''){ echo $clientDetails[0]->TelNo; }else{ echo 'N/A';} ?><br>
                            Email: <?php echo $clientDetails[0]->Email; ?>
                          </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          Invoice:
                      <!-- <?php foreach ($invoice as $invoicekey): ?> -->
                          <address>
                          <b>Invoice #<?php echo $invoice[0]->invoice; ?></b><br>
                          <b>Payment Due:</b> <?php echo $invoice[0]->dueDate; ?><br>
                         </address>
                       <!-- <?php endforeach; ?> -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table class="table table-striped">
                            <thead>
                            <tr>
                              <th>Reservation Code</th>
                              <th>Type</th>
                              <th style="width: auto;">Description</th>
                              <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                         <!--  <?php foreach ($packagesDetails as $key => $value): ?>
                            <tr>
                              <td><?php echo $value->RCode; ?></td>
                              <td><?php echo $value->rs_package; ?></td>
                              <td class="d-inline-block text-truncate" style="max-width: 600px;"><?php echo $value->rs_description; ?></td>
                              <td><?php echo 'PHP '.number_format($value->rs_price, 2); ?></td>
                            </tr>
                          <?php endforeach; ?> -->
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                          <p class="lead">Payment Methods:</p>
                          <img src="<?php echo base_url();?>assets/template/dist/img/credit/visa.png" alt="Visa">
                          <img src="<?php echo base_url();?>assets/template/dist/img/credit/mastercard.png" alt="Mastercard">
                          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                          </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                        <!-- <?php foreach ($invoice as $key => $value): ?> -->
                          <p class="lead">Amount Due of 50% Downpayment: <?php echo $invoice[0]->dueDate;?></p>

                          <div class="table-responsive">
                            <table class="table">
                              <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><?php echo 'PHP '.number_format($invoice[0]->Totalbill, 2);?></td>
                              </tr>
                              <tr>
                                <th>Downpayment (50%)</th>
                                <td><?php $amount = $invoice[0]->Totalbill; $down = $amount * .50; echo 'PHP '.number_format($down, 2); ?></td>
                              </tr>
                              <tr>
                                <th>Total:</th>
                                <td><?php echo 'PHP '.number_format($invoice[0]->Totalbill, 2);?></td>
                              </tr>
                            </table>
                          </div>
                          <!-- <?php endforeach; ?> -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <div class="row no-print">
                        <div class="col-12">
                          <!-- <a href="#" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                         <!--  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                            Payment
                          </button> -->
                           <a href="<?php echo base_url(); ?>Client/index" class="btn btn-success float-right" download> Go to Home
                          </a>
                          <button id="generate" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Generate PDF
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- /.invoice -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
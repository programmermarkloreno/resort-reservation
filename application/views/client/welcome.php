<section class="contact-section spad wow fadeInUp" style="padding-bottom: 50px;">
    <div class="container intro-text">
<!-- SUCCESSFULL PAGE  -->
            <div class="row">
               <div class="col-lg-8">
                    <?php if(isset($_SESSION["welcomeMsgMode"])){ echo $_SESSION["welcomeMsgMode"]; } else { redirect('Client/signout'); } ?>
                    <div class="row" style="padding-top: 20px;">
                        <div class='col-lg-12'><center>
                            <label class="alert alert-danger alert-dismissible" style="display: none;"></label>
                            </center> 
                         </div>
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
                            <!-- <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a> -->
                        </div>
                    </div>
                 <?php endforeach; ?>
                </div>
            </div>
        <!-- END SUCCESSFULL PAGE  -->
    </div>
</section>
<script type="text/javascript">
  $(document).ready(function(){

           var base = $('#base_url').val();

            Date.prototype.addDays = function(getdays) {
                   this.setDate(this.getDate() + parseInt(getdays));
                   return this;
                };

            var disabledDates = new Array();
            function reserve_dates(){
               $.ajax({
                    url: base+'client/crud_func/client/reserved_dates',
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
                                  var getDatesTodisabled = dates.addDays(j);

                                  var month = getDatesTodisabled.getMonth() + 1, 
                                      date = getDatesTodisabled.getDate(),
                                      year = getDatesTodisabled.getFullYear();

                                    disabledDates.push(month+"-"+date+"-"+year);
                            }
                          }
                       }
                    },
                    error: function(xhr){
                       $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');
                    }
                });
            }

          function _reservedDates(date){
            date =  (date.getMonth() + 1) + '-' + date.getDate() + '-' + date.getFullYear();
            if(disabledDates.indexOf(date) >= 0){ 
              return [false, "notav", "Not Available"];
            }else {
              return [true, "av", "Available"];
            }

        } 


      // var sett = [];
      // function settings(){
      //       const url = base+'Client/settings';
      //       $.getJSON(url, function(data, status, xhr){
      //           if(xhr.status == 200){
      //             //localStorage.setItem("reservation_days", "+"+data.data+"d");
      //             $.each(data, function(key, val){
      //                 sett.push({ 'days': val });
      //             });
      //           }
      //       })
      //   }

      // settings();

       $('#rs_date').datepicker({
          showAnim: 'fold',
          minDate: '+15d',
          maxDate: '+3m +15d',
          dateFormat: 'mm-dd-yy',
          beforeShowDay: _reservedDates
     });

     // $('#rs_date').datepicker('option', 'minDate', JSON.parse(localStorage.getItem(reservation_days)));

      const days = $('#rs_days').val();

     $('#rs_date').change(function(){

         var startDate = $(this).datepicker('getDate');
         var strtTime = startDate.getTime();
         var i;
         var getDisabled;
         var field = document.getElementById('rs_days');
         var att = document.createAttribute("max");

         for(i = 0; i < disabledDates.length; i++){
             let getDates = new Date(disabledDates[i]);
             //console.log(getDates)
             if(startDate < getDates){
              var endtime = getDates.getTime();
              var diffTime = endtime - strtTime;
              var diffdays = diffTime / (1000 * 3600 * 24);
              var maxDays = diffdays - 1; 
             /// console.log(maxDays)
              // if(maxDays != 0){
              //    att.value = days;
              //    field.setAttributeNode(att);
              //  }else{
              //    att.value = 1;
              //    field.setAttributeNode(att);
              //  }
              if(maxDays > days){
                   att.value = days;
                   field.setAttributeNode(att);
                 }else{
                   att.value = maxDays - 2;
                   field.setAttributeNode(att);
                }
                 // console.log(days)
             }else {
               att.value = days;
               field.setAttributeNode(att);
             }
         }
    });

    reserve_dates();

    function update_reservation(mode){

         const token = $('#token').val();
        switch(mode){
           case 0:

            const dataForm = $('#rescheduleForm').serialize();
            const url = base+'Client/reschedule_reservation/'+token;
             
             $.post(url, dataForm, function(data, status, xhr){
                     const JsData = JSON.parse(data);
                     if(JsData.success){
                          switch(JsData.mode){
                              case 0:
                                 window.top.location = base+"Client/welcome/"+token;
                               break;
                              case 1:
                                  window.top.location = base+"Client/success/"+token;
                               break;
                              case 2:
                                  window.top.location = base+"Client/no_permission";
                               break;
                         }
                     } else{
                        $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');  
                     }  
                });

            break;
           case 1:

              const urlcancel = base+'Client/cancel_reservation/'+token;
              $.get(urlcancel, function(data, status, xhr){
                     const JsData = JSON.parse(data);
                     if(JsData.success){
                          switch(JsData.mode){
                              case 0:
                                 window.top.location = base+"Client/welcome/"+token;
                               break;
                              case 1:
                                  window.top.location = base+"Client/success/"+token;
                               break;
                              case 2:
                                  window.top.location = base+"Client/no_permission";
                               break;
                         }
                     } else{
                        $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');  
                     }  
                });

            break;
           default:
               window.top.location = base+"Client/signout";
             break;
        }
    }

    $.validator.setDefaults({
        submitHandler: function () {
          var modeVal = '<?php echo $_SESSION["welcomeMode"]; ?>';
             update_reservation(Number(modeVal));
         }
     });

     $('#rescheduleForm').validate({
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

     $('#cancelForm').validate({
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

  });
</script>
(function ($) {
    'use strict';

     var base = $('#base_url').val();
    var segment = $('#segment').val();

    function loadprovince(){
        $.ajax({
            url: base+'client/crud_func/client/province',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            async: true,
            dataType: 'json',
            success: function(response){
              if(response.success){
                var html = '';
                var i;
                html ='<option selected disabled>Select Province..</option>';
                for(i=0; i<response.data.length; i++){
                   html +='<option value="'+response.data[i].provCode+'">'+response.data[i].provDesc+'</option>';
                }
                $('#cs_province').html(html);
              }else{
                $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't load province!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
              }
              
            },
            error: function(xhr){
               $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
          });
     }

    function loadcity(province){
        $.ajax({
            url: base+'client/crud_func/client/city/'+province,
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            async: true,
            dataType: 'json',
            success: function(response){
              if(response.success){
                var html = '';
                var i;
                html ='<option selected disabled>Select City..</option>';
                for(i=0; i<response.data.length; i++){
                   html +='<option value="'+response.data[i].citymunCode+'">'+response.data[i].citymunDesc+'</option>';
                }
                $('#cs_city').html(html);
              }else{
                $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't load cities!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
              }
              
            },
            error: function(xhr){
               $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
          });
     }
    
    function loadbrgy(city){
        $.ajax({
            url: base+'client/crud_func/client/barangay/'+city,
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            async: true,
            dataType: 'json',
            success: function(response){
              if(response.success){
                var html = '';
                var i;
                html ='<option selected disabled>Select Barangay..</option>';
                for(i=0; i<response.data.length; i++){
                   html +='<option value="'+response.data[i].brgyCode+'">'+response.data[i].brgyDesc+'</option>';
                }
                $('#cs_brgy').html(html);
              }else{
                $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't load barangay!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
              }
              
            },
            error: function(xhr){
               $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
          });
     }
   
   function create(){

          $(".loader").fadeIn();
          $("#preloder").show();
         var data = $('#signup_form').serialize();
         $.ajax({
            url: base+'client/crud_func/client/create',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: false,
            async: true,
            dataType: 'json',
            success: function(response){ 
                var token = $('#token').val();
                response.success ? (
                   $('#signup_form')[0].reset(),
                   window.top.location = base+'Client/success/'+token+'/create?true' ) :
               (
                 $(".loader").fadeOut(),
                 $("#preloder").delay(200).fadeOut("slow"),
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp "+response.errMsg+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow'));
            },
            error: function(xhr){
              $(".loader").fadeOut();
              $("#preloder").delay(200).fadeOut("slow");
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
            }
        });
    }

    loadprovince();

    $('#cs_company_mobile').mask("(+63)000-000-0000");
    $('#cs_company_tel').mask("(000)000-0000");

     $('#cs_province').change(function(){
        var provinceCode = $(this).val();
        var pTxt = $(this).children("option:selected").text();
        $('#cs_province_code').val(provinceCode);
        $('#cs_province_txt').val(pTxt);
        loadcity(provinceCode);
     });

     $('#cs_city').change(function(){
        var cityCode = $(this).val();
        var cTxt = $(this).children("option:selected").text();
         $('#cs_city_txt').val(cTxt);
        loadbrgy(cityCode);
     });

     $('#cs_brgy').change(function(){
        var bTxt = $(this).children("option:selected").text();
        $('#cs_brgy_txt').val(bTxt);
     });



    $.validator.setDefaults({
        submitHandler: function () {
        	create();
         }
     });

    $('#signup_form').validate({
       rules: {  
              cs_fname: { required: true, minlength: 2, maxlength: 20},
              cs_lname: { required: true, minlength: 2, maxlength: 20},
              cs_mname: { maxlength: 2},
              cs_email: { required: true, email: true, 
                    remote: {
                      url: base+"client/crud_func/client/email_check",
                      type: "post",
                      data: {
                         username: function() {
                          return $('#cs_email').val();
                         }
                      }
                   }
               },
              // cs_company_mobile: { required: true, maxlength: 11},
              cs_confirm:  { equalTo: "#cs_pass" }
              },
   messages: {
             cs_fname: {
              required: "Please input your firstname",
              minlength: "Please input your proper firstname",
              maxlength: "Your firstname is too much long"
              }, 
             cs_lname: {
              required: "Please input your lastname",
              minlength: "Please input your proper lastname",
              maxlength: "Your lastname is to much long"
              }, 
            cs_mname: {
              maxlength: "Please input your middle initial only"
              },
             cs_email: {
              required: "Please enter a email address",
              email: "Please enter a valid email address",
              remote: $.validator.format("{0} is already exists!")
              },
            cs_confirm: {
              equalTo: "Confirm password did not matched. Please type again."
              },
            // cs_company_mobile: { 
            //     required: "Please enter mobile number.", 
            //     maxlength: "Please enter valid mobile number."
            //   }
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


})(jQuery);
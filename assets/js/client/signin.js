(function ($) {
    'use strict';

    var base = $('#base_url').val();
    var segment = $('#segment').val();
    
    function credentials(data){
        $.ajax({
            url: base+'Client/credentials/signin',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'POST',
            data: data,
            cache: false,
            async: true,
            dataType: 'json',
            success: function(response){
              if(response.success){
                window.top.location = base+"Client/welcome/"+response.token;
              }else{
                 $(".loader").fadeOut();
                 $("#preloder").delay(200).fadeOut("slow");
                $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Invalid credentials or if you did not confirm your email, please confirm it now. Please try again.</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
              }
            },
            error: function(xhr){
               $(".loader").fadeOut();
               $("#preloder").delay(200).fadeOut("slow");
               $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
            }
          });
     }

    $.validator.setDefaults({
        submitHandler: function () {

          $(".loader").fadeIn();
          $("#preloder").show();
          var data = $('#signin_form').serialize();
        	credentials(data);
         }
     });

    $('#signin_form').validate({
       rules: {  
              sign_email: { required: true, email: true },
              sign_pass:  { required: true }
              },
   messages: {
            sign_email: {
              required: "Please enter email address",
              email: "Please enter a valid email address"
              },
            sign_pass: {
              required: "Please enter your password."
            }
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
(function ($) {
    'use strict';

     //Add text editor
     $('#compose').summernote();
    // $('#compose').summernote({
    //   callbacks: {
    //     onchange: function(contents, $editable){
    //       $('#compose').val($('#compose').summernote('isEmpty')? "" :contents);
    //     }
    //   }
    // });

    $('.select-tags').select2({
        placeholder: '-- Select --'
    });

    var base = $('#base_url').val();
    //var segment = $('#segment').val();
    
    var icon = $('#icon-path').val();

      function filePreview(input){

        if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload = function(e){
            $('#company-icon-form + img').remove();
            // $('#company-icon-form').after('<img src="'+e.target.result+'" width="300" height="300"/>');
             $('#imagepreview').attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
        }
      }

       function filePreview1(input){

        if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload = function(e){
            $('#company-logo-form + img').remove();
            // $('#company-icon-form').after('<img src="'+e.target.result+'" width="300" height="300"/>');
             $('#imagepreview1').attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
        }
      }

      function filePreview2(input){

        if(input.files && input.files[0]){
          var i;
          var html = '';

          var preview = document.getElementById('file_preview');

            preview.innerHTML = "";
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png)$/;
              
           for(i = 0; i < input.files.length; i++){

            var file = input.files[i];

            if(regex.test(file.name.toLowerCase())){

              var reader = new FileReader();
               reader.onload = function(e){

               var img = document.createElement("IMG");
                   img.height = "300";
                   img.width = "300";
                   img.src = e.target.result;
                   preview.appendChild(img);
               }
                reader.readAsDataURL(file);
              }else{
                  $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp This image file: "+file.name+" is not valid!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>");
              }
           }
        }else{
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Image file is not valid!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>");
          }
      }

      $('#file_upload').on('change', function () { 
         filePreview2(this);
      });
      
      $('#attachment').on('change', function () { 
         filePreview(this);
      });

      $('#attachment1').on('change', function () { 
         filePreview1(this);
      });

      $('#company-icon-form').on('submit', function (e) {
          e.preventDefault();

          $.ajax({
            url: base+'admin/crud/maintenance/updateIcon/company_icon/1',
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            async: true,
            dataType: 'json',
            success: function(response){
              if(response.success){
                  window.top.location = base+'home/maintenance/company-icon/true';
              }
              else{
                $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't upload please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
              }

            },
             error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
   
      });
    });

    $('#company-logo-form').on('submit', function (e) {
          e.preventDefault();

          $.ajax({
            url: base+'admin/crud/maintenance/updatelogo/company_logo/1',
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            async: true,
            dataType: 'json',
            success: function(response){
              if(response.success){
                  window.top.location = base+'home/maintenance/company-logo/true';
              }
              else{
                $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't upload please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
              }

            },
             error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
   
       });
    });

    $('#company-name-form').on('submit', function(e){
       e.preventDefault();

      var data = $('#company-name-form').serialize();

    	  $.ajax({
            url: base+'admin/crud/maintenance/update/company_name/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-name/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

     $('#company-mission-form').on('submit', function(e){
       e.preventDefault();

      var data = $('#company-mission-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/company_mission/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-mission/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

    $('#company-vision-form').on('submit', function(e){
       e.preventDefault();

      var data = $('#company-vision-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/company_vision/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-vision/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

    $('#company-about-form').on('submit', function(e){
       e.preventDefault();
      var data = $('#company-about-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/company_about/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-about/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

    $('#company-history-form').on('submit', function(e){
       e.preventDefault();

      var data = $('#company-history-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/company_history/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-history/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

    $('#company-footertext-form').on('submit', function(e){
       e.preventDefault();
      var data = $('#company-footertext-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/company_footertxt/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-footertext/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

    $('#company-address-form').on('submit', function(e){
      e.preventDefault();

      var data = $('#company-address-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/company_address/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-address/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

    $('#company-terms-and-conditions-form').on('submit', function(e){
      e.preventDefault();

      var data = $('#company-terms-and-conditions-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/terms_and_conditions/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){
               if(response.success){
                   window.top.location = base+'home/maintenance/company-terms-and-conditions/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

    $('#company-mobile-form').on('submit', function(e){
      e.preventDefault();

      var data = $('#company-mobile-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/company_no/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-mobile/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

    $('#company-telephone-form').on('submit', function(e){
      e.preventDefault();

      var data = $('#company-telephone-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/company_tel/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-telephone/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

    $('#company-email-form').on('submit', function(e){
      e.preventDefault();

      var data = $('#company-email-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/company_email/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-email/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

     $('#company-fbpage-form').on('submit', function(e){
      e.preventDefault();

      var data = $('#company-fbpage-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/company_fbpage/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-fbpage/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

     $('#company-fbaccount-form').on('submit', function(e){
      e.preventDefault();

      var data = $('#company-fbaccount-form').serialize();

        $.ajax({
            url: base+'admin/crud/maintenance/update/company_fb/1',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-fbaccount/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    });

    $('#edit_category').change(function(){
       var id = $('#edit_category option:selected').val();
       window.top.location = base+"home/maintenance/company-create-category/edit/"+id;
       // $.ajax({
       //  type: 'ajax',
       //    url: base+'admin/crud/maintenance/read/category_info/'+id,
       //    headers: {'X-Requested-With':'XMLHttpRequest'},
       //    method: 'GET',
       //    async: true,
       //    dataType: 'json',
       //    success: function(response){
       //         response.success ? (
       //          //console.log(response.data[0].Category_desc),
       //            $('input[name=company_cat_title]').val(response.data[0].Category_title),
       //            $('#compose').text(response.data[0].Category_desc),
       //             console.log(response.data[0].Category_desc)
       //          ): false;
       //    },
       //    error: function(xhr){
       //        $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
       //    }
       // });
    });

    $('#company-create-category-form').on('click', '.category-discard', function(){
      var categ_mode = $('#categ_actions').val();
       window.top.location = base+'home/maintenance/company-create-category/'+categ_mode;
    });

    function create_category(data, categoryM){

       $.ajax({
            url: base+'admin/crud/maintenance/create/accomodation/create-category',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                   window.top.location = base+'home/maintenance/company-create-category/'+categoryM+'/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't create. Please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
    }

   function edit_category(data, categ_mode){
       
       var category_id = $('#edit_category_id').val();
       $.ajax({
            url: base+'admin/crud/maintenance/update-category/accomodation/'+category_id+'/edit_category_data',
            headers: {'X-Requested-With':'XMLHttpRequest'},
            method: 'GET',
            data: data,
            cache: true,
            async: true,
            dataType: 'json',
            success: function(response){ 
               if(response.success){
                    window.top.location = base+'home/maintenance/company-create-category/'+categ_mode+'/true';
               }else{
                 $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't edit. Please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
               }
            },
            error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
        });
   }

    $.validator.setDefaults({
        ignore: ":hidden, [contenteditable='true']:not([name])",
        submitHandler: function () {
         var data = $('#company-create-category-form').serialize();
         var categ_mode = $('#categ_actions').val();
         if($('#compose').summernote('isEmpty')){
             $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Description cannot be empty.</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
          }else{
            switch(categ_mode){
              case 'create':
                  create_category(data, categ_mode);
                break;
              case 'edit':
                  edit_category(data, categ_mode);
                break;
             }
          }
        }
     });

    $('#company-create-category-form').validate({
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

    $('#company-create-sub-category-form').on('submit', function (e) {
          e.preventDefault();
          if($('#compose').summernote('isEmpty')){
             $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Description cannot be empty.</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(5000).fadeOut('slow');
          }else{
          var categoryID = $('#category_id').val();
          $.ajax({
            url: base+'admin/crud/maintenance/create-sub-category/accomodation/'+categoryID,
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            async: true,
            dataType: 'json',
            success: function(response){
              if(response.success){
                  window.top.location = base+'home/maintenance/company-create-sub-category/true';
              }
              else{
                $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't upload please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
              }

            },
             error: function(xhr){
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
   
         });
      }
    });


    // $("input[data-bootstrap-switch]").each(function(){
    //   $(this).bootstrapSwitch('state', $(this).prop('checked'));
    // });
    $('.custom-control-input').change(function(){
        // alert($(this).attr('id'))
        var status = "";
        var eventid = $(this).attr('id');
        var isActive = document.getElementById(eventid).checked;
        if(isActive){
          status = "Active";
        }else{
          status = "Inactive";
        }
        const url = base+"admin/crud/maintenance/update_events";
        var data = {};
            data.eventId = eventid;
            data.stat = status;

        $.post(url, data, function(data, status, xhr){
            if(xhr.status == 200){
              if(data.success){
                   window.top.location = base+'home/maintenance/company-event-types/true';
              }else{
                $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update reservation days. Please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
              }
            }else{
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
       }, 'JSON');

    });

    const $valueSpan = $('.valueSpan');
    const $value = $('#reservationDaysRange');

    $value.on('input change', () => {
      $valueSpan.html($value.val() +"day(s)");
    });

    $('#company-reservation-days-form').on('submit', function(){
       var data = $('#company-reservation-days-form').serialize();
    	 const url = base+"admin/crud/maintenance/update_settings";

       $.post(url, data, function(data, status, xhr){
            if(xhr.status == 200){
              if(data.success){
                   window.top.location = base+'home/maintenance/company-reservation-days/true';
              }else{
                $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Can't update reservation days. Please try again!</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
              }
            }else{
              $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found! ("+xhr.status + " " + xhr.statusText+")</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
            }
       }, 'JSON');
    });

})(jQuery);
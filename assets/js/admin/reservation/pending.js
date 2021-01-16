(function ($) {
  'use strict'

   
   // $("#example1").DataTable({
   //    "responsive": true,
   //    "autoWidth": false,
   //  });

   //  $('#example2').DataTable({
   //    "paging": true,
   //    "lengthChange": false,
   //    "searching": false,
   //    "ordering": true,
   //    "info": true,
   //    "autoWidth": false,
   //    "responsive": true,
   //  });

   var base = $('#base_url').val();
   var uriMode = $('#response_mode').val();
   var uriCon = $('#response_con').val();

   $('#pay_acc_no').mask("9999 9999 9999 9999");

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'PHP',
        minimumFractionDigits: 2
      });

    function response_alerts(res, bol, stat, msg){

      switch(res){
               case 'payment':
                    JSON.parse(uriCon) ? $('.alert-success').html("<h6><i class='fas fa-info-circle'></i>&nbsp Successfully update payment balance.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow') : window.top.location = base+"home/reservation/check-in";
                break;
            case 'creatingpdffile':
                    JSON.parse(uriCon) ? true : $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp Having problem in creating pdf file so that it was unable to send email notification to the customer. Please print it manually.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');
                break;
             case 'sendEmail':
                    JSON.parse(uriCon) ? $('.alert-success').html("<h6><i class='fas fa-info-circle'></i>&nbsp Successfully send invoice to the customer email address.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow') :  $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp Unable to send email notification to the customer. Please print it manually.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');
                break;
            case 'cancelled':
                    JSON.parse(uriCon) ?  $('.alert-success').html("<h6><i class='fas fa-info-circle'></i>&nbsp Successfully cancelled reservation.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow') : $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp Can't cancelled this reservation. Please try again.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');
                break;
              case 'no-data':
                     bol ? true : $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp "+msg+"</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(3000).fadeOut('slow');
                break;
              case 'msg-failed-res':
                    bol ? true: $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp "+msg+" </h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(6000).fadeOut('slow');
                break;
              case 'server-err':
                    bol ? true :  $('.alert-danger').html("<h6><i class='fas fa fa-warning'></i>&nbsp Server error found- "+stat+ " " +msg+"</h6><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
                break;
            }
     }

     const url = base+'admin/crud/read-settings/due_dates';
     $.getJSON(url, function(responseJSON){
          var storeDue;
          responseJSON.success ? storeDue = Number(responseJSON.data[0].value) : storeDue = 1;
            localStorage.setItem('storeDue', storeDue);
          }
        );
     
      Date.prototype.duedates = function(getdays) {
         this.setDate(this.getDate() - parseInt(getdays));
         return this;
      };

     var credentials =  new Array();

     function loadrequests(){
     
      $.ajax({
          type: 'ajax',
          url: base+'Admin/crud/reservation/read/pending',
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          async: true,
          cache: false,
          dataType: 'json',
          success: function(response){
              var badge = '';
              var html = '';
              var dNone = '';
              var danger = '';
              if(response.success){
                var dueDays = Number(localStorage.getItem('storeDue'));
                var i;
                let today = new Date();
                for(i=0; i<response.data.length; i++){
                         let dateDue = new Date(response.data[i].CheckIn);
                             dateDue = dateDue.duedates(dueDays);

                         var percent = response.data[i].Totalbill * .50;
                         var paid = response.data[i].Totalbill - response.data[i].Balance;
                          paid >= percent ? badge = 'badge-success': badge = 'badge-danger';
                          dateDue <= today ? ( dNone = 'd-none', danger = 'table-danger' ) : ( dNone = '', danger = '');
                             
                         html += '<tr class="'+danger+'">'+
                        '<td><center>'+response.data[i].CustomerId+'</td></center>'+
                        '<td><center>'+response.data[i].RCode+'</td></center>'+
                        '<td><center>'+response.data[i].LastName+'</td></center>'+
                        '<td><center>'+response.data[i].FirstName+'</td></center>'+
                        '<td><center>'+response.data[i].Mobile+'</td></center>'+
                        '<td><center>'+response.data[i].CheckIn+'</td></center>'+
                        '<td><center>'+response.data[i].RType+'</td></center>'+
                        '<td><center>'+formatter.format(response.data[i].Totalbill)+'</td></center>'+
                        '<td><center><span class="badge '+badge+'">'+formatter.format(response.data[i].Balance)+'</span></td></center>'+
                        '<td><center><button type="button" class="btn bg-warning down-btn dropdown-item '+dNone+'" data-toggle="modal" data-id="'+response.data[i].RCode+'" data-rel="'+response.data[i].Totalbill+'" value="'+response.data[i].Balance+'"><i class="fas fa-money-bill-wave"></i> Pay </button><button type="button" data-id="'+response.data[i].CustomerId+'" class="btn bg-info dropdown-item view"><i class="fa fa-search"></i>View</button></td></center>'+
                        '</tr>';
                        // '<td class="project-actions text-right"><div class="btn-group"><button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button><div class="dropdown-menu dropdown-menu-right">'+
                        // '<button type="button" class="btn bg-warning down-btn dropdown-item '+dNone+'" data-toggle="modal" data-id="'+response.data[i].RCode+'" data-rel="'+response.data[i].Totalbill+'" value="'+response.data[i].Balance+'"><i class="fas fa-money-bill-wave"></i> Pay </button>'+
                        // '</div></div></td>'+
                      // '</tr>';
                        // '<button href="#edit-btn" type="button" class="btn bg-primary edit-btn dropdown-item '+dNone+'" data-toggle="modal" data-id="'+response.data[i].RCode+'"><i class="fas fa-pencil-alt"></i> Edit </button>'+
                      //   '<button href="#cancel-btn" type="button" class="btn bg-danger cancel-btn dropdown-item" data-toggle="modal" data-id="'+response.data[i].RCode+'"><i class="fas fa-times-circle"></i> Cancel </button>'+
                      //   '</div></div></td>'+
                      // '</tr>';

                      credentials.push({
                          'RCode': response.data[i].RCode,
                          'CustomerId': response.data[i].CustomerId,
                          'LastName': response.data[i].LastName,
                          'CheckIn': response.data[i].CheckIn,
                          'Email': response.data[i].Email,
                          'Totalbill': response.data[i].Totalbill,
                          'Balance': response.data[i].Balance,
                          'RType': response.data[i].RType
                      });

                    }
                    //console.log(credentials);
                   $('#table').html(html);
                  }else{
                     // response_alerts('no-data', false, '', 'No pending reservation found!');
                     $('#tbl-caption').text("No pending reservation found.");
                  }
                },
                error: function(xhr){
                   response_alerts('server-err', false, xhr.status, xhr.statusText);
                }
            });
     }

      function check_billing(){

       var payment = $('#pay_payment').val();
       var totalbill = $('#rs-down-totalbill').val();
       var bal = $('#rs-down-bal').val();
       var computePercent = totalbill * .50;
       var newbal = parseFloat(bal) - parseFloat(payment);
       var totalpay = totalbill - newbal;
        
            if(newbal < 0 || parseFloat(totalpay) >= parseFloat(computePercent) || parseFloat(totalpay) < parseFloat(computePercent)){ return true }
            else{
               return false;
            }
   }

   function check_payment(val){

       // var totalbill = $('#rs-down-totalbill').val();
       // var bal = $('#rs-down-bal').val();
       // var computePercent = totalbill * .50;
       // var newbal = parseFloat(bal) - parseFloat(val);
       // var totalpay = parseFloat(totalbill) - parseFloat(newbal);

       // parseFloat(newbal) < 0 || parseFloat(totalpay) >= parseFloat(computePercent) ? 
       // ( $('#status').val('Confirmed') ) : 
       // ( $('#status').val('Pending') );



       // val != '' ? (
       //  $('#pay_bal').val(formatter.format(newbal)), 
       //  $('#rs-down-newbal').val(newbal) ) : 
       //  (
       //    $('#pay_bal').val(formatter.format(bal)),
       //    $('#rs-down-newbal').val(newbal)
       //  );
   }


   function cancel_accomodation(){

      var code = $('#cancel-code').val();
         $.ajax({
          type: 'ajax',
          url: base+'Admin/crud/reservation/cancel-accomodation/'+code,
          headers: {'X-Requested-With':'XMLHttpRequest'},
          async: true,
          cache: false,
          dataType: 'json',
          success: function(response){
              response.success ? window.top.location = base+"home/reservation/pending/cancelled/true" : 
              response_alerts('msg-failed-res', false, '', 'Can`t cancelled this reservation. Please try again.');
            },
            error: function(xhr){
               response_alerts('server-err', false, xhr.status, xhr.statusText);
            }
        });
   }

   var customerHaveSameDate;
   var customerWasApproved;

   function send_notification(down_id, ornumber){

       var result = credentials.find(obj => { return obj.RCode === down_id });
       customerHaveSameDate = new Array();
       customerWasApproved = new Array();

        customerWasApproved.push({
          'CustomerId': result.CustomerId,
          'RCode': result.RCode,
          'LastName': result.LastName,
          'CheckIn': result.CheckIn,
          'Email': result.Email,
          'RType': result.RType
        });

       for(var i = 0; i < credentials.length; i++){
           if(result.CheckIn == credentials[i].CheckIn){
             if(result.RCode != credentials[i].RCode){
                customerHaveSameDate.push({
                  'CustomerId': credentials[i].CustomerId,
                  'RCode': credentials[i].RCode,
                  'Email': credentials[i].Email,
                  'CheckIn': credentials[i].CheckIn,
                  'RType': credentials[i].RType
                });
             }
           }
       }
       
       if(customerHaveSameDate.length > 0){
           $.ajax({
              type: 'ajax',
              url: base+'Admin/crud/reservation/send_notification_for_resched',
              headers: {'X-Requested-With':'XMLHttpRequest'},
              method: 'GET',
              data: {data: JSON.stringify(customerHaveSameDate), approved: JSON.stringify(customerWasApproved)},
              async: true,
              cache: false,
              dataType: 'json',
              success: function(response){
                   response.success ? window.top.location = base+"home/reservation/invoice/"+result.RCode+"/or/"+ornumber+"/pending/true"  : response_alerts('msg-failed-res', false, '', 'Can`t send email to the customer date conflict. Please inform them manually.');
                },
                error: function(xhr){
                  response_alerts('server-err', false, xhr.status, xhr.statusText);
              }
          });
       }else{
           window.top.location = base+"home/reservation/invoice/"+result.RCode+"/or/"+ornumber+"/pending/true"; 
           //home/reservation/invoice/HETR202101024WSEMF/or/000001/payment/true
       }
     
   }
     var tmp_reserved_details = {};

     function reservation_details(id, OR){
        const url = base+'admin/crud/reservation/reservation-read-reserved/'+id;
        const urlpost = base+'admin/crud/reservation/reservation-create-reserved';
          $.getJSON(url, function(data, status, xhr){
                if(xhr.status == 200){
                     if(data.success){
                        for (var i = 0; i < data.data.length; i++) {

                          tmp_reserved_details.invoice = OR;
                          tmp_reserved_details.RCode = data.data[i].RCode;
                          tmp_reserved_details.CsCode = data.data[i].CsCode;
                          tmp_reserved_details.rs_days = data.data[i].rs_days;
                          tmp_reserved_details.rs_id = data.data[i].rs_id;
                          tmp_reserved_details.rs_package = data.data[i].rs_package;
                          tmp_reserved_details.rs_description = data.data[i].rs_description;
                          tmp_reserved_details.rs_price = data.data[i].rs_price;
                          tmp_reserved_details.rs_status = data.data[i].rs_status;

                            $.post(urlpost, tmp_reserved_details, function(data, status, xhr){
                                if(xhr.status == 200){
                                      console.log(data);
                                 }else{
                                   response_alerts('server-err', false, xhr.status, xhr.statusText);
                                 }
                            });
                         }

                        send_notification(id, OR); 

                     }else{
                        response_alerts('msg-failed-res', false, '', data.message);
                     }
                }else{
                  response_alerts('server-err', false, xhr.status, xhr.statusText);
                }
               
          });
     }

     function update_payment(){

       var id = $('#rs-down-id').val();
       var data = $('#down-accomodation').serialize();
       var ornumber = $('#Or_pay').val();

        $.ajax({
        type: 'ajax',
          url: base+'Admin/crud/reservation/update/'+id,
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          data: data,
          async: true,
          cache: false,
          dataType: 'json',
          success: function(response){
              response.success ? ( 
                 reservation_details(id, ornumber) 
                 
              ) : response_alerts('msg-failed-res', false, '', response.data);
            },
            error: function(xhr){
              response_alerts('server-err', false, xhr.status, xhr.statusText);
            }
        });

   }

  var OR_Number = 0;
  var customer_id;

   function _OR_Number(down_id, bal, totalbill){

        $.ajax({
        type: 'ajax',
          url: base+'Admin/crud/reservation/ornumber',
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          async: true,
          cache: false,
          dataType: 'json',
          success: function(response){
            if(response.success){
                   var field = document.getElementById('pay_payment');
                   var attmax = document.createAttribute("max");
                   var attmin = document.createAttribute("min");

                   var needTopay = parseFloat(totalbill) * .50;
                   // attmax.value = bal;
                   // field.setAttributeNode(attmax);
                   attmin.value = needTopay;
                   field.setAttributeNode(attmin);
                   var result = credentials.find(obj => { return obj.RCode === down_id });
                   customer_id = result.CustomerId;

                  $('.downpayment').html("Amount should at least be <u>"+  formatter.format(needTopay, 2)+"</u>");
                  $('#Or_pay').val(response.data);
                  $('#rs-down-bal').val(bal);
                  $('#rs-down-totalbill').val(totalbill);
                  $('#pay_bal').val(formatter.format(bal));
                  $('#down-code').html('<h3>'+down_id+'</h3>');
                  $('#rs-down-id').val(down_id);
                  $('#rs-down-csid').val(result.CustomerId);
                  $('#down-btn').modal('show');
              }else{
                response_alerts('msg-failed-res', false, '', 'Problem in OR number. Please try again.');
              }
            },
            error: function(xhr){
              response_alerts('server-err', false, xhr.status, xhr.statusText);
            }
        });
   }

   const $change = $('#pay_change');

   function cash_tendered(csID, val, isFull){
      var res = credentials.find(obj => { return obj.CustomerId === csID });
        
          var comAtPercent = parseFloat(res.Totalbill) * .50;

          if(parseFloat(val) > parseFloat(comAtPercent) && parseFloat(val) < parseFloat(res.Totalbill) && isFull){
              var com = parseFloat(val) - parseFloat(comAtPercent);
              $change.val(parseFloat(com));

            }else if(parseFloat(val) > parseFloat(res.Totalbill) && isFull){
              var com = parseFloat(val) - parseFloat(res.Totalbill);
              $change.val(parseFloat(com));

            }else if(parseFloat(val) > parseFloat(res.Totalbill) && isFull === false){
              var com = parseFloat(val) - parseFloat(res.Totalbill);
              $change.val(parseFloat(com));

            }else{
               $change.val(0);
            }

           var newbal = Number(parseFloat(res.Balance) - parseFloat(val));
           var totalpay = Number(parseFloat(res.Totalbill) - parseFloat(newbal));

           parseFloat(newbal) < 0 || parseFloat(totalpay) >= parseFloat(comAtPercent) ? 
           ( $('#status').val('Confirmed') ) : 
           ( $('#status').val('Pending') );

           const changeVal = Number($change.val());

           val > 0 ? ( $('#rs-down-newbal').val(newbal + changeVal),
            $('#pay_bal').val(formatter.format(res.Balance + changeVal)) ) : 
            (
              $('#pay_bal').val(formatter.format(res.Balance + changeVal)),
              $('#rs-down-newbal').val(newbal + changeVal)
            );
           
           parseFloat(val) >= parseFloat(res.Totalbill) ? ( 
           $('#pay_bal').val(formatter.format(0)), 
           $('#rs-down-newbal').val(0) ) : 
           $('#pay_bal').val(formatter.format(newbal + changeVal));
           
   }

   $('.form-check-input').click(function(){
        const $thisPay = $('#pay_payment').val();

        var amountPay = $thisPay != '' ? $thisPay : 0;
        var $no = document.getElementById("radioNo").checked;
        cash_tendered(customer_id, amountPay, $no);
   });

   response_alerts(uriMode, uriCon, '', '');

   loadrequests();


   $('.alert').alert();
   $('.dropdown-toggle').dropdown();

   $('.new-btn').on('click', function(){
      $('#new-btn').modal('show');
   });

   $('#table').on('click', '.cancel-btn', function(){
      var html = $(this).attr('data-id');
      $('#code').html('<h3>'+html+'</h3>');
      $('#cancel-code').val(html);
   });

   $('#table').on('click', '.edit-btn', function(){
      var html = $(this).attr('data-id');
      $('#rsCode').html('<h3>'+html+'</h3>');
   });

   $('#table').on('click', '.down-btn', function(){
      $('#down-accomodation')[0].reset();
      var down_id = $(this).attr('data-id');
      var result = credentials.find(obj => { return obj.RCode === down_id });
      _OR_Number(down_id, result.Balance, result.Totalbill);
      //console.log(OR_Number);

   });

   $('#pay_modeofpayment').change(function(){

        var field = document.getElementById('pay_payment');
        var attmax = document.createAttribute("max");

        var mode = $(this).val();
        if(mode != 1){
           $('.bank-details-form').addClass('d-none');
           document.getElementById('pay_payment').removeAttribute("max");
        } else{
            $('.bank-details-form').removeClass('d-none');
            var id = $('#rs-down-id').val();
            var result = credentials.find(obj => { return obj.RCode === id });
            attmax.value = result.Balance;
            field.setAttributeNode(attmax);
         } 

         if(mode != 0){
            $('.cash-method').addClass('d-none') 
         }else{
             $('.cash-method').removeClass('d-none');
          }
       // console.log(mode);
        //$('#down-accomodation')[0].reset();
   });

   $('#pay_payment').change(function(){
       var val = $(this).val();
       var $no = document.getElementById("radioNo").checked;
       cash_tendered(customer_id, Number(val), $no);
       //check_payment(val);
   });

   $('#pay_payment').keyup(function(){
        var val = $(this).val();
        val != '' ? true : val = 0;
        var $no = document.getElementById("radioNo").checked;
        cash_tendered(customer_id, Number(val), $no);
        //check_payment(val);
   });

   // $('#status').change(function(){
   //      var val = $('#pay_payment').val();
   //      check_payment(val);
   // });

   $('.cancel-accomodation').on('click', function(){
         cancel_accomodation();
         $('#cancel-btn').modal('hide');
   });

   $('.cancel-down').on('click', function(){
        $('#down-accomodation')[0].reset();
   });

   $('#table').on('click', '.view', function(){
          var id = $(this).attr('data-id');
           window.top.location = base+'home/reservation/view-info/'+id;
   });

   ///function validateCard(){

     

        // if($('.has-error').length){
        //   return true;
        // }else{
        //   return false;
        // }
        //console.log($('.has-error').length);
        //console.log('run');
        // $('.validation').removeClass('text-danger text-success');
        // $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
  // }
//
   $('#cc_number').keyup(function(){

     $('[data-numeric]').payment('restrictNumeric');
     $('.cc-number').payment('formatCardNumber');

      var cardNumber = $(this).val();
      var obj =  new CreditCard();
      var getcard = cardNumber.split(" ").join("");

      var cardname = obj.getCreditCardNameByNumber(getcard);
      $('.cc-brand').text(cardname);
    

      // $.fn.toggleInputError = function(erred) {
      //   this.parent('.form-group').toggleClass('has-error', erred);
      //   return this;
      // };

      // var cardType = $.payment.cardType($('.cc-number').val());
      //   $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
      //   $('.cc-brand').text(cardType);
      //    $(this).removeClass('is-invalid is-valid');
      //    $(this).addClass($('.has-error').length || cardType == null ? 'is-invalid' : 'is-valid');
         //console.log(cardType);
   });

   //$('#pay_payment').mask("0000000000");
   var mode = 0;
   $('#down-accomodation').on('click', '.btn-down-update', function(){
       // var payment = $('#pay_payment').val();
       // var bal = $('#rs-down-bal').val();
       // var newbal = parseFloat(bal) - parseFloat(payment);
       // $('#rs-down-newbal').val(parseFloat(newbal));
       mode = 1;
   });

   $.validator.setDefaults({
        submitHandler: function () {
          switch(mode){
              case 1:
                check_billing() ? 
                ( update_payment() ) : response_alerts('msg-failed-res', false, '', 'Can`t confirmed this reservation because the total balance was less than the half of the total bill. Please pay again.');

                $('#down-accomodation')[0].reset();
                $('#down-btn').modal('hide');
                break;
              case 2:
                alert(mode);
                break;
              case 3:
                alert(mode);
                break;
              case 4:
                alert(mode);
                break;
          }
        }
     });

     $('#new-accomodation').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          //$(element).removeClass('is-valid');
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
          // $(element).addClass('is-valid');
        }
     });

     $('#down-accomodation').validate({
        rules : {
          cc_number: { creditcard: true }
        },
        messages: {
          cc_number: "Please enter a valid card number"
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

     // var editBTN = $('#table').hasClass('edit');
     //   editBTN.on('click', function(){
     //        alert('hello');
     //   });
  
})(jQuery);
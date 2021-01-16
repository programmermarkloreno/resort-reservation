(function($){
	'use strict'

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'PHP',
        minimumFractionDigits: 2
      });

    /* BOOTSTRAP SLIDER */
   // $('.slider').bootstrapSlider();

    
   var base = $('#base_url').val();
   var uriMode = $('#response_mode').val();
   var uriCon = $('#response_con').val();


   function response_alerts(res, bol, stat, msg){

      switch(res){
               case 'check-out':
                      JSON.parse(bol) ? $('.alert-success').html("<h6><i class='fas fa-info-circle'></i>&nbsp Successfully check-out.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow') : window.top.location = base+"home/reservation/check-in";
                  break;
              case 'additional':
                      JSON.parse(bol) ? $('.alert-success').html("<h6><i class='fas fa-info-circle'></i>&nbsp You`ve successfully add item.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow') : window.top.location = base+"home/reservation/check-in";
                  break;
              case 'extend':
                    // uriCon ?  $('.alert-success').html("<h6><i class='fas fa-info-circle'></i>&nbsp Successfully cancelled reservation.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow') : $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp Can't cancelled this reservation. Please try again.</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(5000).fadeOut('slow');
                  break;
              case 'no-data':
                     bol ? true : $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp "+msg+"</h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(3000).fadeOut('slow');
                break;
              case 'msg-failed-res':
                    bol ? true: $('.alert-danger').html("<h6><i class='fas fa-info-circle'></i>&nbsp "+msg+" </h6><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(6000).fadeOut('slow');
                break;
              case 'server-err':
                    bol ? true :  $('.alert-danger').html("<h4><i class='fas fa fa-warning'></i>&nbsp Server error found- "+stat+ " " +msg+"</h4><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>").fadeIn().delay(3000).fadeOut('slow');
                break;
            }
     }


  response_alerts(uriMode, uriCon, '', '');

   Date.prototype.checkDateOut = function(getdays) {
           this.setDate(this.getDate() - parseInt(getdays));
           return this;
   };

   Date.prototype.addDays = function(getdays) {
           this.setDate(this.getDate() + parseInt(getdays));
           return this;
   };

  var check_in_lists = [];

  loadrequests();

  function loadrequests(){

    	$.ajax({
    		type: 'ajax',
          url: base+'admin/crud/reservation/read/check_in',
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          async: true,
	        dataType: 'json',
	        success: function(response){
              if(response.success){
                var dNone = '';
                var badge = '';
              	var html = '';
    		        var i;
    		        for(i=0; i<response.data.length; i++){

                         let dateIn = new Date(response.data[i].CheckIn+" "+response.data[i].TimeIn);
                         let datecheckin = dateIn.toDateString()+" "+dateIn.toLocaleTimeString();

                         let dates = new Date(response.data[i].CheckIn+" "+response.data[i].TimeIn);
                         let dateToday = new Date();
                         var getDate = dates.addDays(response.data[i].NDays);
                         let dateLeave = getDate.toDateString()+" "+getDate.toLocaleTimeString();

                         var Timeleft = getDate.getTime() - dateToday.getTime();
                         var DaysLeft = Timeleft /(1000 * 3600 * 24);
                             DaysLeft = Math.round(DaysLeft);

                         var percent = response.data[i].Totalbill * .50;
                         var paid = response.data[i].Totalbill - response.data[i].Balance;
                          paid >= percent ? badge = 'badge-success': badge = 'badge-danger';

                          DaysLeft < 1 ? dNone = 'd-none' : dNone = '';

    	                   html += '<tr>'+
                        '<td><center>'+response.data[i].CustomerId+'</td></center>'+
                        '<td><center>'+response.data[i].RCode+'</td></center>'+
                        '<td><center>'+response.data[i].Company+'</td></center>'+
                        '<td><center>'+response.data[i].Mobile+'</td></center>'+
                        '<td><center>'+datecheckin+'</td></center>'+
                        '<td><center>'+dateLeave+'</td></center>'+
                        '<td><center>'+response.data[i].RType+'</td></center>'+
                        '<td><center>'+formatter.format(response.data[i].Totalbill)+'</td></center>'+
                        '<td><center><span class="badge '+badge+'">'+formatter.format(response.data[i].Balance)+'</span></td></center>'+
                        '<td class="project-actions text-right"><div class="btn-group"><button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button><div class="dropdown-menu dropdown-menu-right">'+
                        '<button type="button" class="btn bg-warning checkout-btn dropdown-item" data-toggle="modal" data-id="'+response.data[i].RCode+'"><i class="fas fa-check-square"></i> Check-Out </button>'+
                        '<button type="button" class="btn bg-primary additional-btn dropdown-item '+dNone+'" data-toggle="modal" data-id="'+response.data[i].RCode+'"><i class="fas fa-pencil-alt"></i> Additional </button>'+
                         '<button type="button" data-id="'+response.data[i].CustomerId+'" class="btn bg-info dropdown-item view"><i class="fa fa-search"></i> View</button>'+
                        // '<button type="button" class="btn bg-info extend-btn dropdown-item" data-toggle="modal" data-id="'+response.data[i].RCode+'"><i class="fas fa-pencil-alt"></i> Extend </button>'+
                        // '</div></div></td>'+
                      '</tr>';

                      check_in_lists.push({
                         'CustomerId': response.data[i].CustomerId,
                         'RCode': response.data[i].RCode,
                         'LastName': response.data[i].LastName,
                         'FirstName': response.data[i].FirstName,
                         'Mobile': response.data[i].Mobile,
                         'CheckIn': response.data[i].CheckIn,
                         'RType': response.data[i].RType,
                         'NDays': DaysLeft,
                         'dateIn': datecheckin,
                         'dateOut': dateLeave,
                         'Totalbill': response.data[i].Totalbill,
                         'Balance': response.data[i].Balance,
                      });

    			           }
    			         $('#table').html(html);
                   ///console.log(check_in_lists);
                  }else{
                     // response_alerts('no-data', false, '', 'No check-in customer found!');
                      $('#tbl-caption').text("No check-in customer found.");
                  }
                },
                error: function(xhr){
                    response_alerts('server-err', false, xhr.status, xhr.statusText);
                }
            });
		 }

  function update_status(){

       var id = $('#rs-down-id').val();
       var data = $('#checkout-accomodation').serialize();
       //console.log(data);
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
               response.success ?  window.top.location = base+"home/reservation/check-in/check-out/true" : response_alerts('msg-failed-res', false, '', 'Can`t check-out. Please try again.');
            },
            error: function(xhr){
                response_alerts('server-err', false, xhr.status, xhr.statusText);
            }
        });
   }

      var field = document.getElementById('pay_payment');
      var att = document.createAttribute("max");

    function check_billing(){

       var val = $('#pay_payment').val();
       var bal = $('#rs-down-bal').val();
       var totalpay = parseFloat(bal) - parseFloat(val);

       if(totalpay > 0){ return false }else{ return true }
   }

   function check_balance(val){

       var bal = $('#rs-down-bal').val();
       var totalpay = parseFloat(bal) - parseFloat(val);

       totalpay > 0 || val == '' ? $('#status').val('Check_in') : $('#status').val('Finished');

       val != '' ? $('#pay_bal').val(formatter.format(totalpay)) : $('#pay_bal').val(formatter.format(bal));
   }

   var pckgs = []; 

   function get_additional_pckgs(id){

       $.ajax({
          type: 'ajax',
          url: base+'admin/crud/reservation/read-additional/get_additional_pckgs',
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          async: true,
          dataType: 'json',
          success: function(response){
              if(response.success){

                      pckgs = new Array();
                  var options = '<option selected disabled> -- Select --</option>';
                  var i;
                  for(i=0; i<response.data.length; i++){
                        options += '<option value="'+response.data[i].sub_category_id+'">'+response.data[i].Category_title+'</option>';

                        pckgs.push({
                           'sub_category_id' :  response.data[i].sub_category_id, 
                           'Category_title' : response.data[i].Category_title, 
                           'Category_desc' : response.data[i].Category_desc, 
                           'price' : response.data[i].price, 
                           'capacity' : response.data[i].capacity 
                        });
                     }
                     //console.log(pckgs); 
                     $('#additional-pckgs').html(options);
                     $('#additional-down-code').html('<h3>'+id+'</h3>');
                     $('#rs-additional-id').val(id);
                     $('#additional-btn').modal('show');
                  }else{
                     response_alerts('no-data', false, '', 'No data found.');
                  }
                },
                error: function(xhr){
                    response_alerts('server-err', false, xhr.status, xhr.statusText);
                }
        });
   }

    $('#status').change(function(){
        var val = $('#pay_payment').val();
        check_balance(val);
   });

    $('#pay_payment').change(function(){
       var val = $(this).val();
       check_balance(val);
   });

   $('#pay_payment').keyup(function(){
        var val = $(this).val();
        check_balance(val);
   });

    const $valueSpan = $('.valueSpan');
    const $value = $('#customDaysRange');
    const $totAmount = $('#additional-pckgs-total');
    const $price = $('#additional-pckgs-price');
    const $capacity = $('#additional-pckgs-cpcty');
    const $change = $('#additional-pckgs-change');
    const $amountToPay = $('#additional-pckgs-totAmount');
    const $cashtender = $('#additional-pckgs-payment');
    const $amount = $('#additional-amount');
    var csBal;

   function additional_computation(price, capacity){
      var fielPay = document.getElementById('additional-pckgs-payment');
      var min = document.createAttribute("min");
      var max = document.createAttribute("max");
      var totAmount;
      var compute;
      $value.val() > 1 ? 
      ( 
          //compute = (parseFloat(price) * parseInt(capacity)) * $value.val(),
          compute = parseFloat(price) * $value.val(),
          $totAmount.html("Total Price: "+formatter.format(compute)),
          $amountToPay.val(compute + parseFloat(csBal)),
          min.value = compute + parseFloat(csBal),
          max.value = compute + parseFloat(csBal),
          fielPay.setAttributeNode(min)
          //fielPay.setAttributeNode(max) 
      ) 
      : ( 
          compute = parseFloat(price) * $value.val(),
          $totAmount.html("Total Price: "+formatter.format(compute)),
          $amountToPay.val(compute + parseFloat(csBal)),
          min.value = compute + parseFloat(csBal),
          max.value = compute + parseFloat(csBal),
          fielPay.setAttributeNode(min)
          //fielPay.setAttributeNode(max) 
      );

     $amount.val(Number(compute));
   }

    $valueSpan.html(1+"day(s)");
    $value.val(1);
    $value.on('input change', () => {
      $valueSpan.html($value.val() +"day(s)");
      additional_computation($price.val(), $capacity.val());
      var reschange = compute_change(Number($amountToPay.val()), Number($cashtender.val()));
      $change.val(reschange);
    });

    function compute_change(totamount, cash){

       var resultval = 0;
       if(cash > totamount){
         resultval = cash - totamount;
       }
        //$change.val(resultval);
        return resultval;
    }

   $('#additional-pckgs').change(function(){
    
        var id = $(this).val();
        var result = pckgs.find(obj => { return obj.sub_category_id === id });
        //var getBalance = check_in_lists.find(obj => { return obj.RCode === id });

        $price.val(result.price);
        $capacity.val(result.capacity);
        additional_computation(result.price, result.capacity);
        var reschange = compute_change(Number($amountToPay.val()), Number($cashtender.val()));
        $change.val(reschange);
   });

   $('.pay_modeofpayment').change(function(){
         
        var mode = $(this).val();
        mode != 1 ?  $('.bank-details-form').addClass('d-none') : $('.bank-details-form').removeClass('d-none');
   });

   $('#additional-pckgs-payment').change(function(){
       var reschange = compute_change(Number($amountToPay.val()), Number($(this).val()));
          $change.val(reschange);
   });

   $('#additional-pckgs-payment').keyup(function(){
       var reschange = compute_change(Number($amountToPay.val()), Number($(this).val()));
         $change.val(reschange);
   });

   $('#cc_number').keyup(function(){

     $('[data-numeric]').payment('restrictNumeric');
     $('.cc-number').payment('formatCardNumber');

      var cardNumber = $(this).val();
      var obj =  new CreditCard();
      var getcard = cardNumber.split(" ").join("");

      var cardname = obj.getCreditCardNameByNumber(getcard);
      $('.cc-brand').text(cardname);
  
   });

   $('#cc_number_chkout').keyup(function(){

     $('[data-numeric]').payment('restrictNumeric');
     $('.cc-number').payment('formatCardNumber');

      var cardNumber = $(this).val();
      var obj =  new CreditCard();
      var getcard = cardNumber.split(" ").join("");

      var cardname = obj.getCreditCardNameByNumber(getcard);
      $('.cc-brand').text(cardname);
  
   });

  var mode = 0;

   $('#table').on('click', '.extend-btn', function(){
       var id = $(this).attr('data-id');
       //get_additional_pckgs(id);
       $('#extend-btn').modal('show');
       mode = 3;
   });

   $('#table').on('click', '.view', function(){
        var id = $(this).attr('data-id');
         window.top.location = base+'home/reservation/view-info/'+id;
    });

   $('#table').on('click', '.additional-btn', function(){

       var id = $(this).attr('data-id');
       var field = document.getElementById('customDaysRange');
       var result = check_in_lists.find(obj => { return obj.RCode === id });
       $('#currentBal').html("Current Balance: "+formatter.format(result.Balance));
       csBal = result.Balance;
       att.value = result.NDays;
       field.setAttributeNode(att);
       get_additional_pckgs(id);
       mode = 2;
   });

    const $balance = $('#pay_Balance_chkout');
    const $totbill = $('#pay_TotalBill_chkout');
    const $ckcash = document.getElementById("chkout_cash");
    const $ckmop = document.getElementById("pay_MOP_chkout");
    const $ckchange = $('#chkout_change');
    const $tmpChkBal = $('#tmp_Balance_chkout');

    $('#table').on('click', '.checkout-btn', function(){
      var $rsId = $(this).attr('data-id');
      var result = check_in_lists.find(obj => { return obj.RCode === $rsId });
      var fielPay = document.getElementById('chkout_cash');
      var min = document.createAttribute("min");
      var readonly = document.createAttribute("readonly");

      const totBll = result.Totalbill;
      const bal = result.Balance;
      $('#rs-id').val(result.RCode);

      const $stat = $('#chkout_status');

      $totbill.val(formatter.format(totBll));
      $balance.val(formatter.format(bal));
      $tmpChkBal.val(bal);

      $('#down-code').html('<h3>'+$rsId+'</h3>');

       min.value = bal;
       fielPay.setAttributeNode(min);
      
        bal < 1 ? ( 
             readonly.value = true,
             $stat.val('Finished'),
             $ckcash.required = false,
             $ckmop.required = false,
             $ckcash.value = 0,
             $('.is-zero-balance').addClass('d-none')
             //$ckmop.setAttributeNode(readonly),
             //document.getElementById('chkout_cash')
             //$ckcash.setAttributeNode(readonly)
        ) : ( 
            //$stat.val('Checkin'), 
            $ckcash.required = true,
            $ckmop.required = true,
            $('.is-zero-balance').removeClass('d-none')
        );

       $('#checkout-btn').modal('show');
      
       mode = 1;
   });

    $('#chkout_status').change(function(){

       var $stat = $(this).val();

       let today = new Date();
       var res = check_in_lists.find(obj => { return obj.RCode === $('#rs-id').val() });
       let out = new Date(res.dateOut);
       if($stat == 'Check-In'){
            if(out >= today){
              $('.asked-checkout-label').addClass('d-none');
              $('.asked-checkout').addClass('d-none');
              document.getElementById("btn-chkout").disabled = false;
              document.getElementById("radioYes").checked = false;
            }else{
              $('#asked-mes').html("You must check-out this, out date is :"+out);
              $('.asked-checkout-label').removeClass('d-none');
              document.getElementById("btn-chkout").disabled = true;
            }
       }else if($stat == 'Finished'){
            if(today < out){
              $('#asked-mes').html("Do you want to check-out? Expected check-out is :"+out);
              $('.asked-checkout-label').removeClass('d-none');
              $('.asked-checkout').removeClass('d-none');
              document.getElementById("btn-chkout").disabled = true;
            }else{
              document.getElementById("btn-chkout").disabled = false;
              $('.asked-checkout-label').addClass('d-none');
              $('.asked-checkout').addClass('d-none');
            }
       }
    });

    $('.form-check-input').click(function(){
        var $yes = document.getElementById("radioYes").checked;
        if($yes){
          document.getElementById("btn-chkout").disabled = false;
        }else{
          document.getElementById("btn-chkout").disabled = true;
        }
   });

    $('#chkout_cash').keyup(function(){ 

       var res = compute_change(Number($tmpChkBal.val()), Number($(this).val()));
       $ckchange.val(res);
    })

    $('#chkout_cash').change(function(){ 
        var res = compute_change(Number($tmpChkBal.val()), Number($(this).val()));
        $ckchange.val(res);
    })


     $.validator.setDefaults({
        submitHandler: function () {
          switch(mode){
              case 1:
                const $chkrsID = $('#rs-id').val();
                const $st = $('#chkout_status').val();
                var clientGetInfo = check_in_lists.find(obj => { return obj.RCode === $chkrsID });
                const getchkdata =  $('#checkout-accomodation').serializeArray();
                const chkdata = JSON.stringify(getchkdata);
                const chkdataArr = JSON.parse(chkdata);
                var chkgetdataArr = {};

                for(var i = 0; i < chkdataArr.length; i++){
                   const name = chkdataArr[i].name;
                   const value = chkdataArr[i].value;
                     chkgetdataArr[name] = value;
                }

                 chkgetdataArr.RCode = clientGetInfo.RCode;
                 chkgetdataArr.CustomerId = clientGetInfo.CustomerId;
                 chkgetdataArr.Balance = clientGetInfo.Balance;
                 chkgetdataArr.date_created = $('#global-time').val();

                 //console.log(clientGetInfo.Balance)
                const chkurl = base+'admin/crud/reservation/reservation-checkout';
                $.post(chkurl, chkgetdataArr , function(data, status, xhr){

                      if(xhr.status == 200){
                           if(data.success){
                              window.top.location = base+"home/reservation/invoice/"+$chkrsID+"/checkout/true";
                           }else{
                              response_alerts('msg-failed-res', false, '', data.message);
                           }
                      }else{
                        response_alerts('server-err', false, xhr.status, xhr.statusText);
                      }
                     
                }, 'JSON');

              
                //console.log(getdataArr)
                 // check_billing() ? 
                 // ( update_status() ) : ( response_alerts('msg-failed-res', false, '', 'Can`t check-out because of its outstanding balance. Please pay exact balance.'),
                 //  $('#checkout-accomodation')[0].reset(),
                 //  $('#checkout-btn').modal('hide') );

                break;
              case 2:
                const $rsID = $('#rs-additional-id');
                var pckgsID = $('#additional-pckgs').children("option:selected").val();
                var pckgsGetInfo = pckgs.find(obj => { return obj.sub_category_id === pckgsID });
                var clientGetInfo = check_in_lists.find(obj => { return obj.RCode === $rsID.val() });

                const addData =  $('#additional-accomodation').serializeArray();
                const d = JSON.stringify(addData);
                const formArr = JSON.parse(d);
                var getdataArr = {};

                for(var i = 0; i < formArr.length; i++){
                   const name = formArr[i].name;
                   const value = formArr[i].value;
                     getdataArr[name] = value;
                } 

                 getdataArr.RCode = clientGetInfo.RCode;
                 getdataArr.CustomerId = clientGetInfo.CustomerId;
                 getdataArr.rs_days = $value.val();
                 getdataArr.rs_id = pckgsID;
                 getdataArr.rs_package = pckgsGetInfo.Category_title;
                 getdataArr.rs_description = pckgsGetInfo.Category_desc;
                 getdataArr.rs_price = pckgsGetInfo.price;
                 getdataArr.date_created = $('#global-time').val();

                 const url = base+'admin/crud/reservation/checkin-additional-pckgs'
                $.post(url, getdataArr , function(data, status, xhr){

                      if(xhr.status == 200){
                           if(data.success){
                              // window.top.location = base+"home/reservation/check-in/additional/true"
                              window.top.location = base+"home/reservation/invoice/"+clientGetInfo.RCode+"/additional/true"
                           }else{
                              response_alerts('msg-failed-res', false, '', data.message);
                           }
                      }else{
                        response_alerts('server-err', false, xhr.status, xhr.statusText);
                      }
                     
                }, 'JSON');

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

     $('#checkout-accomodation').validate({
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

     $('#additional-accomodation').validate({
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
  
})(jQuery)
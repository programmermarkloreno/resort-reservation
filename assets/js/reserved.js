(function ($){
	'use strict';


     /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex        : 1070,
              revert        : true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            })

          })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
       // var Draggable = FullCalendarInteraction.Draggable;

        var containerEl = document.getElementById('external-events');
        //var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        // new Draggable(containerEl, {
        //   itemSelector: '.external-event',
        //   eventData: function(eventEl) {
        //     //console.log(eventEl);
        //     return {
        //       title: eventEl.innerText,
        //       backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
        //       borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
        //       textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        //     };
        //   }
        // });
       //plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
        // var calendar = new Calendar(calendarEl, {
        //   plugins: [ 'bootstrap', 'interaction', 'timeGrid' ],
        //   header    : {
        //     left  : 'prev,next today',
        //     center: 'title',
        //     right : 'dayGridMonth,timeGridWeek,timeGridDay'
        //   },
        //   'themeSystem': 'bootstrap',
        //   //Random default events
        //   events    : [
        //     {
        //       title          : 'All Day Event',
        //       start          : new Date(y, m, 1),
        //       backgroundColor: '#f56954', //red
        //       borderColor    : '#f56954', //red
        //       allDay         : true
        //     },
        //     {
        //       title          : 'Long Event',
        //       start          : new Date(y, m, d - 5),
        //       end            : new Date(y, m, d - 2),
        //       backgroundColor: '#f39c12', //yellow
        //       borderColor    : '#f39c12' //yellow
        //     },
        //     {
        //       title          : 'Meeting',
        //       start          : new Date(y, m, d, 10, 30),
        //       allDay         : false,
        //       backgroundColor: '#0073b7', //Blue
        //       borderColor    : '#0073b7' //Blue
        //     },
        //     {
        //       title          : 'Lunch',
        //       start          : new Date(y, m, d, 12, 0),
        //       end            : new Date(y, m, d, 14, 0),
        //       allDay         : false,
        //       backgroundColor: '#00c0ef', //Info (aqua)
        //       borderColor    : '#00c0ef' //Info (aqua)
        //     },
        //     {
        //       title          : 'Birthday Party',
        //       start          : new Date(y, m, d + 1, 19, 0),
        //       end            : new Date(y, m, d + 1, 22, 30),
        //       allDay         : false,
        //       backgroundColor: '#00a65a', //Success (green)
        //       borderColor    : '#00a65a' //Success (green)
        //     },
        //     {
        //       title          : 'Click for Google',
        //       start          : new Date(y, m, 28),
        //       end            : new Date(y, m, 29),
        //       url            : 'http://google.com/',
        //       backgroundColor: '#3c8dbc', //Primary (light-blue)
        //       borderColor    : '#3c8dbc' //Primary (light-blue)
        //     }
        //   ],
        //   editable  : false,
        //   droppable : false, // this allows things to be dropped onto the calendar !!!
        //   drop      : function(info) {
        //     // is the "remove after drop" checkbox checked?
        //    // if (checkbox.checked) {
        //       // if so, remove the element from the "Draggable Events" list
        //       info.draggedEl.parentNode.removeChild(info.draggedEl);
        //     //}
        //   }    
        // });

        //calendar.render();
        // $('#calendar').fullCalendar()

        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function (e) {
          e.preventDefault()
          //Save color
          currColor = $(this).css('color')
          //Add color effect to button
          $('#content').css({
            'background-color': currColor,
            'border-color'    : currColor
          })
        });

        $('#add-new-event').click(function (e) {
          e.preventDefault()
          //Get value and make sure it is not null
          var val = $('#new-event').val()
          if (val.length == 0) {
            return
          }

          //Create events
          var event = $('<div />')
          event.css({
            'background-color': currColor,
            'border-color'    : currColor,
            'color'           : '#fff'
          }).addClass('external-event')
          event.html(val)
          $('#external-events').prepend(event)

          //Add draggable funtionality
          ini_events(event)

          //Remove event from text input
          $('#new-event').val('')
        }); 

     var base = $('#base_url').val();
     
     showSchedule();
     function showSchedule(){
      var dataAssign = [];
      $.ajax({
          type: 'ajax',
          url: base+'admin/crud/reserved/read',
          headers: {'X-Requested-With':'XMLHttpRequest'},
          method: 'GET',
          async: true,
          dataType: 'json',
          success: function(response){

            var i;
            var date = '';

            for(i = 0; i < response.data.length; i++){

                 console.log(response.data[i].CheckIn)
              var startdate = response.data[i].CheckIn;
              var enddate = response.data[i].CheckOut;
              var start = response.data[i].TimeIn;
              var end = response.data[i].TimeOut;

              dataAssign.push({
                title          : response.data[i].tracking_code,
                start          : new Date(startdate+" "+start),
                end            : new Date(enddate+" "+end),
                allDay         : false,
                backgroundColor: '#f56954', 
                borderColor    : '#f56954'
              });
            }
            
            setCalendar(dataAssign);
            // var i = response.data[0].time_in;
            // var j = response.data[0].time_out;

            // var i = "10:20";
            // var j = "10:25";

            // var startHour = parseInt(i.substring(0, 2));
            // var startMin = parseInt(i.substring(3));

            // var endHour = parseInt(j.substring(0, 2));
            // var endMin = parseInt(j.substring(3));

            // if((startHour == endHour && startMin == endMin) ||
            //  (startHour > endHour)){
            //  console.log(false);
            // }else{
            //  console.log(true);
            // }
            //console.log(startMin);

            // var date = response.data[0].assign_date;
            //var dt = new Date(date+" "+i);
            //console.log(dt);
            // let [hour, minute] = ( new Date(date+" "+i) ).toLocaleTimeString().slice(0,7).split(":");
            // console.log([hour, minute]);
              
            // var html = '';
            // var i;
            // for(i=0; i<response.data.length; i++){
          
            // }
            //new Date("2020-09-09"+" "+"10:45")
          // new Date("2020-09-09"+" "+"12:45")
          },
          error: function(xhr){
              $('.alert-danger').html("<h4><i class='fas fa fa-warning'></i>&nbsp Server error found-"+xhr.status + " " + xhr.statusText+"</h4><button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fas fa-window-close'></i></button>").fadeIn().delay(3000).fadeOut('slow');
          }
        });
         }

         function setCalendar(data){

      var calendar = new Calendar(calendarEl, {
          plugins: [ 'bootstrap', 'interaction', 'timeGrid' ],
          header    : {
            left  : 'prev,next today',
            center: 'title',
            right : 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          'themeSystem': 'bootstrap',
          events    : data,
          editable  : false,
          droppable : false,
          drop      : function(info) {
              info.draggedEl.parentNode.removeChild(info.draggedEl);
            
          }    
        });

        calendar.render();
    }

})(jQuery);
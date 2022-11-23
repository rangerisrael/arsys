<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
  <title>Document</title>
  <style>
    html, body {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  font-size: 14px;
}

#calendar {
  max-width: 1100px;
  margin: 40px auto;
}
  </style>
</head>
<body>

</body>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();



  const eventList=[
      {
        title: "Gymnasium",
        start: new Date('2022-11-20'),
        end: new Date ('2022-11-22')
      },
      {
        title: "Accreditatio - Reserve 2",
        start: new Date('2022-11-23'),
        end: new Date ('2022-11-24')
      },
      {
        title: "AVR",
        start: new Date('2022-11-26'),
        end: new Date ('2022-11-28')
      },
         {
        title: "Convention",
        start: new Date('2022-11-29'),
        end: new Date ('2022-11-30')
      }
    ];





  var calendarEl = document.getElementById("calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    editable:true,
    nowIndicator: true,
    selectable: true,
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
    },
    dateClick: function (info) {
      var clickedDate = new Date(info.dateStr).toLocaleDateString();
      var nowDate = new Date().toLocaleDateString();
        //  console.log(clickedDate);
        //   console.log(nowDate);
       
      if (clickedDate >= nowDate){ 
          createEvent(info,clickedDate);
      }
      else  return false;
    },
  eventClick: (eventInfo) => {
        var clickValue = document.getElementById('data');
        var deleteValue = document.getElementById('delete');
          var event = calendar.getEventById(eventInfo.event.id);
     
  

          if(!clickValue || !deleteValue){

              let title = prompt('new event name');
             return eventInfo.event.setProp('title', title);
          }

        //     console.log(eventInfo);
            else{
              
            clickValue.addEventListener('click',function(){
               console.log('event clicked', eventInfo);
              let title = prompt('new event name');
             return eventInfo.event.setProp('title', title);
            })
            deleteValue.addEventListener('click',function(){      
                    deleteEvent(event);
            })
            }
     
    },
     eventSources: [

    // your event source
    {
      url: '/myfeed.php',
      type: 'POST',
      data: {
        custom_param1: 'something',
        custom_param2: 'somethingelse'
      },
      error: function() {
        alert('there was an error while fetching events!');
      },
      color: 'yellow',   // a non-ajax option
      textColor: 'black' // a non-ajax option
    }

    // any other sources...

  ],
    events: eventList , eventContent: function( info ) {
              
          return {html: info.event.title};
      }
    
  });

  calendar.render();

const events = [];
function createEvent(val,endDate) {
   

  event = {
    id: 1, // You must use a custom id generator
    title:`<div><p id='data'><b>Julie</b></p> <button id='delete'>Delete<span></button><img width='50' height='50' src='https://e7.pngegg.com/pngimages/978/439/png-clipart-online-hotel-reservations-travel-uzungol-booking-com-hotel-booking-business-bed-and-breakfast-thumbnail.png'/></div>`,
    data:'tester',
    start: val.dateStr,
    end :endDate,
    allDay:  endDate ? endDate : true, // If there's no end date, the event will be all day of start date
    textEscape: false 
}

console.log(val)

  calendar.addEvent(event);



}

function deleteEvent(event){
  return event.remove();
}



});

//get date without the time of day
function getDateWithoutTime(dt)
{
  dt.setHours(0,0,0,0);
  return dt;
}



</script>
</html>
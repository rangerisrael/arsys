<!DOCTYPE html>
<html lang="en">
  <?php include __DIR__.'./calendar-header/index.php'; ?>
  
  <?php include __DIR__.'./calendar-body/index.php';   ?>
</body>

<style>
    .card{
      position: relative;
      width: 100%;
      height: 80px;
      border: 1px solid red;
      padding: 5px;
    }
    .card-image{
      max-width: 100%;
      width: 100%;
      height: 100%;
      object-fit: contain;
      background-position:center bottom;
      border-radius: 8px;
    }

    .overlay{
      position: absolute;
      top: 0;
      bottom: 0;
      right: 0;
      left: 0;
      background: rgba(0, 0, 0, .45);
    }

    .overlay-text{
       display: flex;
       justify-content: flex-start;
       flex-direction: column;
     align-items: center;
      height: 100%;
      color: #ffffff;
      font-weight: 700;
      text-overflow: ellipsis;
      line-height: 24px;
     
    }
    .overlay-text p:first-child{
      font-weight: 700;
           margin: 0 !important;
      padding: 0 !important;
       font-size: 14px;
    

    }
      .overlay-text p:last-child{
      font-weight: 600; 
       font-size: 8px;
    
    }

    .overlay-close{
      width: 95%;
      display: flex;
      flex-direction: row;
      justify-content: flex-end;
      align-items: flex-end;
      color: #ffffff;
      font-size: 20px;
      margin: 0 !important;
      padding: 0 !important;
      cursor: pointer;

    
    }
    .fc-h-event{
      background: rgba(0, 0, 0, .1);
      border:transparent;
      border-radius: 8px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();



async function fetchDataToCalendar(url){
    const res = await fetch(url, {
    method: "GET",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    }
  }).catch((err) =>
   console.log(err)
  );

  return res.json();
}


 fetchDataToCalendar('./calendar-controller/getTotalCount.php').then(res => {

        var val = res.reduce(function(previousValue, currentValue) {
          return {
            new: Number(previousValue.new) + Number(currentValue.new),
            approve: Number(previousValue.approve) + Number(currentValue.approve),
            pending: Number(previousValue.pending) + Number(currentValue.pending),
            decline:Number(previousValue.decline) + Number(currentValue.decline),
            total: Number(previousValue.total) + Number(currentValue.total)
          
          }
        });


        
            var approval = document.querySelectorAll('#total');

            approval[0].textContent = val.new;
            approval[1].textContent = val.approve;
            approval[2].textContent = val.decline;
            approval[3].textContent = val.pending;

 


              google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['New', val.new],
          ['Approved', val.approve],
          ['Declined', val.decline],
          ['Pending', val.pending],
        ]);

        var options = {
          title: 'Daily Progress',
       'is3D':true,
        'width':'100%',
        'height':'100%',
         pieSliceText : 'value',
        slices: {
            0: { color: '#485370' },
            1: { color: '#363F4E' },
            2: { color: '#e74c4c' },
            3: { color: '#5b5d5e' }
        },
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }



 });





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
    editable:false,
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
         console.log(clickedDate);
          console.log(nowDate);
       
      if (clickedDate >= nowDate){ 
          createEvent(info,clickedDate);
          console.log('valid');
      }
      // else  {
      //   return false;
      // }
    },
  eventClick: (eventInfo) => {
        var clickValue = document.getElementById('data');
        var deleteValue = document.getElementById('delete');
          var event = calendar.getEventById(eventInfo.event.id);
     

            
            clickValue.addEventListener('click',function(){
               console.log('event clicked', eventInfo);
              let title = prompt('new event name');
             return eventInfo.event.setProp('title', title);
            })
            deleteValue.addEventListener('click',function(){      
                    deleteEvent(event);
                    console.log(click);
            })

    },
  //    eventSources: [

  //   // your event source
  //   {
  //     url: '/myfeed.php',
  //     type: 'POST',
  //     data: {
  //       custom_param1: 'something',
  //       custom_param2: 'somethingelse'
  //     },
  //     error: function() {
  //       alert('there was an error while fetching events!');
  //     },
  //     color: 'yellow',   // a non-ajax option
  //     textColor: 'black' // a non-ajax option
  //   }

  //   // any other sources...

  // ],
    events: async function(start, end, timezone, callback){
           const resp =await  fetchDataToCalendar('./calendar-controller/index.php');

           const data = await resp;

          //  console.log(restData.length);

            let event=[];

          for (let i = 0; i <= data.length; i++) {
                
                event.push({
                  id:data[i]?.id,
                  title: `<div class="card">
                    <img class="card-image" src="../../../../public/assets/10.png" alt="">

                    <div class="overlay">
                      <div id='delete' class="overlay-close">x</div>
                      <div class="overlay-text">
                        <p class="card-text">${data[i]?.title}</p>
                        <p>${data[i]?.id}</p>
                      </div>
                    </div>
                    </div>`,
                  description: 'long description',
                  start:data[i]?.startDate,
                  end:data[i]?.endDate
                });

          } 

              callback(calendar.addEventSource(event));

     


            

    } , eventContent: function( info ) {
              
          return {html: info.event.title};
      }
    
  });

  calendar.render();



  
const events = [];



function createEvent(val,endDate) {
   
  event = {
    id: 1, // You must use a custom id generator
    title:`<div><p id='data'><b>Julie</b></p> <button id='delete'>Delete<span></button><img width='50' height='50' src='https://e7.pngegg.com/pngimages/978/439/png-clipart-online-hotel-reservations-travel-uzungol-booking-com-hotel-booking-business-bed-and-breakfast-thumbnail.png'/></div>`,
    start: val.dateStr,
    end :endDate,
    allDay:  endDate ? endDate : true, // If there's no end date, the event will be all day of start date
    textEscape: false 
}

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
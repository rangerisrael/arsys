<style>

.fc-view{
  overflow:auto;
}


</style>



<section class="main">
  <section class="top">
      <!-- <section class="user_profile">
        <div class="account-avatar">
          <span id='avatar-name' class="account-avatar-name">J</span>
        </div>
        <div>
          <span onclick="showUserProfile();" id='avatar-text' class="acount-avatar-text">John Doe</span>
        </div>
      </section>

      <div onmouseleave="hide();" id="account-box" class='account-box box-hidden '>
        <div class="account-text">Account profile</div>
        <div onclick="logout();" class="account-text">Logout</div>
      </div>
    </section> -->

  </section>
  <div class="bottom">
<div class='calendar_wrapper'>
<div id='calendar'></div>
</div>
<div class="wrapper-list">
  <div class="total-box">
    <div class='box-first_row'>
       <div class='box-list total_reserve_list'>
        <p id='total'>0</p>
        <p>Total new reservation </p>
    </div>
    <div class='box-list  total_reserve_approve'>
        <p id='total'>0</p>
        <p>Total approve reservation </p>
    </div>
    </div>
   <div class='box-second_row'>
    <div class='box-list  total_reserve_declined'>
        <p id='total'>0</p>
        <p>Total declined reservation</p>
    </div>
    <div class='box-list  total_reserve_pending'>
        <p id='total'>0</p>
        <p>Total pending reservation</p>
    </div>
  </div>
  </div>
  <div class="chart">
    <div id="piechart" class="pie" ></div>
  </div>
</div>


</div>

  





</section>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="./chart/chart.min.js"></script>
    <script type="text/javascript">
      // google.charts.load('current', {'packages':['corechart']});
      // google.charts.setOnLoadCallback(drawChart);

      // function drawChart() {

      //   var data = google.visualization.arrayToDataTable([
      //     ['Task', 'Hours per Day'],
      //     ['New',     11],
      //     ['Approved',      2],
      //     ['Declined',  2],
      //     ['Pending', 2],
      //   ]);

      //   var options = {
      //     title: 'Daily Progress',
      //  'is3D':true,
      //   'width':900,
      //   'height':400,
        
      //   slices: {
      //       0: { color: '#485370' },
      //       1: { color: '#363F4E' },
      //       2: { color: '#e74c4c' },
      //       3: { color: '#5b5d5e' }
      //   },
          
      //   };

      //   var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      //   chart.draw(data, options);
      // }


      
    </script>
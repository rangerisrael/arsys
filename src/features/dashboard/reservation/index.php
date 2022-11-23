<!DOCTYPE html>
<html lang="en">
  <?php include __DIR__.'./reservation-header/index.php'; ?>
  
  <?php include __DIR__.'./reservation-body/index,php';   ?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



<script>
  
  
            $("#search").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#loopData tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            

            
</script>

<script>

async function fetchStatus(url){
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

  

async function fetchRequestUser(url) {
  const res = await fetch(url, {
    method: "GET",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    }
  }).catch((err) =>
   console.log(err)
  );





  const responseGet = await res.json();


  const statusGet = await fetchStatus('./reservation-controller/getStatus.php');




  



  // console.log(statusGet);

// console.log(responseGet)




  var tableData = $('#table_id').dataTable 
      ({
        

      "data": responseGet,
    "paging": true,
    "searchable": true,
        search: { 
            return: true
        },
      
      "columns": [
              { "data": "transaction_number" },
              { "data": "username" },
              { "data": "type" },
              { "data": "kind_request" },
              { "data": "respondent" },
              { "data": "startDate" },
              { "data": "endDate" },
              {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     var _ids = full.id;
                         var statusData = full.status;      
                        var statusValue = '<select name="approval" onchange="return getValue(event);">';

                             statusValue += '<option selected='+full.status_id+' data-type='+full.type+' data-id='+full.status_id+' data-reserve='+full.id+' value='+full.id+'>'+statusData+'</option>';

                       

                           statusGet.filter(value => value.name !== statusData).map((status, b) => statusValue += '<option data-type='+full.type+' data-reserve='+full.id+'  data-id='+status.id+'  value='+status.id+' >'+status.name+'</option>');
                      
                       

                    return    statusValue += '</select>';




                  
              }
             },
             
            //  {
            //      sortable: false,
            //      "render": function ( data, type, full, meta ) {
            //          var _ids = full.id;
            //          return '<span onclick={deleteModalHandler('+_ids+',this);}    class="deleteBtn btn" ><i class="material-icons small">delete_forever</i></span> ';
            //      },
            //  }
           ],
   
 
        });   


  // var tableData = $('#table_id').dataTable //example1 is table id
  //     ({
        

  //     "data": responseGet,
  //   "paging": true,
  //   "searchable": true,
  //       search: { // aceitando que os dados sejam procurados
  //           return: true
  //       },
  //     "columns": [
  //             { "data": "id" },
  //             { "data": "name" },
  //             { "data": "email" },
  //             { "data": "gender" },
  //             { "data": "phone_number" },
  //             { "data": "department" },
  //             { "data": "roles" },
  //             { "data": "date_created" },
  //            {
  //                sortable: false,
  //                "render": function ( data, type, full, meta ) {
  //                    var _ids = full.id;
  //                    return '<span class="editBtn btn" data-id={"id"} onclick={editModalHandler('+_ids+',this);}   ><i class="material-icons small">edit</i></span>';
  //                }
  //            },
             
  //            {
  //                sortable: false,
  //                "render": function ( data, type, full, meta ) {
  //                    var _ids = full.id;
  //                    return '<span onclick={deleteModalHandler('+_ids+',this);}    class="deleteBtn btn" ><i class="material-icons small">delete_forever</i></span> ';
  //                },
  //            }
            
  
  //          ],
   
 
  //       });   


//   var getWrapper = document.getElementById('loopData');

//   var html = '';

//   responseGet.forEach((rec, b) => html += '<tr><td>' + rec.id + '</td><td>' + rec.name + '</td><td>' + rec.email + '</td><td>' + rec.gender + '</td><td>' + rec.phone_number + '</td><td>' + rec.department_office + '</td><td>' + rec.roles + '</td> <td>' + rec.date_created + '</td><td>  <span id="editBtn" onclick={editModalHandler('+rec.id+',this);}    class="editBtn btn"  >  <i class="material-icons small">edit</i></span></td> <td>  <span id="deleteBtn"  onclick={deleteModalHandler('+rec.id+',this);}  class="deleteBtn btn"><i class="material-icons small">delete_forever</i> </span></td></tr >');

//   html += '  ';



// getWrapper.innerHTML = html;


            


}


async function postRequest(url,data){
      const res = await  fetch(url, {
                    method: "POST",
                    header: {"Content-type": "application/json; charset=UTF-8"},
                    body: JSON.stringify(data)
                }).catch((err) => 
                  console.log(err)
                );


      return res.data();

}


 function getValue(e){


  var typeApproval =e.target.selectedOptions[0].getAttribute('data-type');
  var getId =e.target.selectedOptions[0].getAttribute('data-id');
   var reservationId =e.target.selectedOptions[0].getAttribute('data-reserve');

   console.log(reservationId);

console.log(getId);

 var sendData={
  "id":reservationId,
  "approval":getId
}

      if(typeApproval === 'facilities'){
        
         postRequest('./reservation-controller/facilitie_approval.php',sendData);
            
      }
      else{
          
        postRequest('./reservation-controller/motorpool_approval.php',sendData);

      
      }

}



fetchRequestUser('./reservation-controller/transaction-controller.php');

</script>

</html>
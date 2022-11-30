<!DOCTYPE html>
<html lang="en">
  <?php include __DIR__.'./reservation-header/index.php'; ?>
  
  <?php include __DIR__.'./reservation-body/index,php';   ?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



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
                        var statusValue = '<select name="approval" data-name='+full.username+' data-request='+full.kind_request+' data-email='+full.email+' onchange="return getValue(event);">';

                             statusValue += '<option selected='+full.status_id+' data-approve='+statusData+' data-type='+full.type+' data-id='+full.status_id+' data-reserve='+full.id+' value='+full.id+'>'+statusData+'</option>';

                       

                           statusGet.filter(value => value.name !== statusData).map((status, b) => statusValue += '<option data-type='+full.type+' data-request='+full.kind_request+' data-approve='+status.name+' data-reserve='+full.id+'  data-id='+status.id+' data-name='+full.username+' data-email='+full.email+'  value='+status.id+' >'+status.name+'</option>');
                      
                       

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


      return res.json();

}

async function fetchMail(url,data){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
    body: JSON.stringify(data)
  }).catch(() =>
    isErrorHandler()
  );


	 return  await res;




  }





 async function getValue(e){


  var typeApproval =e.target.selectedOptions[0].getAttribute('data-type');
  var process =e.target.selectedOptions[0].getAttribute('data-approve');
  var getId =e.target.selectedOptions[0].getAttribute('data-id');
   var reservationId =e.target.selectedOptions[0].getAttribute('data-reserve');
   var nameGet =e.target.selectedOptions[0].getAttribute('data-name');
    var emailGet =e.target.selectedOptions[0].getAttribute('data-email');
     var requestKind =e.target.selectedOptions[0].getAttribute('data-request');


   console.log(emailGet);




 var sendData={
  "id":reservationId,
  "approval":getId
}
   

      if(typeApproval === 'facilities'){


        
        var resFacilities = await postRequest('./reservation-controller/facilitie_approval.php',sendData);

            if(resFacilities.status === 202){

              if(process === 'approve' || process === 'decline'){
                         
                 var getProcess = process === 'approve' ? 'approved' : 'declined';

                var getMsg = process === 'approve' ? `${emailGet} Your reservation ${requestKind} is validated and ${getProcess} by admin` : `${emailGet} Sorry your reservation ${requestKind} ${getProcess} by admin, try to check your information if something is incorrect`

                	const emailData = {
											"name": nameGet,
											"email":emailGet,
											"subject":`ARRSys generated message`,
											"msg":getMsg
										}

									const resEmail = await	fetchMail('./reservation-controller/mail.php',emailData);

                  console.log(resEmail);
									
											if(resEmail.status === 200){
                              swal({
                        title: `Status has been updated and email was sent to ${emailGet} `,
                        icon: "success",
                      });
												
											}

											else{
												console.log('email was not sent')
                               swal({
                        title: "Something went wrong",
                        icon: "success",
                      });
											}
              }
              else{
                   swal({
                      title: "Status has been updated",
                      icon: "success",
                    });
              }
										

                  
            }
            else{
                 swal({
                      title: "Sorry something went wrong",
                      icon: "error",
                    });
            }
            
      }
      else{
          
       var resMotorpool = await postRequest('./reservation-controller/motorpool_approval.php',sendData);

       console.log(resMotorpool);
        
            if(resMotorpool.status === 202){
                    
                  
              if(process === 'approve' || process === 'decline'){

                  var getProcess = process === 'approve' ? 'approved' : 'declined';
                         
                var getMsg = process === 'approve' ? `${emailGet} Your reservation is validated and ${getProcess} by admin` : `${emailGet} Sorry your reservation ${getProcess} by admin, try to check your information if something is incorrect`

                	const emailData = {
											"name": nameGet,
											"email":emailGet,
											"subject":`ARRSys generated message`,
											"msg":getMsg
										}

									const resEmail = await	fetchMail('./reservation-controller/mail.php',emailData);

                  console.log(resEmail);
									
											if(resEmail.status === 200){
                              swal({
                        title: `Status has been updated and email was sent to ${emailGet} `,
                        icon: "success",
                      });
												
											}

											else{
												console.log('email was not sent')
                               swal({
                        title: "Something went wrong",
                        icon: "success",
                      });
											}
              }
              else{
                   swal({
                      title: "Status has been updated",
                      icon: "success",
                    });
              }
										

                  
            }
            else{
                 swal({
                      title: "Sorry something went wrong",
                      icon: "error",
                    });
            }
            }
         
      
      

}



fetchRequestUser('./reservation-controller/transaction-controller.php');

</script>

</html>
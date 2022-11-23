<!DOCTYPE html>
<html lang="en">
<?php include('../motorpool/motorpool-header/index.php'); ?>


<?php include('../motorpool/motorpool-body/index.php'); ?>


</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<!-- 
    <script>
      $(document).ready(function() {
            $('#datatables').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax":{
                    "url": "./database-controller/index.php",
                    "dataType": "json",
                    "type": "POST"
                    },
                "columns": [
                    { "data": "id"},
                    { "data": "name"},
                 
                ],
                "columnDefs": [ {
                    "targets": [0,2],
                    "orderable": false
                } ],
                "order": [[ 1, "ASC"]],
            });
        $(document).ready(function() {
            $('#dataTables').DataTable();
        } );
    });
    </script> -->


<script>
  
  
// var oTable = $('#table_id').DataTable();

//    $('#search').keyup(function(e) {

//    oTable.search($(this).val()).draw();
//  });



// ); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
// // $('#search').keyup(function(e) {

// // console.log( oTable.search($(this).val()).draw());

// //   oTable.search($(this).val()).draw();
// // });

// // $("#search").on("keyup", function() {
// //     var value = $(this).val().toLowerCase();

// // console.log(value);

// //     $("#loopData  tr").filter(function() {
// //       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   
      
// //       var noResult = true;
// //       $("tr").children('td').each(function () {
// //       	if ($(this).children(':visible').length != 0) {
// //         	noResult = false;
// //         }
// //       });   
    
// //     });
// //   });


            $("#search").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#loopData tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            

            
</script>



<script>



  async function fetchRequest(url,data){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
    body: JSON.stringify(data)
  }).catch(() =>
    isErrorHandler()
  );

   return await res.json();


   }


   
  async function fetchRequestUpdate(url,data){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
    body: JSON.stringify(data)
  }).catch(() =>
    isErrorHandler()
  );

console.log(await res.text());


   }


   


	var editModal = document.getElementById('edit-modal');
  var deleteModal = document.getElementById('delete-modal');
  




	// 	editModal.addEventListener('mouseleave', function () {
	// 		editModal.classList.add('hidden-box');
	// 		editModal.classList.remove('show-box');
	// 	});

  // function deleteModalHandler(userId){


  //  	deleteModal.classList.remove('hidden-box');
	// 	deleteModal.classList.add('show-box');


  //   var isOk = document.getElementById('isOkModal');

  //   const myId= {
  //     "id":userId
  //   }

  //   isOk.addEventListener('click',function(){
  //     fetchRequest('./database-controller/delete-customer.php',myId);
  //     location.reload();
  //   })


 
  // }


//  async function editModalHandler(userId){



//     	editModal.classList.remove('hidden-box');
// 			editModal.classList.add('show-box');
   
  



//   var getFormId = document.querySelectorAll('#edit-form section input');

//   var isSave = document.getElementById('saveBtn');

//    const getUserId= {
//       "id":userId
//     }


//     const res = await fetchRequest('./database-controller/get-customerbyId.php',getUserId);

//   const  {name,email,gender,roles,department,phone_number} = res[0];

  

//           getFormId[0].value =name;
//           getFormId[1].value =email;
//           getFormId[2].value =gender;
//           getFormId[3].value =phone_number;
//           getFormId[4].value =department;
//           getFormId[5].value =roles;



  // var getByMyId = document.querySelectorAll('#edit-form section input');


  //   isSave.addEventListener('click',function(){

  //      var arrInput = Array.from(getByMyId);


  //       var err='';

  //        arrInput.map((forms) => {

  //          var value = forms.value.length > 0;
            

  //           if(value === true){
  //               err = '';
  //           }
  //           else{
  //               err= 'Field is required';
  //           }

  //       })

  //       console.log(err);

  //       if(err === ''){

  //           const convertDatatoJson ={
  //           "id":userId,
  //           "name":getFormId[0].value,
  //           "email":getFormId[1].value,
  //           "gender":getFormId[2].value,
  //           "phoneNumber":getFormId[3].value,
  //           "office":getFormId[4].value,
  //           "roles":getFormId[5].value,
  //         };

          

  //          fetchRequestUpdate('./database-controller/update-customer.php',convertDatatoJson);
  //          location.reload();
  //       }
  //       else{
  //         console.log('something went wrong');
  //       }

     
  //   })


  

 

  // }



// 	deleteModal.addEventListener('mouseleave', function () {
// 			deleteModal.classList.add('hidden-box');
// 			deleteModal.classList.remove('show-box');
//       window.reload();
// 	});



//  function handlerisCancel(){
//  	    deleteModal.classList.add('hidden-box');
// 			deleteModal.classList.remove('show-box');
//  }
 

function checkImageExists(imageUrl, callBack) {
  var imageData = new Image();
  imageData.onload = function() {
  callBack(true);
  };
  imageData.onerror = function() {
  callBack(false);
  };
  imageData.src = imageUrl;
  }
  







async function fetchRequestUser(url) {
  const res = await fetch(url, {
    method: "GET",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    }
  }).catch(() =>
    isErrorHandler()
  );





  const responseGet = await res.json();

console.log(responseGet)


  var tableData = $('#table_id').dataTable //example1 is table id
      ({
        

      "data": responseGet,
    "paging": true,
    "searchable": true,
        search: { // aceitando que os dados sejam procurados
            return: true
        },
      "columns": [
              { "data": "name" },
              { "data": "photo" },
              { "data": "plateNumber" },
              { "data": "fuel" },
              { "data": "gear" },
              { "data": "borrow_type" },
              { "data": "respondent" },
              { "data": "respondentNumber" },
              { "data": "reason" },
              { "data": "participant" },
              { "data": "time" },
              {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     var _ids = full.id;
                     var src = `../../../../public/uploads/motorpool/${full.request_photo}`;
                     return '<img src='+src+' width="80" height="80"/>';
                 }
             },
              { "data": "startDate" },
              { "data": "endDate" },
               { "data": "status" },
              { "data": "inventory_by" },
      
             
            //  {
            //      sortable: false,
            //      "render": function ( data, type, full, meta ) {
            //          var _ids = full.id;
            //          return '<span onclick={deleteModalHandler('+_ids+',this);}    class="deleteBtn btn" ><i class="material-icons small">delete_forever</i></span> ';
            //      },
            //  }
            
  
           ],
   
 
        });   




            

//   var getWrapper = document.getElementById('loopData');

//   var html = '';

//   responseGet.forEach((rec, b) => html += '<tr><td>' + rec.id + '</td><td>' + rec.name + '</td><td>' + rec.email + '</td><td>' + rec.gender + '</td><td>' + rec.phone_number + '</td><td>' + rec.department_office + '</td><td>' + rec.roles + '</td> <td>' + rec.date_created + '</td><td>  <span id="editBtn" onclick={editModalHandler('+rec.id+',this);}    class="editBtn btn"  >  <i class="material-icons small">edit</i></span></td> <td>  <span id="deleteBtn"  onclick={deleteModalHandler('+rec.id+',this);}  class="deleteBtn btn"><i class="material-icons small">delete_forever</i> </span></td></tr >');

//   html += '  ';



// getWrapper.innerHTML = html;

 


}



fetchRequestUser('./motorpool-controller/getAllMotorpoolData.php');




// <span id="editBtn" onclick={editModalHandler('+rec.id+',this);}    class="editBtn btn"  >  <i class="material-icons small">edit</i></span></td> <td>  <span id="deleteBtn"  onclick={deleteModalHandler('+rec.id+',this);}  class="deleteBtn btn"><i class="material-icons small">delete_forever</i> </span></td>





</script>




</html>
<!DOCTYPE html>
<html lang="en">
<?php include('../dashboard-facilities/facilities-header/index.php'); ?>


<?php include('../dashboard-facilities/facilities-body/index.php'); ?>


</body>



<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



<script>
      $(document).ready(function () {
            $('.modal').modal();
        }
        )
</script>
<!-- 
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




function renameUpload(
  renameFile,
  newName,
  uploadName,
  type,
  lastModified
) {
  return new File([renameFile] , `${newName}${uploadName}`, { type, lastModified });
}



async function fetchRFormDataRequest(url,data){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
    body: data
  }).catch(() =>
    isErrorHandler()
  );

	return await res.json();

		

  }







function isNotNull(value){
  return value !== '' || value.length > 0 ? true :false;
}


var room = document.getElementById('roomForm');

room.addEventListener('submit', async function(e)  {
    e.preventDefault();
    var Modalelem = document.querySelector('.modal');
    var instance = M.Modal.init(Modalelem);
      
  

    
    
  if(isNotNull(e.target.elements[0].value) && isNotNull(e.target.elements[1].value) && isNotNull(e.target.elements[2].value)  && isNotNull(e.target.elements[3].value) ){
      instance.open();
     
          var file = e.target.elements[3].files[0];

   
            var renameText = 'room'.replaceAll('-','');

		      var renameFile = renameUpload(file,renameText,file.name,file.type,file.lastModified);



          var formData =  new FormData();
          formData.append('name',e.target.elements[0].value);
          formData.append('capacity',e.target.elements[1].value);
          formData.append('location',e.target.elements[2].value);
          formData.append('facilities_photo',renameFile);


          var respData =  await fetchRFormDataRequest('./facilities-controller/addFacilitiesType.php',formData);

            if(respData.status === 200){
              M.toast({
                html: 'Room created successfully',
                classes: 'green darken-1 rounded'
                });
                
                setTimeout(() => {
                  location.reload();
                }, 2000);

            }
            else{
                      M.toast({
                html: 'Something went wrong, file already exist',
                classes: 'red accent-2 rounded'
                });
            }

  }
  else{
      instance.open();
    
          M.toast({
          html: 'All fields required',
          classes: 'red accent-2 rounded'
          });

  }

      
})
  




















function filePreview(e){

  var vehiclePreview = document.getElementById('facilities-preview');

  	 vehiclePreview.src =URL.createObjectURL(e.files[0]);
  // preview.src = URL.createObjectURL(e.target.file[0]);
      vehiclePreview.onload = () => URL.revokeObjectURL(vehiclePreview.src);

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
               {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     var _ids = full.id;

                   

                       var srcFile = `../../../../public/uploads/facilities_type/${full.photo}`;

                

                     return '<img src='+srcFile+' width="80" height="80"/>';
                 }
             },
              { "data": "capacity" },
              { "data": "location" },
              { "data": "borrow_type" },
              { "data": "respondent" },
              { "data": "respondentNumber" },
              { "data": "activityName" },
              { "data": "activityType" },
              { "data": "description" },
              { "data": "participant" },
              { "data": "time" },
              { "data": "startDate" },
              { "data": "endDate" },
              { "data": "status" },
              { "data": "inventory_by"}
     
  
           ],
   
 
        });   




            

//   var getWrapper = document.getElementById('loopData');

//   var html = '';

//   responseGet.forEach((rec, b) => html += '<tr><td>' + rec.id + '</td><td>' + rec.name + '</td><td>' + rec.email + '</td><td>' + rec.gender + '</td><td>' + rec.phone_number + '</td><td>' + rec.department_office + '</td><td>' + rec.roles + '</td> <td>' + rec.date_created + '</td><td>  <span id="editBtn" onclick={editModalHandler('+rec.id+',this);}    class="editBtn btn"  >  <i class="material-icons small">edit</i></span></td> <td>  <span id="deleteBtn"  onclick={deleteModalHandler('+rec.id+',this);}  class="deleteBtn btn"><i class="material-icons small">delete_forever</i> </span></td></tr >');

//   html += '  ';



// getWrapper.innerHTML = html;

 


}



fetchRequestUser('./facilities-controller/getAllFaciltiesRecord.php');




// <span id="editBtn" onclick={editModalHandler('+rec.id+',this);}    class="editBtn btn"  >  <i class="material-icons small">edit</i></span></td> <td>  <span id="deleteBtn"  onclick={deleteModalHandler('+rec.id+',this);}  class="deleteBtn btn"><i class="material-icons small">delete_forever</i> </span></td>





</script>




</html>
<!DOCTYPE html>
<html lang="en">
<?php include('../motorpool/motorpool-header/index.php'); ?>


<?php include('../motorpool/motorpool-body/index.php'); ?>


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

   return await res;


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


  async function fetchFormDownload(url,data){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
    body: data
  }).catch(() =>
    isErrorHandler()
  );

	return await res;

		

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

    return  await res;


   }


   


	var editModal = document.getElementById('edit-modal');
  var deleteModal = document.getElementById('delete-modal');


function renameUpload(
  renameFile,
  newName,
  uploadName,
  type,
  lastModified
) {
  return new File([renameFile] , `${newName}${uploadName}`, { type, lastModified });
}






function isNotNull(value){
  return value !== '' || value.length > 0 ? true :false;
}


var vehicleForm = document.getElementById('vehicleForm');

vehicleForm.addEventListener('submit', async function(e)  {
    e.preventDefault();
    var Modalelem = document.querySelector('.modal');
    var instance = M.Modal.init(Modalelem);
      
    console.log(e.target.elements[0].value);

    
    
  if(isNotNull(e.target.elements[0].value) && isNotNull(e.target.elements[1].value) && isNotNull(e.target.elements[2].value)  && isNotNull(e.target.elements[3].value)  && isNotNull(e.target.elements[4].value) && isNotNull(e.target.elements[5].value)){
      instance.open();
     
          var file = e.target.elements[5].files[0];

   
            var renameText = 'vehicle'.replaceAll('-','');

		      var renameFile = renameUpload(file,renameText,file.name,file.type,file.lastModified);



          var formData =  new FormData();
          formData.append('name',e.target.elements[0].value);
          formData.append('plate_number',e.target.elements[1].value);
          formData.append('fuel',e.target.elements[2].value);
          formData.append('gear',e.target.elements[3].value);
          formData.append('capacity',e.target.elements[4].value);
          formData.append('vehicle_photo',renameFile);


          var respData =  await fetchRFormDataRequest('./motorpool-controller/addMotorpoolType.php',formData);

            if(respData.status === 200){
              M.toast({
                html: 'Vehicle created successfully',
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




        // setTimeout(() => {
        //    location.reload();
        // }, 3000);

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

  var vehiclePreview = document.getElementById('vehicle-preview');

  	 vehiclePreview.src =URL.createObjectURL(e.files[0]);
  // preview.src = URL.createObjectURL(e.target.file[0]);
      vehiclePreview.onload = () => URL.revokeObjectURL(vehiclePreview.src);

}


 

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
                {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     var _ids = full.id;
                       var srcFile = `./../../../../public/uploads/motorpooltype/${full.photo}`;

                 

                     return '<img src='+srcFile+' width="80" height="80"/>';
                 }
             },
              { "data": "plateNumber" },
              { "data": "fuel" },
              { "data": "gear" },
              { "data": "capacity" },
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
                    var fileType = full.request_photo;

                    if(fileType.indexOf('.pdf') >= 0){
                      return '<a href="./motorpool-controller/downloadFileFromDirectory.php?link='+fileType+'"><img src="../../../../public/assets/pdf.png"  style="cursor:pointer;" id="getFile" data-name='+fileType+' title="Download"  width="80" height="80"/></a>';
                    }
                    if(fileType.indexOf('.docx') >= 0){
                     return '<a href="./motorpool-controller/downloadFileFromDirectory.php?link='+fileType+'"><img src="../../../../public/assets/msword.svg"  style="cursor:pointer;" id="getFile" data-name='+fileType+' title="Download"  width="80" height="80"/></a>';

                    }
                    else{
                       return '<img src='+src+' width="80" height="80"/>';
                    }
                    
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
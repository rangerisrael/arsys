<!DOCTYPE html>
<html lang="en">
<?php include('../dashboard/dashboard-header/index.php'); ?>


<?php include('../dashboard/dashboard-body/index.php'); ?>


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

      return await res.json();

   }


   


	var editModal = document.getElementById('edit-modal');
  var deleteModal = document.getElementById('delete-modal');
  


  function onModalClose(){
    	editModal.classList.add('hidden-box');
			editModal.classList.remove('show-box');
      deleteModal.classList.add('hidden-box');
			deleteModal.classList.remove('show-box');
      // window.reload();
  }


		// editModal.addEventListener('mouseleave', function () {
		// 	editModal.classList.add('hidden-box');
		// 	editModal.classList.remove('show-box');
		// });

  function deleteModalHandler(userId){


   	deleteModal.classList.remove('hidden-box');
		deleteModal.classList.add('show-box');


    var isOk = document.getElementById('isOkModal');

    const myId= {
      "id":userId
    }

    isOk.addEventListener('click',function(){
      fetchRequest('./database-controller/delete-customer.php',myId);

      location.reload();
    })
    


 
  }


  let roleValue = '';
  let departmentValue ='';

function getDepartmentSelected(event) {


console.log(event.target.value);

   var dept_assign = document.getElementById('dept_assign');
         var department_assigned = document.getElementById('department_assigned');

 
    if(event.target.value === '0'){

    
      dept_assign.classList.remove('hide-box');
  
        department_assigned.value=department_specify;
    }
     
    if(event.target.value === 'others'){

    
      dept_assign.classList.remove('hide-box');
  
        department_assigned.value='';
          departmentValue = '0';
    }

    else{
      dept_assign.classList.add('hide-box');
        department_assigned.value='';
      
        departmentValue = event.target.value;
    }


  
}

function getRoleSelected(event) {
    roleValue = event.target.value;
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




async function filePreviewHandler(e){


 

	   const preview = document.getElementById('photo-hidden');
	   const previewSrc = document.getElementById('photo-user');
     const defaultProfile = document.getElementById('default');
     const overlay = document.getElementById('overlay');


     preview.classList.remove('image-hidden');
     defaultProfile.classList.add('image-hidden');
     overlay.classList.remove('hidden-box');



  
 

		preview.dataset.src = '1';
		 previewSrc.src =URL.createObjectURL(e.files[0]);
  // preview.src = URL.createObjectURL(e.target.file[0]);
      preview.onload = () => URL.revokeObjectURL(preview.src);

   var getTextPhotoId =  document.getElementById('photo-text').getAttribute('data-id');
  var getUserPhotoId = document.getElementById('photo-user').getAttribute('data-id')
    
  
    const getUserId= {
      "id":getTextPhotoId !== '' ?getTextPhotoId : getUserPhotoId
    }




    const res = await fetchRequest('./database-controller/get-customerbyId.php',getUserId);

  const  {id,profile} = res[0];


  


    
		var file = e.files[0];

    var renameText = 'users_'.replaceAll('-','');

		var renameFile = renameUpload(file,renameText,file.name,file.type,file.lastModified);



    	const formRequest =  new FormData();
				formRequest.append('id',id);
				formRequest.append('oldphoto',`/${profile}`);
				formRequest.append('profile',renameFile);
        formRequest.append('profileName',renameFile.name);

  
    
    var sendUploadToServer = await fetchRFormDataRequest('./database-controller/updatePofile.php',formRequest)

      console.log(sendUploadToServer.status);

           if(sendUploadToServer.status === 202){
                    
                        swal({
                        title: "Profile updated successfully",
                        icon: "success",
                      });

                      setTimeout(() => {
                        location.reload();
                      }, 2000);
             }
             else{           
                      swal({
                      title: "File already exist",
                      icon: "error",
                    });
            }


    

    
}





 async function editModalHandler(userId){




    	editModal.classList.remove('hidden-box');
			editModal.classList.add('show-box');
   
  







  var getFormId = document.querySelectorAll('#edit-form section input');

  var isSave = document.getElementById('saveBtn');

   const getUserId= {
      "id":userId
    }


    const res = await fetchRequest('./database-controller/get-customerbyId.php',getUserId);
    const resgetDepartmentID = await fetchRequest('./database-controller/getUserDepartmentById.php',getUserId);
  

 

  const  {name,email,gender,roles,department,phone_number,role_id,profile} = res[0];

const {department_id,department_specify} = resgetDepartmentID[0];

  




 const getDepartment = await fetchDepartment('./database-controller/getDepartment.php');

   const getId = await fetchDepartment('./database-controller/getDepartmentWithId.php');

   

     const getRoles = await fetchDepartment('./database-controller//getRoles.php');



        
    var departmentTag = document.getElementById('office');
    var roles_idtag = document.getElementById('roles');
    var dept_assign = document.getElementById('dept_assign');
 

    var rolesGet = '';

  

     rolesGet += '<option value='+role_id+' selected >'+roles+'</option>';
    




    getRoles.filter((value) => value.id !== role_id).forEach((role, b) => rolesGet += '<option value='+role.id+'>'+role.name+'</option>');

    rolesGet += '  ';


        var department_assigned = document.getElementById('department_assigned');

    if(department_id === 0){
      dept_assign.classList.remove('hide-box');
    
        department_assigned.value=department_specify;
    }
     else{
       dept_assign.classList.add('hide-box');
        department_assigned.value='';

     }


    var departId ={};

    var departmentSelect = '';


    var departGetById = department_id === 0 ? 'Department assigned' :department;

     departmentSelect += '<option   value='+department_id+' selected >'+departGetById+'</option>';
    
      getId.forEach(value => departId += value.id);



     
    getId.filter((value) => value.id !== department_id && value.id !== 0).forEach((department, b) => departmentSelect += '<option   value='+department.id+'>'+department.name+'</option>');


     if(department_id !== null){
          departmentSelect += '<option value="others">Specify others</option>';
     }

    departmentSelect += '';


    departmentTag.innerHTML = departmentSelect;          

    roles_idtag.innerHTML = rolesGet;          

 var getDefaultPhoto =  document.getElementById('default');
 var getSrcPhoto = document.getElementById('photo-user');
 var photoText =  document.getElementById('photo-text');
    
    if(profile  === null){

     
  
        getSrcPhoto.dataset.id = '';

        photoText.textContent = email.slice(0,1).toUpperCase();
        photoText.dataset.id = userId;
    }
    else{
        getDefaultPhoto.classList.add('image-hidden');
        var getUserPhoto = document.getElementById('photo-hidden');
 
        getUserPhoto.classList.remove('image-hidden');
        
        var filePath = `../../../public/uploads/profile/${profile}`;
        
        getSrcPhoto.src = filePath;
        getSrcPhoto.dataset.id = userId;
         photoText.dataset.id = '';

    }

          getFormId[0].value =name;
          getFormId[1].value =email;
          getFormId[2].value =gender;
          getFormId[3].value =phone_number;
   



  var getByMyId = document.querySelectorAll('#edit-form section input');





    isSave.addEventListener('click',async function(){

       var arrInput = Array.from(getByMyId);


          
        const getOfficeType = document.getElementsByName('department_assign');

       var validateOffice =departmentValue === '0'  ? 0 : departmentValue === '' ? department_id :  departmentValue;

       var validSpecify = getOfficeType[0].value === '' ? 'NULL' :  getOfficeType[0].value; 

    
  
         
      const convertDatatoJson ={
            "id":userId,
            "name":getFormId[0].value,
            "email":getFormId[1].value,
            "gender":getFormId[2].value,
            "phoneNumber":getFormId[3].value,
            "office":validateOffice,
             "specify_office":validSpecify,
            "roles":roleValue !== '' ? roleValue : role_id,
          };


          console.log(convertDatatoJson);


     

        if(isNotNull(convertDatatoJson.id) === true && isNotNull(convertDatatoJson.name) === true && isNotNull(convertDatatoJson.email) === true && isNotNull(convertDatatoJson.gender) === true && isNotNull(convertDatatoJson.phoneNumber) === true   && isNotNull(convertDatatoJson.roles) === true ){



          console.log(convertDatatoJson);

 
        const respUpdate =   await fetchRequestUpdate('./database-controller/update-customer.php',convertDatatoJson);
          
              if(respUpdate.status === 202){
                  swal({
                        title: "Profile updated successfully",
                        icon: "success",
                 });
                   setTimeout(() => {
                  location.reload();
              }, 2000);
              }
          
            
              
        }
        else{
                 swal({
                      title: "Something went wrong",
                      icon: "error",
                    });
        }

     
    })



  

 

  }



function isNotNull(value){
  return value !== '' || value.length > 0 ? true : false;
}




 function handlerisCancel(){
 	    deleteModal.classList.add('hidden-box');
			deleteModal.classList.remove('show-box');
 }
    

async function fetchDepartment(url){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
  
  }).catch((err) =>
   console.log(err)
  );

   return  await res.json();




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

// console.log(responseGet);


  var tableData = $('#table_id').dataTable //example1 is table id
      ({
        

      "data": responseGet,
    "paging": true,
    "searchable": true,
        search: { // aceitando que os dados sejam procurados
            return: true
        },
      "columns": [
              { "data": "id" },
              { "data": "name" },
             {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     var _ids = full.id;
                     var src = `../../../public/uploads/profile/${full.profile}`;
                      if(full.profile === null){
                           return '<span>null</span>';
                      }
                      else{
                           return '<img src='+src+' width="50" height="50" style="border-radius:50%;"/>';
                      }
                 }
             },
              { "data": "email" },
              { "data": "gender" },
              { "data": "phone_number" },
              { "data": "department" },
              { "data": "roles" },
              { "data": "date_created" },
             {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     var _ids = full.id;
                     return '<span class="editBtn btn" data-id={"id"} onclick={editModalHandler('+_ids+',this);}   ><i class="material-icons small">edit</i></span>';
                 }
             },
             
             {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     var _ids = full.id;
                     return '<span onclick={deleteModalHandler('+_ids+',this);}    class="deleteBtn btn" ><i class="material-icons small">delete_forever</i></span> ';
                 },
             }
            
  
           ],
   
 
        });   



        
     
    

 


}













fetchRequestUser('./database-controller/index.php');




// <span id="editBtn" onclick={editModalHandler('+rec.id+',this);}    class="editBtn btn"  >  <i class="material-icons small">edit</i></span></td> <td>  <span id="deleteBtn"  onclick={deleteModalHandler('+rec.id+',this);}  class="deleteBtn btn"><i class="material-icons small">delete_forever</i> </span></td>





</script>




</html>
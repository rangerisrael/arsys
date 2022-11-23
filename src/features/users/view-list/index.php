<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>View</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" />
  <link rel="stylesheet" href="./view_list.css" />
  <link rel="stylesheet" href="./style.css" />
<style>
.printer:hover{
  cursor: pointer;
  border:1px solid red;
  border: 4px;
}
.dataTables_filter label {
	display: none;
}

.search-input {
	width:20% !important;
  margin-left: 1% !important;
  background:red;
}

.preview .table_preview{
  border:1px solid #7e7e7e;
}
.preview .table_preview tr th{
  border:1px solid #7e7e7e;
  text-align: center;
}


.preview .table_preview tr td{
  border:1px solid #7e7e7e;
  text-align: center;
}

.close{
  display: flex;
  justify-content: flex-end;
}

.close-preview{
  font-size: 2rem;
  margin:10px 15px 15px 0;
   font-weight: 600;
   color:#ff9494;
   cursor:pointer;
   margin-bottom: 30px;
  width: 50px;
  height: 50px;
  text-align: center;
  transition: ease all;
}

.close-preview:hover{
  border-radius: 50%;
  background: rgba(0, 0, 0, .1);
}
.preview-heading{
  width: 100%;
  max-width: 100%;
  text-align: center;
  border:1px solid #7e7e7e;
  border-bottom: transparent;
  
}
.preview-heading h4,h5,h6{
  text-align: center;
  margin:0 !important;
  
}

.preview-heading h4{
  line-height: 34px;
}

/* .main-user{
width: 100%;
margin:0 auto;
}

.main-user #view-user{
  width:100% !important;
  margin:0 auto !important;
  background:green !important;
  overflow: auto;
} */


@media print{
			#user-print {
				display:none;
			}
      #close {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}

		}
 
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}

</style>


</head>

<body>
  <div class="wrapper-view">
    <section class="header-view">
      <section class="navigation">
        <img src="" alt="" />
        <a href="/arsys/home" class="view_nav">HOME</a>
        <a href="/arsys/resources" class="view_nav">RESOURCES</a>
        <a href="/arsys/process" class="view_nav">PROCESS</a>
        <a href="/arsys/about" class="view_nav">ABOUT</a>
        <a href="/arsys/contact-us" class="view_nav">CONTACT US</a>
      </section>

      <section class="user_profile">
        <div class="account-avatar">
          <span id='avatar-name' class="account-avatar-name">J</span>
        </div>
        <div>
          <span onclick="showUserProfile();" id='avatar-text' class="acount-avatar-text">John Doe</span>
        </div>
      </section>

      <div onmouseleave="hide();" id="account-box" class='account-box box-hidden '>
        <div onclick="userProfileInfo()" class="account-text">Account profile</div>
        <div onclick="logout();" class="account-text">Logout</div>
      </div>
    </section>


    <section onclick="userInfoModalLeave();" class="main-user">
        <div class="search">
        <section class="user_print">
            <button onclick="previewwModal();" class="printer"><i><img width='80' height="80" src='../../../../public/assets/print.png' alt='print' title='Print'/></i></button>
          </section>
         <label class="search-text" for="search"></label><input id="search" class="search-input" type="search"
        placeholder="Search..." />
   
        </div>

      <table   id='view-user' class="table-user">
        <thead>
          <th>Transaction id</th>
          <th>Name</th>
          <th>Request type</th>
          <th>Kind of request</th>
          <th>Respondent</th>
          <th>Date filling</th>
          <th>Date of return</th>
          <th>Status</th>
        </thead>
        <tbody id="loopData">

        </tbody>
      </table>

    
    </section>

      <div id="preview-modal" class="modal-hidden-box hidden-box">
       <div  id="preview-modal-box" class="box-modal">
    <div class="preview">
           <section onclick="closePreview();" class="close" id='close'>
            <span class="close-preview">x</span>
          </section>
          <div class="preview-heading">
              <h4>Arsys </h4>
                <h6>Region III</h6>
          <h6>Ascot , Zabali , Baler Aurora</h6>
          </div>
        <table class="table_preview">
        <thead>
          <th>Transaction id</th>
          <th>Name</th>
          <th>Request type</th>
          <th>Kind of request</th>
          <th>Respondent</th>
          <th>Date filling</th>
          <th>Date of return</th>
          <th>Status</th>
        </thead>
        <tbody id="preview">

            </tbody>
          </table>
           <section class="user_print">
            <button onclick="PrintPage()" id='user-print' class="printer"><i><img width='80' height="80" src='../../../../public/assets/print.png' alt='print' title='Print'/></i></button>
          </section>
        </div>
  

    </div>
    </div>
      
  <div id="user-info" class="modal-userInfo-box hidden-box">
       <div  id="preview-modal-box" class="modal-user-hidden-box">
  <div class="wrappper-info">

    <div class="info-photo">
              <div class="image-box">
        
                  <img class="img" src="../../../../public/assets/CAPSTONE.png" alt="">
                 <div class="img-overlay"></div>
              </div>
           
  </div>
  <div class="form-edit">
   <button id='edit-info'  onclick="updateUserInfo();" class="edit-btn">Update Information</button>
  </div>
  
    <div class="form-user-control">
    <div class="form">
      <p><label for="name">Name</label><input name="data" disabled  type="text" value="Jaime Jacoba"/></p>
      <p><label for="name">Email</label><input name="data"  disabled type="text" value="jaimejacob.me@gmail.com"</p>

     </div>

    <div class="form">
      <p><label for="name">Department</label><input name="data" disabled  type="text" value="IT"/></p>
      <p><label for="name">Phone number</label><input name="data" disabled type="text" value="09124523567"/></p>

     </div>
       
    <div class="form">
       <p><label for="name">Id number</label><input name="data" disabled  type="text" value="Ascot123"/></p>
      <p><label for="name">Role</label><input name="data" disabled type="text" value="user"</p>

    </div>


    </div>

    <div  class="form-action">
      <button id='update_info'  onclick="changeUserInfoInDatabase();" class="form-btn hidden-box">Change Information</button>
    </div>









    </div>
    </div>
  </div>

    <section class="footer">
      <p>Arrsys &copy; 2022</p>
    </section>
  </div>


</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


<script type="text/javascript">
  var preview = document.getElementById('preview-modal');
  
  function previewwModal(){
    preview.classList.remove('hidden-box');

  }

  function PrintPage() {
		window.print();
	}

  function closePreview(){
    preview.classList.add('hidden-box');

  }
</script>

<script>
        $("#search").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#loopData tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            
</script>

<script>


async function  userProfileInfo() {
  
  var hideUpdateInfo = document.getElementById('edit-info');
  var  getUserInfo = document.getElementById('user-info');
    var dataForm = document.getElementsByName('data');

   var updateCall = document.getElementById('update_info');

  updateCall.classList.add('hidden-box');
  hideUpdateInfo.classList.remove('hidden-box')
  getUserInfo.classList.remove('hidden-box');


    var enabled = document.getElementsByName('data');

      enabled[0].disabled =true;
      enabled[1].disabled =true;
      enabled[2].disabled =true;
      enabled[3].disabled =true;
      enabled[4].disabled =true;
    



     const res = await fetchUserData('./view-controller/getUserInfo.php'); 

  var userData= await res[0];




       dataForm[0].value = userData.name;
       dataForm[1].value = userData.email;
       dataForm[2].value = userData.department;
       dataForm[3].value = userData.mobile;
       dataForm[4].value = userData.idNumber;
       dataForm[5].value = userData.role;

}

 function updateUserInfo() {
    var enabled = document.getElementsByName('data');

      enabled[0].disabled =false;
      enabled[1].disabled =false;
      enabled[3].disabled =false;
      enabled[4].disabled =false;
 

      var updateCall = document.getElementById('update_info');
      var hideUpdateInfo = document.getElementById('edit-info');

      updateCall.classList.remove('hidden-box');


      hideUpdateInfo.classList.add('hidden-box')

}

      
function userInfoModalLeave() {

    var  getOutSideClick = document.getElementById('user-info');

    getOutSideClick.classList.add('hidden-box');

  
}


async function changeUserInfoInDatabase() {
   var enabled = document.getElementsByName('data');


       if(enabled[0].disabled === false && enabled[1].disabled === false && enabled[3].disabled === false && enabled[4].disabled === false ){
        console.log('data proceed')
        

        
        
    
            const updateUser = await fetchUserData('./view-controller/getUserInfo.php'); 


          const jsonData = {
            "name":enabled[0].value, 
            "email":enabled[1].value,
            "phoneNumber":enabled[3].value ,
            "idNumber":enabled[4].value, 
            "roles":updateUser[0].role_id,
            "gender":updateUser[0].gender,
            "id":updateUser[0].id,
            "office":updateUser[0].department_id
          }

          console.log(jsonData);

            const updateUserInfo = await postRequest('./view-controller/updateUserInfo.php',jsonData);

            console.log(updateUserInfo);

           
      }

}




function showUserProfile() {
  
    document.getElementById('account-box').classList.toggle('box-hidden');
    document.getElementById('account-box').classList.toggle('box-show');

}


function hide(){
	document.getElementById('account-box').classList.remove('box-show');
    document.getElementById('account-box').classList.add('box-hidden');

}



	async function logout(){

		const response =await fetchUserData('./view-controller/logout.php');

			if(response.status === 200){
							window.location.href = '/arsys'
			}


	}






async function fetchUserData(url) {
  const res = await fetch(url, {
    method: "GET",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    }
  }).catch(() =>
    isErrorHandler()
  );





 return  await res.json();



}

async function postRequest(url,data) {
   const res = await  fetch(url, {
    method: "POST",
    header: {"Content-type": "application/json; charset=UTF-8"},
    body: JSON.stringify(data)
}).catch(() => 
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



  var tableData = $('#view-user').dataTable //example1 is table id
  ({


    "data": responseGet,
    "paging": true,
    "searchable": true,
    search: { // aceitando que os dados sejam procurados
      return: true
    },
    "columns": [{
        "data": "transaction_number"
      },
      {
        "data": "username"
      },
       {
        "data": "type"
      },
      {
        "data": "kind_request"
      },
          {
        "data": "respondent"
      },
      {
        "data": "startDate"
      },
      {
        "data": "endDate"
      },
      {
        "data": "status"
      },

    ],


  });






    var getWrapper = document.getElementById('preview');

    var html = '';

    responseGet.forEach((rec, b) => html += '<tr><td>' + rec.transaction_number + '</td><td>' + rec.username + '</td><td>' + rec.type + '</td><td>' + rec.kind_request + '</td><td>' + rec.respondent + '</td><td>' + rec.startDate + '</td><td>' + rec.endDate + '</td> <td>' + rec.status + '</td></tr >');

    html += '  ';



  getWrapper.innerHTML = html;




}

fetchRequestUser('./view-controller/index.php');




async function fetchRequestUserProfile(url) {
  const res = await fetch(url, {
    method: "GET",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    }
  }).catch(() =>
    isErrorHandler()
  );





  const responseGet = await res.json();


  document.getElementById('avatar-name').textContent = responseGet.auth_name.slice(0, 1);
  document.getElementById('avatar-text').textContent = responseGet.auth_name;




}


fetchRequestUserProfile('./view-controller/getUserbyId.php');
</script>

</html>
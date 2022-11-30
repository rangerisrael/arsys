


<?php include('./common/header/index.php')?>





<body>
<?php
 include('./common/navbar/index.php');
?>


<?php 



      if(isset($_GET['page'])){

        $page = $_GET['page'];

		switch ($page) {
			case 'home':

       include('./features/homepage/index.php');
					

					break;
					
			case 'about':

				include('./features/about/index.php');

						break;

			    			
			case 'facilities':

			header('Location:./features/facilities/index.php?type=reservation');
			

						break;
      			
			case 'contact-us':

				include('./features/contact-us/index.php');

						break;

		
			case 'reservation':
       include('./features/reservation/index.php');
				

					break;
				
			case 'process':
       include('./features/process/index.php');
				

					break;
			case 'resources':

       include('./features/resources/index.php');

			 break;
					
								
				default:
							// code..
							
   		  break;

		 }


          
      }
      else{

       include('./features/homepage/index.php');

      }

?>







<?php
  include('./common/footer/index.php');
?>

</body>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>


async function fetchRooms(url){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
  
  }).catch((err) =>
    console.log(err)
  );

	const rooms =   await res.json();



		
     var facilities_wrapper = document.getElementById('facilities_data');

    var facilityDiv = '';

		  

    rooms.forEach((room, b) => facilityDiv += '<div class="resources-col2"><img src="../public/uploads/facilities_type/'+room.photo+'"><h4 class="row-name">'+room.name+'</h4><p><b>Capacity:&nbsp;&nbsp;</b>'+room.capacity+'</p><p class="row-location"><b>Location:&nbsp;&nbsp;</b>'+room.location+'</p><a href="http://localhost/arsys/src/features/facilities/index.php?type=reservation&resources=facilities&id=1&kind='+room.name+'" class="hero2-btn"> RESERVE</a></div>');


		    

 facilities_wrapper.innerHTML = facilityDiv;







  }   








async function fetchRequest(url){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
  
  }).catch((err) =>
    console.log(err)
  );

	const motorpool =   await res.json();

		

//  <div class="resources-col2">
//             <img src="./../public/assets/coaster.png">
//             <p> NAME: Lorem ipsum dolor sit amet <br>CAPACITY: Lorem ipsum dolor sit amet </br></p>
//                 <h3>COASTER</h3>
//                 <a href="http://localhost/arsys/src/features/facilities/index.php?type=reservation&resources=vehicles&id=1&kind=COASTER" class="hero2-btn"> RESERVE</a>
//         </div>


     var motorpol_wrapper = document.getElementById('motorpool_data');

    var motorpoolDiv = '';

		
    motorpool.forEach((vehicle, b) => motorpoolDiv += '<div class="resources-col2"><img src="../public/uploads/motorpooltype/'+vehicle.photo+'"><p>'+vehicle.name+'</p><p>Engine:'+vehicle.fuel+'</p><p>Gear:'+vehicle.gear+'</p><p>Capacity: <h3>'+vehicle.capacity+'</h3></p><a href="http://localhost/arsys/src/features/facilities/index.php?type=reservation&resources=vehicles&id=1&kind='+vehicle.name+'" class="hero2-btn"> RESERVE</a></div>');



 motorpol_wrapper.innerHTML = motorpoolDiv;



   

  }   

  
fetchRequest('./features/resources/controller/getMotorpool.php');
fetchRooms('./features/resources/controller/getFacilities.php');




async function setupMailContact(url){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
  
  }).catch((err) =>
    console.log(err)
  );

	const contact =   await res.json();

  console.log(contact)
		  

  }   




  function isNotNull(value) {
      return value !== '' || value.length >0 ? true :false;
  } 


// const contactForm = document.getElementById('onMailContactForm');


// contactForm.addEventListener('click',function (e) {
//   console.log(e)

      

// })



// function onMailContactForm(e) {
  
//     var name = document.getElementsByName('username');
//     var email = document.getElementsByName('email');
//     var subj = document.getElementsByName('subject');
//     var msg = document.getElementsByName('message');




// 	const sendData = {
//       "name": name[0].value,
//       "email": email[0].value,
//       "subject": subj[0].value,
//       "msg": msg[0].value,
//     }

 

//     if(isNotNull(sendData.name) && isNotNull(sendData.email) && isNotNull(sendData.subject) && isNotNull(sendData.msg)){

         
//         var emailRegex = /^([a-zA-Z0-9.]+)([.{1}])?([a-zA-Z0-9.]+)\@(?:gmail|mailinator|yahoo|outlook|ymail)([\.])(?:com)$/;

//           if(emailRegex.test(sendData.email)){
//               swal({
//               title: "Email is invalid.",
//               icon: "error",
//             });
//           }

//           else{
//               console.log('data process');

//           }


//     }
//     else{
//         swal({
//               title: "All field required",
//               icon: "error",
//             });

//             console.log('All field required')
      
//     }

//         swal({
//                         title: "Profile updated successfully",
//                         icon: "success",
//                       });

//                       setTimeout(() => {
//                         location.reload();
//                       }, 2000);
//              }
//              else{           
//                       swal({
//                       title: "File already exist",
//                       icon: "error",
//                     });
//             }


// 									const resEmail = await	fetchMail('./faclities-controller/mail.php',sendData);
									
// 											if(resEmail.status === 200){
// 												toastSuccess('Reservation facilities')
// 														setTimeout(() => {
// 															window.location.href = '/arsys/view-user';
// 														}, 2000);
// 											}

// 											else{
// 												console.log('email was not sent')
// 											}
										

// }

</script>
    
 


</html>

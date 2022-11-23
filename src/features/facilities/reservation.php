<style>
	.motorpool-hidden-box {
		color: #ffffff;
		width: 100%;
		max-width: 580px;
		height: 580px;
		background-color: #31526d;
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		z-index: 9999999999;
		margin: auto;
		border-radius: 16px;
		color: #ffffff;
		padding: 2rem;
		overflow:hidden;
	}


	.motorpool-hidden-box .box-modal {
		width: auto;
		height: 500px;
		position: relative;
		z-index: 999999;
		background-color: #31526d;
	}

	.hidden-box {
		display: none;
	}

	.show-box {
		display: block;
	}

	nav {
		background: transparent !important;
		padding-top:50px;
	}

	.form-facilities-hide {
		display: none;
	}

	.form-motorpool-hide {
		display: none;
	}

	.form-facilities-show {
		display: block;
	}

	.form-motorpool-show {
		display: block;
	}

	.color-disabled {
		color: #eaeaea;
	}
	.color-enabled {
		color: #eaeaea;
	}

	.form-facilities,	.form-motorpool{
		color:#ffffff;
		max-height:430px;
		overflow-y: scroll;
	}



	.form-control > select{
		display:block;
		height:34px;
		outline: transparent;
		border: transparent;
		border-bottom: 1px solid #9e9e9e;
		margin-bottom: 20px;
		background-color: #31526d;
		color:#ffffff !important;
	
	}

	select option:hover{
		outline:none;
		background-color: red;
	}

	::selection, select:focus::-ms-value {
          background-color: red;
          color: #000;
    }


	select:focus > option:checked { 
			color:#7e7e7e;
	}

		select option {
			margin: 40px;
			background: #31526d;
			color: #fff;	
		}

		

	

	.form-control > select:focus{
		color:#31526d;
	}


	input{
		color:#ffffff;
	}

	
.form-facilities::-webkit-scrollbar,.form-motorpool::-webkit-scrollbar {
  width: 0.2em;
}
 
.form-facilities::-webkit-scrollbar-track,.form-motorpool::-webkit-scrollbar-track  {
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
 
/* .form-facilities::-webkit-scrollbar-thumb,.form-motorpool::-webkit-scrollbar-thumb  {
  background-color: darkgrey;
  outline: 1px solid slategrey;
} */
	
input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      /* display: none; <- Crashes Chrome on hover */
      -webkit-appearance: none;
      margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }
input[type="number"] {
      -moz-appearance: textfield; /* Firefox */
}


.form-button-container{
		display:flex;
	justify-content: center;
}

.form-submit{
	width:150px;
	height:44px;
}

[type="checkbox"]:not(:checked), [type="checkbox"]:checked {
    position: relative !important;
    opacity: 1 !important;
    pointer-events:all !important;
}

checkbox{
	width:50px;
	height:50px;
}

.reason_travel{
	display:flex;
	margin:16px 0;
	gap:5%;
	justify-content: center;
}

input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}


#check{
	accent-color: #31526d;
}

/* input[type="time"]::-webkit-calendar-picker-indicator{
background-color:#ffffff !important;
} */

input[type="time"]::-webkit-calendar-picker-indicator,input[type="date"]::-webkit-calendar-picker-indicator{
  filter: invert(48%) sepia(13%) saturate(3207%) hue-rotate(130deg) brightness(95%) contrast(80%);
}


.scan_file{
	cursor:pointer;

}


.scan_file:hover{
	cursor:pointer;
	background:rgba(0, 0, 0, 0.3);
	padding:0.5rem;

}

.file-scan{
	margin: 16px 0;

}

.dimensionSize{
	width:100%;
	display:block;
	max-width:200px;
	height:auto;
	max-height:80px;
	background-position:center bottom;
}


input{
	background:transparent;
	text-align-center;
}

.error-box{
  color:#ff9494;
  font-weight: 600;
	text-align:center;

}

.error-text{
	margin:0 !important;
	padding:0;
}

.error-validation{
	text-align:center;
	margin:10px 0;
	padding:10px 5px;
	border:1px solid #ff9494;
	border-radius:4px;
}


.hide-error{
	display:none;
}


.div-error{
	display:none;
}

</style>

<section class="header">
	<nav>
		<a href="/arsys/home"><img src="./../../../public/assets/mylogo.png" /></a>
		<div class="nav-links" id="navLinks">
			<i class="fa-solid fa-rectangle-xmark" onclick="hideMenu()"></i>
			<ul>
				<li><a href="/arsys/home"> HOME </a></li>
				<li><a href="/arsys/resources"> RESOURCES </a></li>
				<li><a href="/arsys/process"> PROCESS </a></li>
				<li><a href="/arsys/about"> ABOUT </a></li>
				<li><a href="/arsys/contact-us"> CONTACT US </a></li>
				<li><a href="/arsys/view-user">MY ACCOUNT</a></li>
			
			</ul>
			
		</div>
		<i class="fa-solid fa-bars" onclick="showMenu()"></i>
	</nav>

	
<!-- 
			 <section class="user_profile">
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


	<div class="text-box">
		<h1>RESERVE NOW <br /></h1>
		<span id="facilities-btn" class="hero-btn"> RESERVE FACILITIES</span>
		<span id="motorpool-btn" id="facilities-btn" class="hero-btn"> RESERVE A VEHICLE</span>
	</div>

	 
</section>



<div class="wrapper-reservation">
	<div id="motorpool-modal" class="motorpool-hidden-box hidden-box">
		<div id="motorpool-modal-box" class="box-modal">
			<p id='modalClose' style='display:flex;justify-content:flex-end; font-size:32px; color:#ffffff; cursor:pointer;margin:0;padding:0;'>&times;</p>
			<div class="modal-header">
				<h3 style='margin:0; margin-bottom:8px;' id="modal-title">Reservation</h3>
				<div id='error-box' class='error-box error-validation div-error'>All field required</div>
			</div>
			<div class="modal-body">
			<di id="form-facilities" class="form-facilities form-facilities-hide">
					<form id='facilities-form'  novalidate>
					<p class="form-control">
						
						<label for="type">Kind of Facilities</label>
						<select id="type" name="type_facilities">
							<option selected ></option>
							<option  value="0">Gymnasiumn</option>
							<option value="1">Accreditation hall</option>
							<option value="2">Gymnasiumn</option>
							<option value="3">AVR</option>
						</select>
					</p>
					<p class="form-control">
						<label for="date_filling">Date of filling</label>
						<input name="date_filling" id="date_filling" type="date" />
						<span id='error-span'  class='error-text error-box hide-error'>Date must be start today</span>
					</p>
					<p class="form-control">
						<label for="date_return">Date of return</label>
						<input name="date_return" id="date_return" type="date" />
						<span id='error-span'  class='error-text error-box hide-error'>Date must be required today or next day</span>

					</p>
					<p class="form-control">
						<label for="type">Borrowing</label>

						<select name="borrowing" id="borrowing">
							<option value="official">Office</option>
							<option value="individual hide-error">Individual</option>
						</select>
					</p>
					<p class="form-control">
						<label for="assign_person">Responsible Person</label>
						<input name="assign_person" id="assign_person" type="text" onkeypress="return onlyCharAllowed(event);" />

					</p>
					<p class="form-control">
						<label for="contact_person">Contact # Person</label>
						<input name="contact_person" id="contact_person" type="number" oninput="limitLength(this)" maxlength="12" onkeypress="return disabledKey(event);" value='09'  />
						<span id='error-span'  class='error-text error-box hide-error'>Invalid number must be valid length and valid country code(+639,639,09)</span>

					</p>
					<p class="form-control">
						<label for="activity">Type of Activity</label>
						<select name="activity" id="activity">
							<option selected value="1">Regular</option>
							<option value="2">Glass base</option>
						</select>
					</p>

					<p class="form-control">
						<label for="name_activity">Name of activity</label>
						<input name="name_activity" id="name_activity" type="text"  onkeypress="return onlyCharAllowed(event);"/>

					</p>

					<p class="form-control">
						<label for="description">Brief Description</label>
						<input name="description" id="description" type="text" />
					</p>

					<p class="form-control">
						<label for="participant">Number of Participants</label>
						<input name="participant" id="participant" type="number" oninput="limitLength(this)" maxlength="2" onkeypress="return disabledKey(event);" />
					</p>

				<p class="form-control">
						<label for="day_use">Time</label>
						<input name='day_use' id="day_use" type="time" value='11:08:00' >
					</p>
					<p class="form-button-container">
							<button class='form-submit' type="submit">SAVE</button>
					</p>
				
				</form>
				</div>

				<div id="form-motorpool"  class="form-motorpool form-motorpool-hide" >
					<form id='form-vehicle_submit' method="#" action='' novalidate)">
					<p class="form-control">
						<label for="vehicle_type">Kind of Vehicles</label>
						<select id="vehicle_type" name="type_vehicle">
					
						</select>
					</p>
					<p class="form-control">
						<label for="date_filling_vehicle">Date of filling</label>
						<input name="date_filling_vehicle" id="date_filling_vehicle" type="date" value="2000-05-05" />
						<span id='error-span-motor'  class='error-text error-box hide-error'>Date must be start today</span>


					</p>
					<p class="form-control">
						<label for="date_return_vehicle">Date of return</label>
						<input name="date_return_vehicle" id="date_return_vehicle" type="date" value="2000-05-05" />
						<span id='error-span-motor'  class='error-text error-box hide-error'>Date must be required today or next day</span>

					</p>
					<p class="form-control">
						<label for="type">Borrowing</label>

						<select name="borrowing_vehicle" id="borrowing">
							<option value="official">Office</option>
							<option value="individual">Individual</option>
						</select>
					</p>   
					<p class="form-control">
						<label for="assign_person_vehicle">Responsible Person</label>
						<input name="assign_person_vehicle" id="assign_person" type="text" onkeypress="return onlyCharAllowed(event);" />
					</p>
					<p class="form-control">
						<label for="contact_person">Contact # Person</label>
						<input type="number" name="contact_person_vehicle" id="contact_person" oninput="limitLength(this)" maxlength="11" onkeypress="return disabledKey(event);" value='09' />
						<span id='error-span-motor'  class='error-text error-box hide-error'>Invalid number must be valid length and valid country code(+639,639,09)</span>
				
					</p>
						<p><label for="borrowing">Reason for travel</label></p>
					<p class="form-control reason_travel" id="reason_travel"  >
					
					
				
					</p>

					<p class="form-control">
						<label for="participant">Number of Participants</label>
						<input name="participant_vehicle" id="participant_vh" type="number" oninput="limitLength(this)" maxlength="2" onkeypress="return disabledKey(event);" />
					</p>

					<p class="form-control">
						<label for="time_lapse">Time</label>
						<input id='time_lapse' name="time_lapse" type="time" value='11:08:00' >
					</p>

					<p class="form-control file-scan">
						<img id='preview_scan_file' src='' data-src='0' alt=''/>
						<label class='scan_file' for="scan_file">Upload here the scan and signature letter </label>
						<input name='scan_file' style='display:none;' class='hide_file' onchange="filePreviewHandler(this);" id='scan_file' type="file" accept="image/*" >
					</p>
					<p class="form-button-container">
							<button class='form-submit' type="submit">SAVE</button>
					</p>
				</form>

				<!-- <form id='value_form' action="">
				<p>	<input name='test1' type="text"></p>
				<p>	<input name='test2' type="text"></p>
						<button type="submit">Try value</button>
				</form> -->
				</div>

			</div>
		</div>
	</div>
</div>

<!-------javascript for toggle menu------>
<script>




function convertDate(){
	const dateConversion =new Date().toISOString();

		var splicer = dateConversion.replaceAll('T',' ');

		var getDate =splicer.split(' ');

		return getDate[0];
}


var getKey = document.getElementById('participant_vh');



	function limitLength(e){
		if(e.value.length > e.maxLength){
			e.value = e.value.slice(0,e.maxLength);
			}
	}


	function disabledKey(event){
				var evt = event || window.event;
		
					if(evt.charCode === 101){
						event.preventDefault();
					}
	}
	function  onlyCharAllowed(event){
				var evtChar = event || window.event;
				var keys = event.charCode || event.which;
				var getKeyChar = String.fromCharCode(keys);

			
					var regex = /^[a-zA-Z\s]$/;

					if(!regex.test(getKeyChar)){
							event.preventDefault();
					}
					else{
						return true;
					}
			
	}

// getKey.addEventListener('keypress',function(e){

// 	console.log(e.target.value.match('/[a-zA-Z]/'));
// 				if(e.target.value.match('/[a-zA-Z]/')){
// 						e.preventDefault();
// 				}
// });


var getTime =  new Date();

var hour = getTime.getHours();
var min = getTime.getMinutes();
var sec = getTime.getSeconds();




var timeCtx = `${hour}:${min}:${sec}`;



var dateChangeDefault1 = document.getElementById('date_filling_vehicle');
var dateChangeDefault2 = document.getElementById('date_return_vehicle');

var dateChangeDefaul3 = document.getElementById('date_filling');
var dateChangeDefault4 = document.getElementById('date_return');
var timeVehicleDefault = document.getElementById('time_lapse');
var timeFacilitieseDefault = document.getElementById('day_use');



timeVehicleDefault.defaultValue =timeCtx.toString();
timeFacilitieseDefault.defaultValue = timeCtx.toString();
dateChangeDefault1.defaultValue =convertDate();

dateChangeDefault2.defaultValue = convertDate();


dateChangeDefaul3.defaultValue =convertDate();

dateChangeDefault4.defaultValue = convertDate();





	var navLinks = document.getElementById('navLinks');

	function showMenu() {
		navLinks.style.right = '0';
	}
	function hideMenu() {
		navLinks.style.right = '-200px';
	}

	var facilities = document.getElementById('facilities-btn');
	var motorpool = document.getElementById('motorpool-btn');
	var modalMotorPool = document.getElementById('motorpool-modal');
	var modalTitle = document.getElementById('modal-title');
	var modalHeader = modalTitle.textContent;
	var modalClose = document.getElementById('modalClose');

	var motorpoolForm = document.getElementById('form-motorpool');
	var facilitiesForm = document.getElementById('form-facilities');

	function EventListenerHandler(eventTarget, eventType, eventHandler) {
		if (eventTarget.addEventListener) {
			eventTarget.addEventListener(eventType, eventHandler);
		} else if (eventTarget.removeListener) {
			eventTarget.removeListener(eventType, eventHandler);
		} else {
			eventTarget.addEventListener(eventType, eventHandler);
		}
	}


	function getAllParams(){
		var url = window.location.search;
			if(url.indexOf('?') >=0){
	
	var urlMap = url.split('&')


	return urlMap.map(value => {

			if(value.indexOf('?') >=0){
					var separated = value.replaceAll('?','').split('=');
					
							return {key:separated[0],value:separated[1]};
					
			
			}
			else{
					
				var separated =value.split('=');

				
							return {key:separated[0],value:separated[1]};
						
			}


	});

}


	}





const res =getAllParams();



if(res.length > 1){
	
	if(res[0].value.toString().indexOf('reservation') >= 0 && res[1].value.toString().indexOf('facilities') >=0 ){

		facilitiesHandler();

		// console.log('Facilities',res)

	}
	

	if(res[0].value.toString().indexOf('reservation') >= 0 && res[1].value.toString().indexOf('vehicles') >= 0 ){

		motorpoolHandler();

	

	}
}


function filePreviewHandler(e){



	   const preview = document.getElementById('preview_scan_file');

		preview.dataset.src = '1';
		 preview.src =URL.createObjectURL(e.files[0]);
  // preview.src = URL.createObjectURL(e.target.file[0]);
      preview.onload = () => URL.revokeObjectURL(preview.src);
			preview.classList.add('dimensionSize');


    
}



function renameUpload(
  renameFile,
  newName,
  uploadName,
  type,
  lastModified
) {
  return new File([renameFile] , `${newName}-${uploadName}`, { type, lastModified });
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

// ?????????????????????????????????????????????????????????????????????Facilities form

function isNotNull(value) {
		return value !== '' || value.length > 0 ? true : false;
		
;
}


function isDateValid(date){
	 var valueStamp =  new Date(date).toLocaleDateString() >= new Date().toLocaleDateString()  ? true : false;
	 return 	valueStamp;
}



var formVehicle = document.getElementById('facilities-form');

 formVehicle.addEventListener('submit',async function(e){
			e.preventDefault();



	


			


			var formJson = {
				"type_facilities":e.target.elements['type_facilities'].value,
				"date_filling":e.target.elements['date_filling'].value,
				"date_return":e.target.elements['date_return'].value,
				"borrowing":e.target.elements['borrowing'].value,
				"assign_person":e.target.elements['assign_person'].value,
				"contact_person":e.target.elements['contact_person'].value,
				"activity":e.target.elements['activity'].value,
				"name_activity":e.target.elements['name_activity'].value,
				"description":e.target.elements['description'].value,
				"participant":e.target.elements['participant'].value,
				"day_use":e.target.elements['day_use'].value,
			}

			const {type_facilities,assign_person,contact_person,date_filling,date_return,name_activity,description,participant,day_use} = formJson;


			var erroShow =  document.getElementById('error-box');

				var errorLabel = document.querySelectorAll('#error-span');

		


		 if(isNotNull(type_facilities) && isNotNull(assign_person) && contact_person.length > 2   && isNotNull(name_activity) && isNotNull(description) && isNotNull(participant) && isNotNull(day_use) ){

			var contact_numberValid1 = contact_person.indexOf('09') >= 0 ;
			var contact_numberValid2 = contact_person.indexOf('639') >= 0;
			var contact_numberValid3 = contact_person.indexOf('+639') >= 0;

			var validC=(contact_numberValid1 === true && contact_person.length === 11) || ( contact_numberValid2 === true && contact_person.length === 12) || (contact_numberValid3 === true && contact_person.length === 13);


				console.log(validC);


				console.log('date file',isDateValid(date_filling) === false);
				console.log('date remove',isDateValid(date_return) === false);

			if(isDateValid(date_filling) === false ){
					erroShow.classList.remove('div-error');
						erroShow.textContent = 'Check field error.';
				  	errorLabel[0].classList.remove('hide-error');
			
						 setTimeout(() => {
						
							errorLabel[0].classList.add('hide-error');
						}, 3000);
			}
				if(isDateValid(date_return) === false){
							erroShow.classList.remove('div-error');
							erroShow.textContent = 'Check field error.';
							errorLabel[1].classList.remove('hide-error');
							console.log('is date is not valid 1');
							setTimeout(() => {
						
							errorLabel[1].classList.add('hide-error');
						}, 3000);
			}

			if(new Date(date_return).toLocaleDateString() < new Date(date_filling).toLocaleDateString()  ){
					erroShow.classList.remove('div-error');
							erroShow.textContent = 'Check field error.';
							errorLabel[0].classList.remove('hide-error');
							errorLabel[0].textContent = 'Date is not valid.';
							console.log('is date is not valid 3');
							setTimeout(() => {
							errorLabel[0].classList.add('hide-error');
						}, 3000);
			}

		 	
		  if(validC === false){
						erroShow.classList.remove('div-error');
						erroShow.textContent = 'Check field error.';
				  	errorLabel[2].classList.remove('hide-error');
							setTimeout(() => {
						
							errorLabel[2].classList.add('hide-error');
						}, 3000);
			 }


		 else{

				if(isDateValid(date_filling) && isDateValid(date_return) && validC){
								
					erroShow.classList.remove('div-error');
						erroShow.textContent = 'Please wait...';
					erroShow.classList.add('hide-error');
						errorLabel[1].classList.add('hide-error');
						errorLabel[0].classList.add('hide-error');
						errorLabel[2].classList.add('hide-error');
				
										const response = await	fetchRequest('./faclities-controller/register_reservation.facilities.php',formJson);

							console.log(response.status);

								if(response.status === 200){
										const sendData = {
											"name": response.name,
											"email":response.email,
											"subject":`ARRSys generated message`,
											"msg":`${response.email} your reservation is successfully created, Please wait for admin approval`
										}

									const resEmail = await	fetchMail('./faclities-controller/mail.php',sendData);
									
											if(resEmail.status === 200){
													window.location.href = '/arsys/view-user';
											}

											else{
												console.log('email was not sent')
											}
										
							
								}
								else{
									console.log('error response');
								}
			
				}
	
		 }

			}

		 else{
			erroShow.classList.remove('div-error');
	

			setTimeout(() => {
				erroShow.classList.add('div-error');
			}, 3000);
	   
		
		 }


		


	
	});

























// ????????????????????????????????????????????????????????????????????? Vehivcle forms

var formVehicle = document.getElementById('form-vehicle_submit');

 formVehicle.addEventListener('submit',async function(e){
			e.preventDefault();
	

					var erroShow =  document.getElementById('error-box');

				var errorLabel = document.querySelectorAll('#error-span-motor');


			
				var file = e.target.elements['scan_file'].files[0];





						const formJsonVehicle = {
							date_filling_vehicle: e.target.elements['date_filling_vehicle'].value,
							date_return_vehicle: e.target.elements['date_return_vehicle'].value,
							assign_person_vehicle: e.target.elements['assign_person_vehicle'].value,
							contact_person_vehicle: e.target.elements['contact_person_vehicle'].value,
							participant_vehicle: e.target.elements['participant_vehicle'].value,
							time_lapse: e.target.elements['time_lapse'].value,
						}


						
			




		var travelCheck =  Array.from(e.target.elements['reason']);

			var reasonValue = '';

			travelCheck.filter(value => value.checked === true).map((val) => reasonValue = val.getAttribute('data-selected'))


			console.log('reason',reasonValue);


					const {date_filling_vehicle,date_return_vehicle,assign_person_vehicle,contact_person_vehicle,participant_vehicle,time_lapse } = formJsonVehicle;



					if(isNotNull(assign_person_vehicle) && isNotNull(reasonValue) && isNotNull(contact_person_vehicle) && isNotNull(participant_vehicle) && isNotNull(time_lapse) && typeof file !== "undefined"){

				
					var contact_numberValid1 = contact_person_vehicle.indexOf('09') >= 0 ;
					var contact_numberValid2 = contact_person_vehicle.indexOf('639') >= 0;
					var contact_numberValid3 = contact_person_vehicle.indexOf('+639') >= 0;

					var validC=(contact_numberValid1 === true && contact_person_vehicle.length === 11) || ( contact_numberValid2 === true && contact_person_vehicle.length === 12) || (contact_numberValid3 === true && contact_person_vehicle.length === 13);


				console.log(validC);


				console.log('date file',isDateValid(date_filling) === false);
				console.log('date remove',isDateValid(date_return) === false);

			if(isDateValid(date_filling_vehicle) === false ){
					erroShow.classList.remove('div-error');
						erroShow.textContent = 'Check field error.';
				  	errorLabel[0].classList.remove('hide-error');
			
						 setTimeout(() => {
						
							errorLabel[0].classList.add('hide-error');
						}, 3000);
			}
				if(isDateValid(date_return_vehicle) === false){
							erroShow.classList.remove('div-error');
							erroShow.textContent = 'Check field error.';
							errorLabel[1].classList.remove('hide-error');
							console.log('is date is not valid 1');
							setTimeout(() => {
						
							errorLabel[1].classList.add('hide-error');
						}, 3000);
			}

			if(new Date(date_return_vehicle).toLocaleDateString() < new Date(date_filling_vehicle).toLocaleDateString()){
					erroShow.classList.remove('div-error');
							erroShow.textContent = 'Check field error.';
							errorLabel[0].classList.remove('hide-error');
							errorLabel[0].textContent = 'Date is not valid.';
							console.log('is date is not valid 3');
							setTimeout(() => {
							errorLabel[0].classList.add('hide-error');
						}, 3000);
			}

		 	
		  if(validC === false){
						erroShow.classList.remove('div-error');
						erroShow.textContent = 'Check field error.';
				  	errorLabel[2].classList.remove('hide-error');
							setTimeout(() => {
						
							errorLabel[2].classList.add('hide-error');
						}, 3000);
			 }


		 else{

				if(isDateValid(date_filling_vehicle) && isDateValid(date_return_vehicle) && validC){
								
							erroShow.classList.remove('div-error');
						erroShow.textContent = 'Please wait...';
					erroShow.classList.add('hide-error');
						errorLabel[1].classList.add('hide-error');
						errorLabel[0].classList.add('hide-error');
						errorLabel[2].classList.add('hide-error');

		var renameFile = renameUpload(file,'motorpool_scan_file_',file.name,file.type,file.lastModified);



			const formRequest =  new FormData();
				formRequest.append('type_vehicle',e.target.elements['type_vehicle'].value);

				formRequest.append('date_filling_vehicle',e.target.elements['date_filling_vehicle'].value);

				formRequest.append('date_return_vehicle',e.target.elements['date_return_vehicle'].value);

				formRequest.append('borrowing_vehicle',e.target.elements['borrowing_vehicle'].value);

				formRequest.append('assign_person_vehicle',e.target.elements['assign_person_vehicle'].value);

				formRequest.append('contact_person_vehicle',e.target.elements['contact_person_vehicle'].value);

				formRequest.append('travel_reason',reasonValue);

				formRequest.append('participant_vehicle',e.target.elements['participant_vehicle'].value);

				formRequest.append('time_lapse',e.target.elements['time_lapse'].value);
				
				formRequest.append('scan_files',renameFile);


			

					const response = await	fetchRFormDataRequest('./faclities-controller/register_reservation_vehicles.php',formRequest);

							if(response.status === 200){
									const sendData = {
										"name": response.name,
										"email":response.email,
										"subject":`ARRSys generated message`,
										"msg":`${response.email} your reservation is successfully created, Please wait for admin approval`
									}

								const resEmail = await	fetchMail('./faclities-controller/mail.php',sendData);
								
										if(resEmail.status === 200){
												window.location.href = '/arsys/view-user';
										}

										else{
											console.log('email was not sent')
										}	
									
							}
							else{
								console.log('error response');
							}





				}
	
		 }

			}

		 else{
			erroShow.classList.remove('div-error');
	

			setTimeout(() => {
				erroShow.classList.add('div-error');
			}, 3000);
	   
		
		 }




				

	});









	async function facilitiesHandler() {
		modalMotorPool.classList.remove('hidden-box');
		modalMotorPool.classList.add('show-box');
		motorpool.style.pointerEvents = 'none';

		facilitiesForm.classList.remove('form-facilities-hide');
		motorpoolForm.classList.add('form-motorpool-hide');
		facilitiesForm.classList.add('form-facilities-show');

		var facilitiesHeader = modalHeader.replaceAll('Vehicle', 'Facilities');

		modalTitle.textContent = `${modalHeader} Facilities`;
		motorpool.classList.add('color-disabled');

		

	var activity = await fetchRequest('./faclities-controller/getActivities.php');
	var rooms = await fetchRequest('./faclities-controller/getRoom.php');


		

	var getSelectionRooms = document.getElementById('type');
	var getSelectionActivities= document.getElementById('activity');


const res = getAllParams();




if(res.length > 1){

	  var selectType = '';

		selectType += '<option value='+res[2].value+' selected>'+decodeURI(res[3].value.toString())+'</option'

  selectType += '  ';

	var selectActivity = '';

  activity.forEach((activity, b) => selectActivity += '<option value='+activity.id+'>'+activity.name+'</option>');

  selectActivity += '  ';



}


else{
	  var selectType = '';

  rooms.forEach((room, b) => selectType += '<option value='+room.id+'>'+room.name+'</option>');

  selectType += '  ';

	var selectActivity = '';

  activity.forEach((activity, b) => selectActivity += '<option value='+activity.id+'>'+activity.name+'</option>');

  selectActivity += '  ';


}







	getSelectionRooms.innerHTML = selectType;


	getSelectionActivities.innerHTML = selectActivity;


//  const registerFacilities = await fetch('./faclities-controller/register_reservation.controller.php', {
//     method: "POST",
//     header: {
//       "Content-type": "application/json; charset=UTF-8"
//     },
//     body: JSON.stringify({"name":'test'})
//   }).catch(() =>
//     isErrorHandler()
//   );

// 	const responsjson =await registerFacilities.text();

// console.log(responsjson);


	}

// // check one
//  var checkboxes = document.querySelectorAll('#check');



	




	async function motorpoolHandler() {
		modalMotorPool.classList.remove('hidden-box');
		modalMotorPool.classList.add('show-box');
		facilities.style.pointerEvents = 'none';

		motorpoolForm.classList.remove('form-motorpool-hide');
		facilitiesForm.classList.add('form-facilities-hide');
		motorpoolForm.classList.add('form-motorpool-show');

		
		modalTitle.textContent = `${modalHeader} Vehicle`;
		facilities.classList.add('color-disabled');


		

	var vehicles = await fetchRequest('./faclities-controller/getVehicle.php');
	var travel_reason = await fetchRequest('./faclities-controller/getTravelReason.php');




	var getSelectedVehicle = document.getElementById('vehicle_type');
		var getTravelReason = document.getElementById('reason_travel');




const res = getAllParams();

if(res.length > 1){

	
		var selectVehicle = '';




  selectVehicle += '<option value='+res[2].value+' selected>'+decodeURI(res[3].value.toString())+'</option>';

  selectVehicle += '  ';

var reasonCheckbox = '';

  travel_reason.forEach((reason, b) => reasonCheckbox += '<input name="reason" onclick={onlyOne(this);}  id="check" type="checkbox" value='+reason.id+'/><label>'+reason.name+'</label>');

  reasonCheckbox += '  ';




}


else{

		var selectVehicle = '';

  vehicles.forEach((vehicle, b) => selectVehicle += '<option value='+vehicle.id+'>'+vehicle.name+'</option>');

  selectVehicle += '  ';

var reasonCheckbox = '';

  travel_reason.forEach((reason, b) => reasonCheckbox += '<input name="reason" onclick={onlyOne('+reason.id+',this);}  id="check" type="checkbox" value='+reason.id+'/><label>'+reason.name+'</label>');

  reasonCheckbox += '  ';



}


	getSelectedVehicle.innerHTML = selectVehicle;
	getTravelReason.innerHTML = reasonCheckbox;





	}



function onlyOne(id,checkbox) {
 var checkboxes = document.getElementsByName('reason');

			if(checkbox.checked === true){
				checkbox.setAttribute('data-selected', id);
				checkbox.defaultChecked=true;

				
			
			}

    checkboxes.forEach((item) => {
				if (item !== checkbox){
					 item.checked = false;
					 	item.removeAttribute('data-selected',0);
						item.defaultChecked=false;
				}


    })

}


	




	 function motorpoolHandlerClose() {
		modalMotorPool.classList.add('hidden-box');
		modalMotorPool.classList.remove('show-box');

		motorpoolForm.classList.remove('form-motorpool-show');
		facilitiesForm.classList.remove('form-facilities-show');
		facilitiesForm.classList.add('form-facilities-hide');
		motorpoolForm.classList.add('form-motorpool-hide');
		// To re-enable:
		facilities.style.pointerEvents = 'auto';
		motorpool.style.pointerEvents = 'auto';
		facilities.classList.remove('color-disabled');
		motorpool.classList.remove('color-disabled');



	}


const resModalUrl = getAllParams();


	const fileActive = document.getElementById('preview_scan_file');

 const getSrc = fileActive.getAttribute('data-src')


 


	// if(resModalUrl.length === 1 && getSrc === '0'){
	// 		EventListenerHandler(modalMotorPool, 'mouseleave', motorpoolHandlerClose);
	// }


	EventListenerHandler(modalClose, 'click', motorpoolHandlerClose);
	EventListenerHandler(facilities, 'click', facilitiesHandler);

	EventListenerHandler(motorpool, 'click', motorpoolHandler);

	


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




	 return  await res.json();



  }









</script>

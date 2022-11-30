  <?php      include('../users/user-header/index.php'); ?>
  




  <style>




.user-header {
	width: 100%;
	background-image: linear-gradient(rgba(23, 33, 48, 0.884), rgba(30, 44, 85, 0.785)), url(../../public/assets/ASCOT.jpg);
	background-position: contain;
	background-size: contain;
	position: relative;
}
   
.validation{
    display:flex;
        flex-direction:row;
        justify-content:center;
        align-items:center;
        border: 1px solid #ff9494;
        margin: 6px 0;
        height: 50px;
        border-radius: 4px;
        padding: 0 10px;
        box-sizing: border-box;
        outline: none;
        text-align: center;
        font-weight:400;
}


    .success{
       color: #4BB543;
    }


   
    .error-box {
       color: #ff9494;
       font-weight:bold;
    }

    
    .hide{
        display:none;
    }
    .show{
        display:flex;
    }

    select option{
        background:#342E3A;
	}

    
	select:focus > option:checked { 
			color:#7e7e7e;
	}

    	
input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      /* display: none; <- Crashes Chrome on hover */
      -webkit-appearance: none;
      margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }
input[type="number"] {
      -moz-appearance: textfield; /* Firefox */
}
.password-text{
      width:auto;
}
.password-text:hover{
  border-bottom: 2px solid #ffffff;
  cursor: pointer;
  
}


.container {
	width: 100%;
	display: flex;
	position: relative;
	z-index: 0;
  height: calc(100vh - 80px);
  overflow:hidden;
}

@media screen and (min-width:1367px){
  .container {
    min-height:calc(100vh - 10vh);
}
}


.overlay{
  position: absolute;
width:100%;
height:90vh;
  top:0;
  bottom:0
  left:0;
  right:0;
   z-index: 1;
  background:rgba(0,0,0,.5);
 
}


.wrapper-modal-auth {
	width: 92%;
  max-width:800px;
	height: 264px;

	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	z-index:999999999 ;
  background-color: #4C5E78;
	margin: auto;
	border-radius: 16px;
	color: #31526d;
	padding: 2rem;
}

.changeHeight{
  height:340px;
}




.resize{
  width:80%;
  height:44px;
  border:1px solid rgba(0,0,0,.1) !important;
  margin-top: 20px;
}

.resize-btn{
  width:30%;
  height: 44px;
}

.resize-btn::placeholder-shown{
  color:#7e7e7e !important;
}

.wrapper-modal{
  display:flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.text-color{
  color:#ffffff;
  font-size: 20px;
}


.hide-reset{
  display:none;
}
.show-reset{
  display:block;
}


nav{
  padding:0;
  height:80px;
}

.alert-box{
  width:100%;
  margin:10px 0;
  border:1px solid #ff9494;
  height:44px;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
}
.alert-box-text{
  color:#ff9494;
  font-weight: 600;
}

.hide{
  display:none;
}

.success{
color:#198754;
  border:1px solid #198754;
}

.f-600{
  font-weight:600;
  
}

.t-align{
  display:flex;
  justify-content: center;
  line-height: 24px;
  letter-spacing: -0.5px;
}


.hide-span{
  display:none;
}


.password-control{
  position:relative;
  top:0;
  left:0;
  bottom:0;
  right:0;
}
.passover-control{
  position:absolute;
    top:20px;
    bottom:0;
    right:20px;
    font: 14px;
    font-weight:400;
    color:#342E3A;
 
}


.passover-text:hover{
  cursor:pointer;
  padding:2px 0 2px 2px;
  color: #ffffff;
  background:rgba(0,0,0,.3)
  border-radius:8px;
  scale:2;
}

.department_specify{
  width:240px;
  height:32px;
  margin:0.5rem 0;
  border-radius:20px;
  border: 1px solid #ffffff !important;
  background:transparent !important;
  text-align:center;
  outline:none !important;
  color:#ffffff;
}
.hidden{
  display:none ;
}

    </style>
   
<!-- content -->
   
   <section class="user-header">
         <nav>
           
             <a class='nav-logo' href="/arsys/home"><img src="../../../public/assets/mylogo.png"></a>
       
            <div class="nav-links" id="navLinks">
                <i class="fa-solid fa-rectangle-xmark" onclick="hideMenu()"></i>
            <ul>
                <li> <a href="/arsys/home"> HOME </a></li>
                <li> <a href="/arsys/resources"> RESOURCES </a></li>
                <li> <a href="/arsys/process"> PROCESS </a></li>
                <li> <a href="/arsys/about"> ABOUT </a></li>
                <li> <a href="/arsys/contact-us"> CONTACT US </a></li>
            </ul>
            </div>
            <i class="fa-solid fa-bars" onclick="showMenu()"></i>
        </nav>


   <div class="container">
           <div id='forgot-modal' class='wrapper-modal-auth hide-reset'>
           
              <span id='closeModal'  style="display:flex;justify-content:flex-end;width:100%;"><span  style="font-weight:700;color:#ffffff;cursor:pointer;">X</span></span>
               
              <p class="text-color">You forgot your password?  </p>
                <div id='alert-box' class="alert-box alert-box-text hide "></div>
                <form id='resetPassword' class='wrapper-modal' novalidate>
               
                    <input  type="email" class="input-box auth-control resize" name='email'  placeholder="Enter your valid email" >
                      <button type="submit"  class="submit resize-btn" >Send</button>
                </form>
           
             

           </div>
         

      <div class="card">
        <div class="inner-box" id="card">
            <div class="card-front">
                <h2>LOGIN</h2>
                <div id='isValidErrorSignIn' class='validation error-box hide'></div>
                    <input  type="email" class="input-box auth-control" placeholder="Your email ID" required>
                    <input  type="password" class="input-box auth-control" placeholder="Password" required>
                    <button id='signInForm' type="submit" class="submit-btn"> Submit</button>
                    <input id='authCoookies' type="checkbox"> <span>Remember Me</span>
              
                   <button type="button" class="btn" onclick="openReg()"> I'm New Here</button>
                 <a onclick="forgotpassword();" class='password-reset'><span class='password-text'>Forgot Password</span></a>

            </div>
            <div class="card-back">
          <!----->  <h2>REGISTER</h2>
                <div id='isValidErrorSignup' class='validation error-box hide'></div>
                  <form id='signUpForm' novalidate >

                     <input class='form-control input-box' id='fname' type="text" name="fullname"  placeholder="Your Name" onkeypress="return onlyCharAllowed(event);" value=''  />
                    <span id='error-span' class='error-box f-600 t-align hide-span'>Username length</span>
                    <input class='form-control input-box' id='emaal' type="email" name="email"  placeholder="Your email" value='' />
                    <span id='error-span'' class='error-box f-600 t-align hide-span'>Email validation</span>
                    <p class='password-control'><input class='form-control input-box' id='passcode' type="password" name="password"   placeholder="Password" value=''/><span class='passover-control'><span id='passover_click' onclick="showPassword();" class='passover-text'>show</span></span></p>
                    <span id='error-span' class='error-box f-600 t-align hide-span'>Password min length</span>
                   
                    <input type='text' class='form-control input-box' id='idNumber' name="IDNumber"  placeholder="ASCOT ID Number" value='' />

                    <select class="form-control input-box" id="department_id" name="department_office" onchange="getSelectedDepartmentValue(this);" />
                  
                    <input class='form-control input-box hidden' id='specify' type="text"  name="specify_office"  placeholder="Specify department if not on the list" onkeypress="return onlyCharAllowed(event);" value=''  />
                
                
                    <input  oninput="limitLength(this);" maxlength="13" onkeypress="return disabledKey(event);" class='form-control input-box' id='mobile' type="number" name="phonenumber"  placeholder="Contact Number" value='09'/>
                    <span id='error-span' class='error-box f-600 t-align hide-span'>Al least eleven min length</span>
              
                   <select class="form-control input-box" id="gender" name="gender">
                        <option value='MALE'>MALE</option>
                        <option value='FEMALE'>FEMALE</option>
                   </select>
     
                  
                    <button type="submit"  class="submit-btn" >Submit</button>


                  </form>

                  <button type="button"  class="btn" onclick="openLogin()"> I have an account</button>
                 <a onclick="forgotpassword();" class='password-reset'><span class='password-text'>Forgot Password</span></a>

                </div>
        </div>
      </div>
          <div id="overlay" class='overlay hide-reset'></div>
    </div>
   
    </section>

    <script>

     var navLinks=document.getElementById("navLinks");

    function showMenu(){
 // navLinks.style.right = "0";
          navLinks.classList.remove('hide-nav');
         navLinks.classList.toggle('show-nav');
    }
    function hideMenu(){
         navLinks.classList.remove('show-nav');
        navLinks.classList.add('hide-nav');
          

    }
    
    



        var card = document.getElementById("card");

        function openReg(){
            card.style.transform = "rotateY(-180deg)";
        }
        function openLogin(){
            card.style.transform = "rotateY(0deg)";
        }


        

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


    </script>
    <script>

var passwordId = document.getElementById('passcode');
var passover = document.getElementById('passover_click');
function showPassword(){

    if(passwordId.type === 'password'){
      passwordId.type = 'text';
      passover.textContent = 'hide';
    }
    else{
     passwordId.type = 'password';
      passover.textContent = 'show';

    }
  
}




       
      const overlay =  document.getElementById('overlay');
      const modalForget =  document.getElementById('forgot-modal');
    
       var alert = document.getElementById('alert-box');
            
        
        
        function forgotpassword(){
              modalForget.classList.remove('changeHeight');
            overlay.classList.add('show-reset');
            modalForget.classList.add('show-reset');
             


    

        }

        document.getElementById('closeModal').addEventListener('click',function(){
             overlay.classList.remove('show-reset');
            modalForget.classList.remove('show-reset');
              alert.classList.add('hide');

           
        });




        function isEmpty(value){
            return value === '' ? true : false
        }

        function visible(isValue){
            isValue.classList.remove('hide');
            isValue.classList.add('show');
        }

       function hidden(isValue){
            isValue.classList.remove('show');
            isValue.classList.add('hide');
        }


    var resetPass =  document.getElementById('resetPassword');


  async function requestEmail(url,data){
    const res = await  fetch(url, {
                    method: "POST",
                    header: {"Content-type": "application/json; charset=UTF-8"},
                    body: JSON.stringify(data)
                }).catch(() => 
                                 console.log(err)
                );
    
          return  await res;

      
  }


  // ////////////////////////////////Resetting password
    
    async function processResetPassword(e) {
      e.preventDefault();
        // console.log(e.target.elements['email'].value);
        var emailValue = e.target.elements['email'].value;
        var emailRegex = /^([a-zA-Z0-9.]+)([.{1}])?([a-zA-Z0-9.]+)\@(?:gmail|mailinator|yahoo|outlook|ymail)([\.])(?:com)$/;

        

          if(emailValue !== ''){
            
          if(emailRegex.test(emailValue)){

            


                  const postData = {
                      "date" : new Date().toLocaleDateString(),
                      "email": emailValue.toString()
                   
                  }


                  

              const getRes =   await requestEmail('./forgot-password/getUserId.php',postData);

                   const jsonData = await getRes.json();

                  
                  if(jsonData.status === 202){
            

                           const posResData = {
                          "date" : new Date().toLocaleDateString(),
                          "id":jsonData.data.id
                      
                         }


                        const posRes =   await requestEmail('./forgot-password/reset-controller.php',posResData);

                        const validUser =await posRes.json();

                        if(validUser.status === 200){
                                ///get the token
                                  
                                const getTokenRes =   await requestEmail('./forgot-password/getToken.php',posResData);

                            validToken = await getTokenRes.json();

                            let dated=[];
                            let tokenValid = '';
                            validToken.data.filter((value) => value.date === posResData.date).map((value) => dated.push(value.date))

                              validToken.data.filter((value) => value.date === posResData.date).map((value) =>tokenValid= value.token)

                              if(validToken.data.length <= 3 && dated.length <=3  ){

                                const link =  `http://localhost/arsys/reset-password?token=${tokenValid}`
           
        
                           const sendData = {
                                "name": emailValue,
                                "email":emailValue,
                                "subject":"Reset Password",
                                "msg":`${emailValue} your have been reset your password using this link ${link}`
                              }
                    


                                   await requestEmail('./forgot-password/mail.php',sendData);


                                    alert.classList.remove('hide');
                                    alert.classList.add('success');
                                    alert.textContent = 'Email was sent to your account.'
                                    modalForget.classList.add('changeHeight');
                                 
                                    setTimeout(() => {
                                   alert.classList.add('hide');
                                    modalForget.classList.remove('changeHeight')
                                     alert.classList.remove('success'); 
                                    window.location.href='/arsys';

                                    }, 3000);
                                
                              

                              }
                              else{
                                alert.classList.remove('hide');
                              alert.textContent = 'Email request exceed on its limit.'
                              modalForget.classList.add('changeHeight');
                              setTimeout(() => {
                                    alert.classList.add('hide');
                              modalForget.classList.remove('changeHeight')

                              }, 3000);
                              }



                                

                        }
                         

                  }
                  else{
                      alert.classList.remove('hide');
                      alert.textContent = 'Email is invalid.'
                      modalForget.classList.add('changeHeight');
                      setTimeout(() => {
                            alert.classList.add('hide');
                      modalForget.classList.remove('changeHeight')

                      }, 3000);
                  
            
                  }





          }
          else{
             console.log('not valid')
           
               alert.classList.remove('hide');
               alert.textContent = 'Email is not valid.'
               modalForget.classList.add('changeHeight')

               setTimeout(() => {
                    alert.classList.add('hide');
               modalForget.classList.remove('changeHeight')

               }, 3000);
               
          }
   
          }
          else{
               alert.classList.remove('hide');
               alert.textContent = 'This field can\'t be empty.'
               modalForget.classList.add('changeHeight');
               setTimeout(() => {
                    alert.classList.add('hide');
               modalForget.classList.remove('changeHeight')

               }, 3000);
          }
    
        
    }
    
 
                 




        
        async function isErrorHandler(err){
              visible(isValid);
                setTimeout(() => {
                hidden(isValid);
                }, 3000);
     
                isValid.textContent= 'Semething went wrong!!!';
        }


        async function fetchRequest(url,data) {
             const res = await  fetch(url, {
                    method: "POST",
                    header: {"Content-type": "application/json; charset=UTF-8"},
                    body: JSON.stringify(data)
                }).catch(() => 
                 isErrorHandler()
                );


 

                const responseGet = await res.json();


         

                var isMessageAppear = document.getElementById('isValidErrorSignup');
                
                var isValid = document.getElementById('isValidErrorSignIn');

          

                
              if(responseGet.success === true & responseGet.status === 200){


                // console.log(responseGet);
                

          
                if(responseGet.route === 'home'){

           

                isValid.classList.remove('error-box');

                isValid.classList.add('success');



                isMessageAppear.textContent= responseGet.message;

                console.log(responseGet.role)


                   if(responseGet.role === 'admin'){
                            window.location.href = '/arsys/dashboard-calendar';
                            console.log('isadmin')
                        }
                    else{
                            window.location.href = '/arsys/home';
                            console.log('isuser')

                     }

           
                 }
                if(responseGet.route === 'login'){
                    
                 isMessageAppear.classList.remove('error-box');

                isMessageAppear.classList.add('success');


                isMessageAppear.textContent= responseGet.message;
              

                setTimeout(() => {
                     window.location.href = '/arsys/auth';
                }, 2000);
                
                }
            }
                else{

    
                  isValid.textContent =responseGet.message;


                visible(isMessageAppear);
                isMessageAppear.textContent= responseGet.message;
                
                
                visible(isValid);
                isValid.textContent= responseGet.message;
              

                 setTimeout(() => {
                hidden(isMessageAppear);
                hidden(isValid);


                }, 3000);
                    
                visible(isValid);
                isValid.textContent= responseGet.message;
              
                setTimeout(() => {
                hidden(isValid);


                }, 3000);
     
              
                }
                
            
          
            

          
        
    }


  function isNotNull(value){
            
    return value !== '' && value.length > 0 ? true : false;


     }


     function EventListenerHandler(eventTarget, eventType, eventHandler) {
            if (eventTarget.addEventListener) {
                eventTarget.addEventListener(eventType, eventHandler);
            } else if (eventTarget.removeListener) {
            eventTarget.removeListener(eventType, eventHandler);
            } else {
                eventTarget.addEventListener(eventType, eventHandler);

            }
    }

        
     var registerForm= document.getElementById('signUpForm');

     var authForm = document.getElementById('signInForm');



      

            
    var isValid = document.getElementById('isValidErrorSignup');


    
     async function processRegister(form){
          
        form.preventDefault();


       
        var office_list =form.target.elements['department_office'].value;
        var office_specify=form.target.elements['specify_office'].value;


   
           const formHaveValue = {
                    name:form.target.elements['fullname'].value,
                    email:form.target.elements['email'].value,
                    password:form.target.elements['password'].value,
                    idNumber:form.target.elements['IDNumber'].value,
                    office:office_list !== 'others' ? office_list : null,
                    specify_office:office_list === 'others'? office_specify : null,
                   phoneNumber:form.target.elements['phonenumber'].value,
                   gender:form.target.elements['gender'].value
                
              }

         


      console.log(isNotNull(formHaveValue.name) === true );


     
        var emailRegex = /^([a-zA-Z0-9.]+)([.{1}])?([a-zA-Z0-9.]+)\@(?:gmail|mailinator|yahoo|outlook|ymail)([\.])(?:com)$/;
        
        var formErrorSpan = document.querySelectorAll('#error-span');


            const formErrorContent = {
              "nameErr":formErrorSpan[0],
              "emailErr":formErrorSpan[1],
              "passwordErr":formErrorSpan[2],
              "phoneErr":formErrorSpan[3]
              
            }

            

        if(isNotNull(formHaveValue.name) === true && isNotNull(formHaveValue.email) === true && isNotNull(formHaveValue.password) === true && isNotNull(formHaveValue.idNumber) === true && formHaveValue.phoneNumber.length > 2){
           
      var contact_numberValid1 = formHaveValue.phoneNumber.indexOf('09') >= 0 ;
			var contact_numberValid2 = formHaveValue.phoneNumber.indexOf('639') >= 0;
			var contact_numberValid3 = formHaveValue.phoneNumber.indexOf('+639') >= 0;

			var validContact=(contact_numberValid1 === true && formHaveValue.phoneNumber.length === 11) || ( contact_numberValid2 === true && formHaveValue.phoneNumber.length === 12) || (contact_numberValid3 === true && formHaveValue.phoneNumber.length === 13);


          
          
          
          if(formHaveValue.name.length < 2){
              console.log('name 2 length is min');
              
              formErrorSpan[0].classList.remove('hide-span');
               formErrorContent.nameErr.textContent = 'At lease two length min value.';

                setTimeout(() => {
              formErrorSpan[0].classList.add('hide-span');
                  
                }, 3000);
            }
            if(formHaveValue.password.length < 8){
              formErrorSpan[2].classList.remove('hide-span');


            
               formErrorContent.passwordErr.textContent = 'At least eight min length value.';

                setTimeout(() => {
              formErrorSpan[2].classList.add('hide-span');
                  
                }, 3000);

            }
            if(validContact === false){
              console.log('mobile length must be 11');
                formErrorSpan[3].classList.remove('hide-span');

               formErrorContent.phoneErr.textContent = 'Invalid number must be valid length and valid country code(+639,639,09).';

                setTimeout(() => {
              formErrorSpan[3].classList.add('hide-span');
                  
                }, 3000);

            }

            if(emailRegex.test(formHaveValue.email) === false){
              console.log('Email is invalid.');
                formErrorSpan[1].classList.remove('hide-span');

               formErrorContent.emailErr.textContent = 'Email is invalid.';
                 setTimeout(() => {
              formErrorSpan[1].classList.add('hide-span');
                  
                }, 3000);
            }

            else{

                if(formHaveValue.name.length > 2 && formHaveValue.password.length >7 && emailRegex.test(formHaveValue.email) === true && validContact === true){
                 const res =  await  fetchRequest('./register/register.controller.php',formHaveValue); 

                 console.log(res);
                }
                
      
            }

        }
        else{
            visible(isValid);
                setTimeout(() => {
                hidden(isValid);
                }, 3000);
     
              isValid.textContent='All field must be required.';
        }

     
            
      
     }




function processAuthentication(){


    
 var authUserValue = document.querySelectorAll('.card-front .auth-control');
  
        var isValidValue = document.getElementById('isValidErrorSignIn');

        var arrValueInput = Array.from(authUserValue);
     
        var arrErrorValueInput = {message:''};
   


        arrValueInput.map((forms,i) => {

            var valueInput = forms.value.length > 0;
            
  
            if(valueInput === true){
     
             arrErrorValueInput = {message: ''};

            }
            else{
             arrErrorValueInput = {message: 'All field is required.'};
            
            }
            
       

        })



     

            if(!isEmpty(arrErrorValueInput.message)){
         
               visible(isValidValue);
                setTimeout(() => {
                hidden(isValidValue);
                }, 3000);
     
                isValidValue.textContent=arrErrorValueInput.message;
            }
            else{
            

                        
              var rememberMe = document.getElementById('authCoookies');


                let userAddRememberMe = rememberMe.checked;

              EventListenerHandler(rememberMe,'click',(e)=>{
                    userAddRememberMe =rememberMe.checked
              })

              

         

                const formHaveValue = {
                    authUser:arrValueInput[0].value,
                    authPassword:arrValueInput[1].value,
                    rememberMe:userAddRememberMe
                }

            
                
                fetchRequest('./login/login.controller.php',formHaveValue)       
                                
                
            }
            
}





      EventListenerHandler(resetPass,'submit',processResetPassword);
      EventListenerHandler(registerForm,'submit',processRegister);

      EventListenerHandler(authForm,'click',processAuthentication);


function insertAfter(referenceNode, newNode) {
  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}


function getSelectedDepartmentValue(e){

  var getSelectedTag = document.getElementById('specify');



  if(e.selectedOptions[0].value === 'others'){
    

      getSelectedTag.classList.remove('hidden');
     
        
  
  }
  else{

   getSelectedTag.classList.add('hidden');
  }


  
  


}




async function fetchDepartment(url){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
  
  }).catch(() =>
    isErrorHandler()
  );

	const departments =   await res.json();


    var department_id = document.getElementById('department_id');

    var departmentSelect = '';

    


    departments.filter((value) =>value.id !== 0).forEach((department, b) => departmentSelect += '<option value='+department.id+'>'+department.name+'</option>');

    departmentSelect += '<option value="others">Specify others</option>';



department_id.innerHTML = departmentSelect;


   

  }   
fetchDepartment('./register/getDeparment.controller.php');



    </script>
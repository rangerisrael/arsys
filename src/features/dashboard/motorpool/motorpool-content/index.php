<style>
  
table .dataTable th,
table .dataTable td {
  white-space: nowrap;
	background-color: red;
}
select{
  width:auto;
  display: block !important;
    background-color: #485370 !important;
    border-radius: 4px;
    height: 3rem;
    color: #ffffff;
    outline: none;
    border:transparent;
    /* border: 0.5px inset #eaeaea; */
    box-shadow: -1px 4px 9px 2px rgba(0,0,0,0.55);
-webkit-box-shadow: -1px 4px 9px 2px rgba(0,0,0,0.55);
-moz-box-shadow: -1px 4px 9px 2px rgba(0,0,0,0.55);
}

	select option {
			margin: 40px;
			background: #31526d;
			color: #fff;	
		}


    .modal{
      max-width: 500px !important;
      padding: 2rem 1.5rem 1rem;
      border-radius: 8px;
    }


    .responsive-img{
      height: 200px !important;
    }

    
    .upload-label{
    position: relative;

    width: 100%;


    }


    .upload-label:hover {
    -ms-transform: scale(1.1); /* IE 9 */
    -webkit-transform: scale(1.1); /* Safari 3-8 */
    transform: scale(1.1); 
    cursor: pointer;
    }

    .overlay {
    display: none;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    overflow: hidden;
    background:  rgba(0,0,0,0.3);;
    width: 100%;
    height: 100%;
    border-radius: 8px
    transition: 15s ease-in;
    }




    .upload-label:hover  .overlay{
    transform: scale(1);
      cursor: pointer;
    display: block;

    }

    .overlay-text{
      display: flex;
      justify-content: center;
      align-items: center;
      height:100%;
      color:#ffffff;
      font-weight: 700;
      font-size: 1.5rem;
      letter-spacing: 0.5em;
    }
#toast-container {
    min-width: 10%;
    top: 65%;
    right: 50%;
    transform: translateX(50%) translateY(50%);
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


</style>



<section class="main">
  <section class="top">
      <!-- <section class="user_profile">
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

  </section>
  <div class="bottom">
    <div >

         <label class="search-text" for="search">Search:</label><input id="search" class="search-input" type="search"
        placeholder="Search..." />
    <div style="display:flex; flex-direction: row; justify-content: flex-end;  ">
        <span class="waves-effect waves-light  modal-trigger" href="#motorpool" style=' color:#363f4e; display:flex; justify-content: flex-start; gap:8px; margin:20px 5% 20px 5%;'> <i class="small material-icons" >add_circle</i><h6>Add Vehicles</h6></span>
                <span style=' color:#363f4e; display:flex; justify-content: flex-start; gap:8px; margin:20px 5% 20px 5%;'> <i class="small material-icons">add_circle</i><h6>Reserve Vehicle</h6></span>
    </div>

     
    </div>

  <div class="table_wrapper">
      
    <table id="table_id" class="display nowrap" style="width:100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Photo</th>
          <th>Plate number</th>
          <th>Fuel</th>
          <th>Gear</th>
          <th>Capacity</th>
          <th>Borrowing type</th>
          <th>Respondent</th>
          <th>Respondent contact #</th>
          <th>Traven reason</th>
          <th>Particpant</th>
          <th>Time</th>
          <th>Request photo</th>
          <th>Date of filling</th>
          <th>Date of return</th>
          <th>Status</th>
          <th>Inventory by</th>
   
         
        </tr>
      </thead>
      <tbody id='loopData'>
        <!-- <tr>
          <td>Afdd32423423432</td>
          <td>John Doe</td>
          <td>johndoe@gmail.com</td>
          <td>24</td>
          <td>0901234343</td>
          <td>Information Technology</td>
          <td>Admin</td>
          <td>11/6/2022</td>
          <td>
            <span id="editBtn" class="editBtn btn"> <i class="material-icons small">edit</i></span>
          </td>
          <td>
            <span id="deleteBtn" class="deleteBtn btn"><i class="material-icons small">delete_forever</i> </span>
          </td>
        </tr> -->
      </tbody>
      <tfoot></tfoot>
    </table>

  </div>



 

  <!-- Modal Structure -->
  <div id="motorpool" class="modal ">
    
    <div class="modal-header">
      <h4 style="text-align: center;">New Vehicle</h4>
    </div>

    <div class="modal-content">
  
    <form id='vehicleForm' class="col s12 m12 l6 xl6">
      <div class="row">
        <div class="input-field col s12">
          <input id="vehicle_name" type="text" name="vehicle_name" class="validate">
          <label for="vehicle_name">Name</label>
        </div>
      </div>

        <div class="row">
        <div class="input-field col s12">
          <input id="plate_number" type="text" name="plate_number" class="validate">
          <label for="plate_number">Plate number</label>
        </div>
      </div>

       <div class="row">
        <div class="input-field col s12">
          <input id="fuel" type="text" class="validate" name="fuel">
          <label for="fuel">Fuel</label>
        </div>
      </div>

      
      <div class="row">
        <div class="input-field col s12">
          <input id="gear" type="text" class="validate" name="gear">
          <label for="gear">Gear</label>
        </div>
      </div>

       <div class="row">
        <div class="input-field col s12">
          <input id="capacity" type="number" class="validate" name="capacity">
          <label for="capacity">Capacity</label>
        </div>
      </div>
     
      <div class="row">
          <div class="col s12 m8 offset-m2 l6 offset-l3 upload-label">
            <label for="vehicle">  
              <img id='vehicle-preview' src="./../../../../public/assets/upload_vehicle.png" alt="" class="circle responsive-img"> 
             </label> 
            <label for="vehicle">
                 <div class="overlay">
                    <div class="overlay-text">
                         Upload
                    </div>
               </div>  
            </label>
                     <input name="uploadFile" style="display:none ;" id="vehicle" type="file" accept='image/*' onchange="filePreview(this);">

            </div>
   
      </div>
     
     

        
    </div>
    <div class="modal-footer">
    <button id="formVehicle" class="waves-effect waves-green btn-flat modal-close" type="submit">Save</button>
    </div>
   </form>

  </div>
          


  </div>
</section>




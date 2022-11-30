<style>
select{
  display: block !important;
  color:#ffffff !important;
  background: transparent !important;
  border: none !important;
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
       font-weight: 600px !important;
		}


    .hide-box{
      display:none;
    }


</style>



<div id='wrapper' class="wrapper">
  <div  id="edit-modal" class="modal-hidden-box hidden-box">
         <div onclick="onModalClose();" style="display:flex; justify-content: flex-end; font-size:1.5rem;margin-right:15px;cursor:pointer;">x</div>
    <div  id="edit-modal-box" class="box-modal">
   
    <div id='edit-form' style="display:flex; flex-direction: column; justify-content:center;margin-bottom:3rem; ">


         <form style='display:flex;justify-content:center; margin-bottom: 50px;'>
                 <div id='default' class="box-photo">
        
                  <label id='photo-text'  style="cursor: pointer;" for="file" class='default-img'>D</label>
               
                </div>

                 <div id='photo-hidden' class="box-photo image-hidden">
                  <label for="file">
                  <img id='photo-user' style="cursor: pointer;" class="img " src="" alt="">
                  </label>
                  <label for="file">  <div id='overlay' class="img-overlay"></div></label>
                </div>
           
                <input style="display: none;max-width:50px;"  id='file' type='file' name='uploadUser' onchange="filePreviewHandler(this);" accept="image/*"/>
            <br/>
         </form>
  

      <section style="display:flex; flex-direction: row; gap:2%;">
            <label for="name">Name:</label><input   style="color: #ffffff; padding-left: 20px;"  id='name' type="text"/>  
            <label for="email">Email:</label><input  style="color: #ffffff; padding-left: 20px;" id='email' type="text"/>  
      </section>
     <section style="display:flex; flex-direction: row;gap:2%;">
            <label for="name">Gender:</label><input  style="color: #ffffff; padding-left: 20px;" id='gender' type="text"/>  
            <label for="email">Phone Number:</label><input  style="color: #ffffff; padding-left: 20px;" id='phone' type="text"/>  
      </section>
         <section style="display:flex; flex-direction: row;gap:2%;">
            <label for="name">Dept. Office:</label><select  style="color: #ffffff; padding-left: 20px;" id='office' onchange="getDepartmentSelected(event);">  </select>
            
            <label for="email">Roles:</label><select  style="color: #ffffff; padding-left: 20px;" id='roles' onchange="getRoleSelected(event);"> </select>
              
      </section>
    <section id="dept_assign" class="hide-box">
        <label for="name">Department Assigned:</label><input  style="color: #ffffff; padding-left: 20px; width:200px;" name="department_assign"  id='department_assigned' type="text"/>  
    </section>

    <div style="display:flex; justify-content: center;">
      <input id='saveBtn' style="width:150px;height:44px;border-radius:4px;outline:none;border:none; margin-top:24px;"  type="submit" value="Save">
    </div>
    </div>
      


    </div>
  </div>
  <div id="delete-modal" class="modal-hidden-box-delete hidden-box">
         <div onclick="onModalClose();" style="display:flex; justify-content: flex-end; font-size:1.5rem;margin-right:15px;cursor:pointer;">x</div>

    <div id="delete-modal-box" class="box-modal">
            <p>Are you sure you want to delete this data?</p>
            <br/>
        <div>
             <button id='isOkModal'  class="isOkModal">OK</button>
               <button id='isCancel' onclick="handlerisCancel();" class="isCancel">Cancel</button>

        </div>
    </div>
  </div>

  <?php include('./dashboard-sidebar/index.php');  ?>
  <?php include('./dashboard-content/index.php');  ?>

</div>
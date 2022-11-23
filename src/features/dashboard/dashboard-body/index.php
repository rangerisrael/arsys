<div id='wrapper' class="wrapper">
  <div  id="edit-modal" class="modal-hidden-box hidden-box">
    <div  id="edit-modal-box" class="box-modal">
          <h3>Customer Data</h3>
    <div id='edit-form' style="display:flex; flex-direction: column; justify-content:center; ">
      <section style="display:flex; flex-direction: row;">
            <label for="name">Name:</label><input   style="color: #ffffff; padding-left: 20px;"  id='name' type="text"/>  
            <label for="email">Email:</label><input  style="color: #ffffff; padding-left: 20px;" id='email' type="text"/>  
      </section>
     <section style="display:flex; flex-direction: row;">
            <label for="name">Gender:</label><input  style="color: #ffffff; padding-left: 20px;" id='gender' type="text"/>  
            <label for="email">Phone Number:</label><input  style="color: #ffffff; padding-left: 20px;" id='phone' type="text"/>  
      </section>
         <section style="display:flex; flex-direction: row;">
            <label for="name">Dept. Office:</label><input  style="color: #ffffff; padding-left: 20px;" id='office' type="text"/>  
            <label for="email">Roles:</label><input  style="color: #ffffff; padding-left: 20px;" id='roles' type="text"/>  
      </section>

    <div style="display:flex; justify-content: center;">
      <input id='saveBtn' style="width:150px;height:44px;border-radius:4px;outline:none;border:none; margin-top:24px;" type="submit" value="Save">
    </div>
    </div>
      


    </div>
  </div>
  <div id="delete-modal" class="modal-hidden-box-delete hidden-box">
    <div id="delete-modal-box" class="box-modal">
      <h3>Are you sure you want to delete this data?</h3>
        <button id='isOkModal'  class="isOkModal">OK</button>
        <button id='isCancel' onclick="handlerisCancel();" class="isCancel">Cancel</button>

    </div>
  </div>

  <?php include('./dashboard-sidebar/index.php');  ?>
  <?php include('./dashboard-content/index.php');  ?>

</div>
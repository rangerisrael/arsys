
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
         <div class="backup_restore">
          <div class="row-content">
            <div class="setting-content ">

              <form  method="POST" >
                    <!-- <div><?php echo $backupMsg; ?></div> -->
                 <label for="backup" class="btn waves-effect indego setting-text  "><i style="margin-right:8px;" class=" large material-icons ">backup</i><span style="">Backup</span></label>
                <input style="display: none;" id='backup'  style="color:#ffffff;" name="submit" type="submit"  class="btn waves-effect text-white"  value="BACKUP" />
              </form>
             
            </div>
             <div  class="setting-content">

                <form method="post" enctype="multipart/form-data">
                  <div></div>

                  <div class="setting-content">
                         
                    <label for="database" class="btn waves-effect indego setting-text"><i style="margin-right:8px;" class=" large material-icons">arrow_upward</i><span style="">Import</span></label>
                  <input style="display:none;" id="database" type="file" name="database" />

                 <label for="restore" class="btn waves-effect indego setting-text  "><i style="margin-right:8px;" class=" large material-icons ">restore</i><span style="">Restore</span></label>
                   
                  <input style="display:none;" id="restore" type="submit" name="restore" class="btn btn-info setting-text" value="Import" />
                  </div>
            
              </form>
            
            </div>
             <div class="setting-content">       
            <form  method="POST" >
                <!-- <div><?php echo $dbMessage; ?></div> -->
            <label for="createDb" class="btn waves-effect indego setting-text"><i style="margin-right:2px;" class=" large material-icons">sync</i><span style="">Generate DB</span></label>
            <input style="display: none;" name="createDb" type="submit" id="createDb" class="btn waves-effect text-white"  value="Create Database and table" />
          </form>
            </div>
          </div>
         </div>

  </div>



 



  </div>
</section>




<style>
  
table .dataTable th,
table .dataTable td {
  white-space: nowrap;
	background-color: red;
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
        <span style=' color:#363f4e; display:flex; justify-content: flex-start; gap:8px; margin:20px 5% 20px 5%;'> <i class="small material-icons">add_circle</i><h6>Add Customer</h6></span>
    </div>

     
    </div>

  <div class="table_wrapper">
      
    <table id="table_id" class="display nowrap" style="width:100%">
      <thead>
        <tr>
          <th>ID</p>
          </th>
          <th>Name</th>
          <th>Photo</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Phone Number</th>
          <th>Deparment Office</th>
          <th>Roles</th>
          <th>Date created</th>
          <th>Action</th>
          <th>Action</th>
         
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





  </div>
</section>

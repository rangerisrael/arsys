<!DOCTYPE html>
<html lang="en">
<?php include('../settings/settings-header/index.php'); ?>


<?php include('../settings/setting-body/index.php'); ?>


</body>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



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



    async function fetchRequestText(url,data){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
    body: JSON.stringify(data)
  }).catch(() =>
    isErrorHandler()
  );

   return await res.text();


   }


async function fetchRFormDataRequest(url){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
  }).catch(() =>
    isErrorHandler()
  );

	return await res;

		

  }


  async function fetchFormDownload(url,data){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
    body: data
  }).catch(() =>
    isErrorHandler()
  );

	return await res;

		

  }



 async function backupSql(){
          const res = await fetchRequest('./settings-controller/getAlltables.php');

      let arr = [];

    res.map((value) => arr.push(value.Tables_in_arrsys));


    // console.log(arr);

    const formData =  new FormData();
    formData.append('backup[]',arr)

  
 
          const sendBackupRequest = await fetchRFormDataRequest('./settings-controller/backup.php');


          console.log(sendBackupRequest);


  }

  </script>


</html>
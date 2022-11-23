<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>SendForm</title>
	</head>
	<body>
		<div>
			<form id="registerForm" method="#">
				Name<input type="text" name="facility_name" id="email" /><br/>
				Photo<input type="file" name="photo" id="photo" accept="image/*" /><br/>
				Capacity<input type="text" name="capacity" id="capacity" /><br/>
				Location<input type="text" name="location" id="location" /><br/>
				<button type="submit">Send to database</button>
			</form>
		</div>
	</body>

	<script>



  async function fetchRequest(url,data){
  const res = await fetch(url, {
    method: "POST",
    header: {
      "Content-type": "application/json; charset=UTF-8"
    },
    body: data
  }).catch(() =>
    isErrorHandler()
  );

const resp = await res.json();

   console.log(resp)


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


		var form = document.getElementById('registerForm');



		form.addEventListener('submit', function (e) {
			e.preventDefault();





			// const data = {
			// 	"email":
			// 	"photo":e.target.elements['photo'].files[0],
			// 	"subj":e.target.elements['capacity'].value,
			// 	"msg":e.target.elements['location'].value,
			// }

			const file = e.target.elements['photo'].files[0];
		


			const formRequest =  new FormData();
				formRequest.append('name',e.target.elements['facility_name'].value);
				formRequest.append('scan_files',renameUpload(file,'facilities_scan_file_',file.name,file.type,file.lastModified));
				formRequest.append('capacity',e.target.elements['capacity'].value);
				formRequest.append('location',e.target.elements['location'].value)


			fetchRequest('./faclities-controller/testform.php',formRequest);
	
		});
	</script>
</html>

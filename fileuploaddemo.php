
<form action="" method="post" enctype="multipart/form-data" name="form1">
<input type="file" name="resume" id="resume">
<input type="submit" name="SubmitBtn" id="SubmitBtn" value="Upload Resume">
</form>
<?php
if(isset($_POST["fileProofDocument"])){

$fileName=$_FILES["resume"]["name"];
$fileSize=$_FILES["resume"]["size"]/1024;
$fileType=$_FILES["resume"]["type"];
$fileTmpName=$_FILES["resume"]["tmp_name"];  

if($fileType=="application/pdf"){
if($fileSize<=200){

//New file name
$name=$_POST['fileProofDocument'];
$newFileName=$name.$fileName;

//File upload path
$uploadPath="documents/".$newFileName;

//function for upload file
if(move_uploaded_file($fileTmpName,$uploadPath)){
  $proofDocument=$uploadPath;
}
}
else{
  echo "Maximum upload file size limit is 200 kb";
}
}
else{
  echo "You can only upload a Word doc file.";
}  

}
?> 
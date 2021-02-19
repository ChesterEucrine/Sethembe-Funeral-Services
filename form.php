<?php
// fplan=single
// camount=c1
// title=Mr
// surname=Dlamini
// names=Chester+Eucrine
// id=9812126281087
// street1=276+highland+road
// street2=
// city=Kensington
// province=Gauteng
// postal=2101
// cmonth=2021-02-14
// cmonth=2021-02-14
// jdate=2021-02-14
// cellphone=0632699301
// cellphone=0632699301
// email=blessingdlamini24747%40gmail.com
// bene-title=Mr
// bene-surname=Dlamini
// bene-names=Chester+Eucrine
// bene-id=9812126281087
// agreement=on
// submit=


function saveFileAs($targetDir, $fileName, $newFileName, $files) {
  $fileType = $files[$fileName]['type'];
  $fileSize = $files[$fileName]['size'];
  $fileTmpName = $files[$fileName]['tmp_name'];
  $fileError = $files[$fileName]['error'];

  // Check file extension
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = $array('jpg', 'jpeg', 'png', 'pdf');

  if in_array($fileActualExt, $allowed) {
    if ($fileError === 0) {
      if ($fileSize <= 20000) {
        $newFileName = $newFileName.".".$fileActualExt;
        $fileDest = $targetDir.$newFileName;
        if (move_uploaded_file($fileTmpName, $target_file)) {
          return 0;
        } else {
          return 4;
        }
      } else {
        return 3;
      }
    } else {
      return 2;
    }
  } else {
    return 1;
  }
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// check File Size
if ($_FILES["fileToUpload"]["size"] > 20000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "pdf" ) {
  echo "Sorry, only JPG, JPEG, PNG & pdf files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}





/*
fplan=single
camount=c1
title=Mrsurname=Dlamini
names=Chester+Eucrine
id=981212126281087
street1=276+highland+road
street2=
city=Kensington
province=Gauteng
postal=2101
cmonth=2021-02-14
cmonth=2021-03-14
jdate=2021-02-14
cellphone=0632699301
wcellphone=
email=blessingdlamini24747%40gmail.com

title1=mr
surname1=dlamini
full_name1=Chester+Eucrine
id1=9812126281087
relation1=brother
gender1=male

title2=mrs
surname2=dlamini
full_name2=chesterine
id2=9812125281087
relation2=sister
gender2=female

bene-title=Mr
bene-surname=Dlamini
bene-names=Chester+Eucrine
bene-id=9812126281087
agreement=on
submit=submit


*/

?>

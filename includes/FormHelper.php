<?php

/*

dependent_title1=mr
dependent_surname1=dlamini
dependent_full_name1=Chester+Eucrine
dependent_id1=9812126281087
dependent_relation1=brother
dependent_gender1=male

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


/**
 *
 */
class FormHelper {
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
*/

  // First page properties
  public $fplan;
  public $camount;
  public $title;
  public $names;
  public $id;
  public $street1;
  public $street2;
  public $city;
  public $province;
  public $postal;
  public $cmonth;
  public $fmonth;
  public $jdate;
  public $cellphone;
  public $wcellpone;
  public $email;

  // Second Page Properties
  public $dependents;

/*

bene-title=Mr
bene-surname=Dlamini
bene-names=Chester+Eucrine
bene-id=9812126281087
agreement=on
submit=submit
*/

  // Third Page Properties
  public $bene_title;
  public $bene_surname;
  public $bene_names;
  public $bene_id;

  function __construct($post){
    // Page 1
    $fplan = $post["fplan"];
    $camount = $post["camount"];
    $title = $post["title"];
    $names = $post["names"];
    $id = $post["id"];
    $street1 = $post["street1"];
    $street2 = $post["street2"];
    $city = $post["city"];
    $province = $post["province"];
    $postal = $post["postal"];
    $cmonth = $post["cmonth"];
    $fmonth = $post["fmonth"];
    $jdate = $post["jdate"];
    $cellphone = $post["cellphone"];
    $wcellpone = $post["wcellpone"];
    $email = $post["email"];

    // Page 2
    $dependents = array();
    foreach ($post as $key=>$value) {
      $pattern = "/dependent/i";
      if (preg_match($pattern, $value) === 1) {
        // add it to the Dependents array
        $dependents[$key] = $value;
      }
    }

    // Page 3
    $bene_title = $post["bene_title"];
    $bene_surname = $post["bene_surname"];
    $bene_names = $post["bene_names"];
    $bene_id = $post["bene_id"];
  }

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
}


?>

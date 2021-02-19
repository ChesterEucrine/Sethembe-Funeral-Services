<?php

$title = "Unsuccessful";
$h1 = "Information was not Successfully added";
$image = "cancel.png";
$h2 = "Please try again Later";
$h3 = "<h1>No information given</h1>";

if (isset($_POST["full_name"])) {
    $name = $_POST["full_name"]; // The username of the person who is trying to buy
    $cellphone = $_POST["cellphone"];
    $email = $_POST["email"]; // The username of the person who is trying to buy
    $message = $_POST["message"];
    
    $username = "sethembe_user";
    $password = "sethembe_user";
    $database = "sethembe_main";
    
    $output = array();
    $link = mysqli_connect("127.0.0.1", $username, $password, $database);
    
    $result = mysqli_query($link, "SELECT query_id FROM `QUERYS` WHERE query_id = (SELECT MAX(query_id) FROM QUERYS)");
    while($row=$result->fetch_assoc()) {
        $output[] = $row;
    }
    $max = $output[0]["query_id"] + 1;
    
    $result = mysqli_query($link, "insert into QUERYS values('$max', '$name', '$cellphone', '$email', '$message');") or die(mysqli_error($link));    
    
    if ($result === true) {
        $title = "Successful";
        $h1 = "Information Successfully added";
        $image = "check.png";
        $h2 = "Thank you very much one of our consultants to contact you back";
    }
    $h3 = "";
}

echo    "<!DOCTYPE html>
        <html lang=\"en\" dir=\"ltr\">
          <head>
            <meta charset=\"utf-8\">
            <title>$title</title>
            <link rel=\"icon\" type=\"image/png\" href=\"icon.png\">
            <style media=\"screen\">
              .body {
                text-align: center;
                background: #fff;
                color: #fab400;
              }
        
              header {
                background: #eee;
              }
        
              img {
                width: 10rem;
              }
        
              h1 {
                font-family: \"Times New Roman\", Times, serif;
                font-weight: lighter;
              }
        
            </style>
          </head>
          <body>
            <div class=\"body\">
                <header>
                  <img src=\"logoblue.png\" alt=\"logo\">
                </header>
                <h1>$h1</h1>
                <img src=\"images/icons/$image\" alt=\"Success\">
                <h1>$h2</h1>
                $h3
            </div>
          </body>
        </html>";

/*if (isset($_POST["full_name"])) {
    $username = "sethembe_user";
    $password = "JhiwvZx3U2yHiAH";
    $database = "sethembe_main";
    mysql_connect("localhost", $username, $password, $database) 
    //or die ('MySQL connect failed. ' . mysql_error());

    $name = $_POST["full_name"]; // The username of the person who is trying to buy
    $cellphone = $_POST["cellphone"];
    $email = $_POST["email"]; // The username of the person who is trying to buy
    $message = $_POST["message"];
  
    $msg = "";
    $sql = mysql_query("insert into QUERYS values(NULL, $name, $cellphone, $email, $message);");
    
      if (!$sql) {
          die("Database query failed: " . mysql_error());
      } else {
          echo "<h1>Added information to database<h1><br>To Website: <a href='sethembefs.co.za'>Sethembe Funeral Services</a>";
      }
} else {
    echo "<h1>No information given</h1>";
}*/
?>

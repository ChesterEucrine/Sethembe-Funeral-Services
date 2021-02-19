<?php

/**
 *
 */
class Database {
 private $host = '127.0.0.1';
 private $user = 'sethembe_user';
 private $pass = 'sethembe_user';
 private $dbname = 'sethembe_main';

 private $db;
 private $stmt;
 private $testPassword;
 private $testUser;
 private $error;

 public function __construct(){
   // Set DSN
   $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
   $options = array(
     PDO::ATTR_PERSISTENT => true,
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
   );
   $this->db = new PDO($dsn, $this->user, $this->pass, $options);
 }

 public function query($sql){
   $this->stmt = $this->db->query($sql);
 }

 public function exec($sql) {
   $this->stmt = $this->db->exec($sql);
 }

 public function resultSet(){
   return $this->stmt;
 }
}

/**
 *
 */
class DatabaseHelper {
  private $link;
  private $database;
  function __construct(argument) {
    $this->database = new Database;
  }

  /*  Separating functions by database tables */
/////////////////////////////////////////////////////////
  /*  Functions for the Sethembe queries table */

  /* Get queries from querys table */
  function getQueries() {
    $this->database->query("SELECT * FROM QUERYS");
    $result = $this->database->resultSet();
    $items = array();
    if ($result !== -1) {
      while ($dataResult = $result->fetch(PDO::FETCH_ASSOC)) {
        $response = array();
        $response['id'] = $dataResult['query_id'];
         '$name', '$cellphone', '$email', '$message'
        $response['names'] = $dataResult['names'];
        $response['email'] = $dataResult['email'];
        $response['cellphone'] = $dataResult['cellphone'];
        $response['message'] = $dataResult['message'];
        $items[] = $response;
      }
      $items['error'] = 0;
    } else {
      $items['error'] = 1;
    }
    return $items;
  }
// TODO:
  // add an item to querys P0
  // remove an item from querys P2
  // remove all items from querys P2
  // backup/save as an excel file P1

// FOR LATER USE
// SELECT query_id FROM `QUERYS` WHERE query_id = (SELECT MAX(query_id) FROM QUERYS)

  /*  Functions for the applications table  */

// TODO:
  //  add applicant info to table P0
  // remove applicant info from table P2
  // remove all apllicants P2
  // backup/save as an excel file P1


  /* Functions for the Dependents table */

// TODO:
  // add applicant info to dependents table P0
  // remove applicant info from dependents table P2
  // remove all applicant info P2
  // save as a json array or some form of storable data P1

  /* Functions for the Beneficiaries Table  */

// TODO:
  // Same functions as above

}


?>

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

  /* Get queries from LEADS table */
  function getLeads() {
    $this->database->query("SELECT * FROM LEADS");
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
  // remove an item from LEADS P2
  // remove all items from LEADS P2
  // backup/save as an excel file P1

/*
  Function to retrieve the hightest and last query_id value;
  */
public function getLast() {
  $sql = "SELECT query_id FROM `LEADS` WHERE query_id = (SELECT MAX(query_id) FROM LEADS)"
  $this->database->query($sql);
  return $this->database->resultSet();
}

/*
  Function to add a query to the LEADS table;
  from an array of the form data from the contact page
   0 - Success
  -1 - fail unable to get the last item's id
  -2 - Unable to add a query to the table
  */
public function addQuery($value) {
  // Get the last item's id
  $max = $this->getLast();
  if ($max !== -1) {
    $max += 1;
    $name = $value['name'];
    $cellphone = $value['cellphone'];
    $email = $value['message'];
    $sql = "INSERT INTO LEADS VALUES('$max', '$name', '$cellphone', '$email', '$message')";

    $this->database->query($sql);
    $result = $this->database->resultSet();
    if ($result !== -1) {
      return 0;
    } else {
      return -2;
    }
  } else {
    return -1;
  }
}

  /*  Functions for the applications table  */

// TODO:
  //   P0

  /*  Function to add applicant info to CLIENTS table
     0 - Success
    -1 - Fail
  */
  public function addClient($client) {
    $sql = "INSERT INTO CLIENTS VALUES(
      $client->id,
      $client->title,
      $client->surname,
      $client->names,
      $client->street1,
      $client->street2,
      $client->city,
      $client->province,
      $client->postal,
      $client->fplan,
      $client->camount,
      $client->cmonth,
      $client->fmonth,
      $client->jdate,
      $client->cellphone,
      $client->wcellpone,
      $client->email,
      $client->$fileName
    )";

    $this->database->query($sql);
    $result = $this->database->resultSet();
    if ($result !== -1) {
      return 0;
    } else {
      return -1;
    }
  }

    /*  Function to get applicant info from CLIENTS table

    */
    public function getClientInfo($id) {
      $sql = "SELECT * FROM CLIENTS WHERE ='$id'";
      $this->database->query($sql);
      $result = $this->database->resultSet();
      $items = array();
      if ($result !== -1) {
        while ($dataResult = $result->fetch(PDO::FETCH_ASSOC)) {
          $response = array();
          $response['CLIENT_ID'] = $dataResult['CLIENT_ID'];
          $response['TITLE'] = $dataResult['TITLE'];
          $response['SURNAME'] = $dataResult['SURNAME'];
          $response['NAME'] = $dataResult['NAME'];
          $response['STREET1'] = $dataResult['STREET1'];
          $response['STREET2'] = $dataResult['STREET2'];
          $response['CITY'] = $dataResult['CITY'];
          $response['PROVINCE'] = $dataResult['PROVINCE'];
          $response['POSTAL'] = $dataResult['POSTAL'];
          $response['F_PLAN'] = $dataResult['F_PLAN'];
          $response['C_AMOUNT'] = $dataResult['C_AMOUNT'];
          $response['C_MONTH'] = $dataResult['C_MONTH'];
          $response['F_MONTH'] = $dataResult['F_MONTH'];
          $response['J_DATE'] = $dataResult['J_DATE'];
          $response['CELLPHONE'] = $dataResult['CELLPHONE'];
          $response['WORKPHONE'] = $dataResult['WORKPHONE'];
          $response['EMAIL'] = $dataResult['EMAIL'];
          $response['ID_PATH'] = $dataResult['ID_PATH'];
          $items[] = $response;
        }
        $items['error'] = 0;
      } else {
        $items['error'] = 1;
      }
      return $items;
    }

    public function getAllClients() {
      $sql = "SELECT * FROM CLIENTS";
      $this->database->query($sql);
      $result = $this->database->resultSet();
      $items = array();
      if ($result !== -1) {
        while ($dataResult = $result->fetch(PDO::FETCH_ASSOC)) {
          $response = array();
          $response['CLIENT_ID'] = $dataResult['CLIENT_ID'];
          $response['TITLE'] = $dataResult['TITLE'];
          $response['SURNAME'] = $dataResult['SURNAME'];
          $response['NAME'] = $dataResult['NAME'];
          $response['STREET1'] = $dataResult['STREET1'];
          $response['STREET2'] = $dataResult['STREET2'];
          $response['CITY'] = $dataResult['CITY'];
          $response['PROVINCE'] = $dataResult['PROVINCE'];
          $response['POSTAL'] = $dataResult['POSTAL'];
          $response['F_PLAN'] = $dataResult['F_PLAN'];
          $response['C_AMOUNT'] = $dataResult['C_AMOUNT'];
          $response['C_MONTH'] = $dataResult['C_MONTH'];
          $response['F_MONTH'] = $dataResult['F_MONTH'];
          $response['J_DATE'] = $dataResult['J_DATE'];
          $response['CELLPHONE'] = $dataResult['CELLPHONE'];
          $response['WORKPHONE'] = $dataResult['WORKPHONE'];
          $response['EMAIL'] = $dataResult['EMAIL'];
          $response['ID_PATH'] = $dataResult['ID_PATH'];
          $items[] = $response;
        }
        $items['error'] = 0;
      } else {
        $items['error'] = 1;
      }
      return $items;
    }

  // remove applicant info from table P2
  // remove all apllicants P2
  // backup/save as an excel file P1




  /* Functions for the Dependents table */

// TODO:
  // add applicant info to dependents table P0
  public function addDependents($client_id, $dependents) {
    $length = count($dependents);
    $sql = "INSERT INTO DEPENDENTS VALUES (
      '$client_id',

    )"
    CLIENT_ID VARCHAR(20) NOT NULL,
    FOREIGN KEY CLIENT_ID REFERENCES CLIENTS(CLIENT_ID),
    D_NUMBER INT(4) NOT NULL,
    D_ID VARCHAR(20) PRIMARY KEY,
    D_TITLE VARCHAR(10) NOT NULL,
    D_SURNAME VARCHAR(10) NOT NULL,
    D_NAME VARCHAR(20) NOT NULL,
    RELATIONSHIP VARCHAR(10) NOT NULL,
    GENDER VARCHAR(10) NOT NULL);

  }
  // remove applicant info from dependents table P2
  // remove all applicant info P2
  // save as a json array or some form of storable data P1

  /* Functions for the Beneficiaries Table  */

// TODO:
  // Same functions as above

}


?>

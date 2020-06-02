<?php

  header('Content-Type: application/json');

  $server = 'localhost';
  $user = 'root';
  $password = 'root';
  $db_name = 'hoteldb';

  $conn = new mysqli($server, $user, $password, $db_name);

  if($conn -> connect_errno){
    echo json_encode($conn -> connect_errno);
    return;
  }

  $sql = "SELECT id, name, lastname, address
          FROM paganti
          ";

  $results = $conn -> query($sql);
  $res = [];


  if($results -> num_rows > 0){
    while($row = $results -> fetch_assoc()){
      $res[] = $row;
    }
    echo json_encode($res);
  }

  $conn -> close();

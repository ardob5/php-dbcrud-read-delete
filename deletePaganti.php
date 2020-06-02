<?php

  $server = "localhost";
  $user = "root";
  $password = "root";
  $db_name = "hoteldb";

  $id = $_POST['id'];

  $conn = new mysqli($server, $user, $password, $db_name);


  if($conn -> connect_errno){
    echo json_encode($conn -> connect_errno);
    return;
  }

  $sql = "DELETE FROM paganti
          WHERE id = " . $id;

  $conn -> query($sql);

  $conn -> close();

<?php

  $dbHost = 'localhost';
  $dbName = 'patente';
  $dbUser = 'root';
  $dbPass = '';

  try {
      $db = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8", $dbUser, $dbPass);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  catch(PDOException $e) {
      echo 'Connesione Fallita. Errore: '.$e->getMessage();
  }
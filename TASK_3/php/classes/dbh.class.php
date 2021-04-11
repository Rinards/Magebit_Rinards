<?php
// Base class
class Dbh {
   private $host = "localhost"; // Host
   private $user = "root"; // Username
   private $pwd = "root"; // Password
   private $dbName = "emails_rinards"; // Database name

   protected function connect(){
      $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName;
      $pdo = new PDO($dsn, $this->user, $this->pwd);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
   }
}

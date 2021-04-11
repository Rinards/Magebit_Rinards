<?php
include "dbh.class.php";

// Model class
class Email extends Dbh
{
   protected function setEmail($email, $provider)
   {
      // Connect and execute insert query 
      $sql = "INSERT INTO Emails (ID, Email, Provider, Date) VALUES (NULL, ?, ?, CURRENT_TIMESTAMP);";
      $this->connect();
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$email, $provider]);
   }

   protected function getEmails($provider, $search, $sort, $limit, $offset)
   {
      // Sort by date by default
      if (empty($sort)) $sort = "date";

      // Create query from inputted data
      $sql = "SELECT * FROM Emails ";
      if (!empty($provider) && !empty($search)) $sql = $sql . " WHERE Provider = '$provider' AND email LIKE '%$search%' ";
      else if (!empty($provider)) $sql = $sql . " WHERE Provider = '$provider' ";
      else if (!empty($search)) $sql = $sql . " WHERE email LIKE '%$search%' ";
      $sql = $sql . " ORDER BY $sort ";
      if ($limit !== 0) $sql = $sql . " LIMIT $limit OFFSET $offset";

      // Connect and execute select query
      $this->connect();
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      return $results;
   }

   protected function deleteEmail($id)
   {
      // Connect and execute delete query 
      $sql = "DELETE FROM Emails WHERE ID=" . $id;
      $this->connect();
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute();
   }
}

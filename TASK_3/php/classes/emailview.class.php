<?php
include "emailcontr.class.php";

// View class
class EmailView extends Email
{

   public function getOptions()
   {
      // execute model method to get all email providers
      $data = $this->getEmails("", "", "", 0, 0);

      $count = count($data);
      $allProviders = array();
      // fill array with every provider there is in data
      for ($i = 0; $i < $count; $i++) {
         $allProviders[$i] = $data[$i]["Provider"];
      }
      // array of unique providers in alphabetical order
      $uniqueProviders = array_unique($allProviders);
      sort($uniqueProviders);
      return $uniqueProviders;
   }

   public function showEmails($limit, $offset)
   {
      // get variable is set, else set to empty string
      if (isset($_POST["provider"])) $provider = $_POST["provider"];
      else $provider = "";
      if (isset($_POST["search"])) $search = $_POST["search"];
      else $search = "";
      if (isset($_POST["sort"])) $sort = $_POST["sort"];
      else $sort = "";
      // execute model method to get emails from database
      $results = $this->getEmails($provider, $search, $sort, $limit, $offset);
      return $results;
   }
}

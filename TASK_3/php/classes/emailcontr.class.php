<?php
include "email.class.php";

class EmailContr extends Email
{

   public function addEmail($email, $provider)
   {
      // For better looks make provider name start with capital letter
      $provider = ucfirst($provider);
      // Execute model method to set email
      $this->setEmail($email, $provider);
   }
   public function removeSelectedEmails($list){
      // Loop through selected emails
      foreach($list as $id){
         // For each id execute model method to delete email 
         $this->deleteEmail($id);
      }
      // refresh the page after deletion is completed
      header('Location: ' . $_SERVER['HTTP_REFERER']);
   }



}

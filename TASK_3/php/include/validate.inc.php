<?php
include "../classes/emailcontr.class.php";

function validation()
{
   $pattern = "/^(?:(?:[^<>()\[\]\\.,;:\s@\"]+(?:\.[^<>()\[\]\\.,;:\s@\"]+)*)|(?:\".+\"))@(?:(?:\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(?:(?:([a-zA-Z\-0-9]+)\.)+([a-zA-Z]{2,})))$/";
   if (isset($_POST["email"])) $email = $_POST["email"];
   else return "";
   if (!empty($email)) {
      if (preg_match($pattern, $email, $matches)) {
         if (!($matches[2] === "co")) {
            if (isset($_POST["checkbox"])) {

               if (isset($_POST["js"])) {
                  echo "valid";
               }
               $contr = new EmailContr;
               $contr->addEmail($matches[0], $matches[1]);
               return "";
            } else {
               $error = "You must accept the terms and conditions";
               return $error;
            }
         } else {
            $error = "We are not accepting subscriptions from Colombia";
            return $error;
         }
      } else {
         $error = "Please provide a valid e-mail address";
         return $error;
      }
   } else {
      $error = "Email address is required";
      return $error;
   }
}

if (isset($_POST["js"])) {
   $error = validation();
}

if (isset($_POST["checkbox"])) $checkbox = $_POST["checkbox"];

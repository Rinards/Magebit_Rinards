<?php

// Create table with fetched data
function createTable($data, $rows)
{
   if (empty($data)) {
      echo "<h1>Nothing was found.</h1>";
   } else {
      echo "<table>";
      echo "<thead><tr><th></th><th>ID</th><th>Email</th><th>Provider</th><th>Date</th></tr></thead><tbody>";

      for ($i = 0; $i < $rows; $i++) {
         $id = $data[$i]["ID"];
         $em = $data[$i]["Email"];
         $pr = $data[$i]["Provider"];
         $date = $data[$i]["Date"];

         echo "<tr><td>  <input type='checkbox' name='checkbox[$i]' value='$id'</td><td>$id</td><td>$em</td><td>$pr</td><td>$date</td></tr>";
      }
      echo "</tbody>";
      echo "</table>";
   }
}

// Create provider filter options with list of providers
function createOptions($list)
{
   echo "<option value=''>All email providers</option>";
   foreach ($list as $value) {
      echo "<option value='$value'>$value</option>";
   }
}

// Create page links
function createPages($pages)
{
   for ($i = 1; $i <= $pages; $i++) {
      echo "<a href='?page=$i'> $i </a>";
   }
}

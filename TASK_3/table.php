<?php
include "php/include/table.inc.php";
include "php/classes/emailview.class.php";

// Get all data (to get all available provider options)
$view = new EmailView;
$data = $view->showEmails(0, 0);

// Get providers options from view method
$options = $view->getOptions();

// Calculate how many rows will be displayed
$rowsTotal = count($data);

// Calculate amount of pages 
$pagesTotal = ceil($rowsTotal / 10);

// Get page to calculate the offset for query
if (isset($_GET["page"])) $page = $_GET["page"];
else $page = 1;

// Check if current page is not higher that total pages e.g. when all data on last page get deleted
if ($page > $pagesTotal) $page = $pagesTotal;

// Calculate offset for query
$offset = 10 * ($page - 1);
$data = $view->showEmails(10, $offset);
$rows = count($data);

// Deleting selected values
if (isset($_POST["delete"])) {
   // Get all checked values
   $checkArr = $_POST["checkbox"];
   // Calling controller method for deletion
   $contr = new EmailContr;
   $contr->removeSelectedEmails($checkArr);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="stylesheet" href="styles/table.css">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Task 3 Table</title>
</head>

<body>

   <form method="POST">
      <input type="text" name="search" id="search" value="<?php if (isset($_POST["search"])) echo $_POST["search"]; ?>" placeholder="Search email...">
      <label for="sort">Sort by:</label>
      <select name="sort" id="sort">
         <option value="date">Date</option>
         <option value="email">Email</option>
      </select>
      <label for="provider">Filter providers:</label>
      <select name="provider" id="provider">
         <?php createOptions($options); ?>
      </select>
      <button type="submit">Submit</button>
      <?php createTable($data, $rows) ?>
      <input id="delete" type="submit" value="Delete" name="delete">
      <div class="pages">
         <?php createPages($pagesTotal); ?>
      </div>
   </form>

</body>

</html>
<?php
   session_start();
?>
   <!DOCTYPE html>
<html>
   <head>
      <title>Contact Manager - Error</title>
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body>
      <?php include("header.php"); ?>
      <main>
         <h1>Error</h1>

         <p><?php echo $_SESSION["add_error"]; ?></p>
         <p><a href="index.php">View Contact List</a></p>
      </main>
      <?php include("footer.php"); ?>
   </body>
</html>
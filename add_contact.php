<?php 
   session_start();
   // get the data from the form
   $first_name = filter_input(INPUT_POST, 'first_name');
   $last_name = filter_input(INPUT_POST, 'last_name');
   $email_address = filter_input(INPUT_POST, 'email_address');
   $phone_number = filter_input(INPUT_POST, 'phone_number');

   // code to save to MySQL Database goes here
   // validate inputs(checking if none of the inputs are = null)
   if ($first_name == null || $last_name == null || 
   $email_address == null || $phone_number == null)
   {
      $_SESSION["add_error"] = "Invalid contact data! Check all of 
      the fields and try again";

      $url = "error.php";
      header("Location: " . $url);
       die();
   } else {
      require_once('database.php');

      // Add the contact to the database(fields inside the database; has to match the names to the letter and in the same order)
      $query = 'INSERT INTO contacts
         (firstName, lastName, emailAddress, phone)
         VALUES
         (:firstName, :lastName, :emailAddress, :phone)';
   }
?>

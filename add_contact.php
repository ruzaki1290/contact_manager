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
      // if validation fails, redirect to error page
      $_SESSION["add_error"] = "Invalid contact data! Check all of 
      the fields and try again";

      $url = "error.php";
      header("Location: " . $url);
       die();
   } else {
      require_once('database.php');
      
      // if validation success, we will create an SQL statement in the database using the form
      // Add the contact to the database(fields inside the database; has to match the names to the letter and in the same order)
      $query = 'INSERT INTO contacts
         (firstName, lastName, emailAddress, phone)
         VALUES
         (:firstName, :lastName, :emailAddress, :phone)';
      
      $statement = $db->prepare($query);
      $statement->bindValue(':firstName', $first_name);
      $statement->bindValue(':lastName', $last_name);
      $statement->bindValue(':emailAddress', $email_address);
      $statement->bindValue(':phone', $phone_number);

      // processes to the database
      $statement->execute();
      // close prepared statement
      $statement->closeCursor();
   }

      // create session with a full name
      $_SESSION["fullName"] = $first_name . " " . $last_name;

      // redirect to confirmation page(hidden page, that the user cannot see; the page serves processing needs only)
      $url = "confirmation.php";
      header("Location: " . $url);
       die();
?>

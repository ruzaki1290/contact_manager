<?php 
   require_once('database.php');
   // get the data from index.php input contact_id
   $contact_id = filter_input(INPUT_POST, 'contact_id', FILTER_VALIDATE_INT);

   // code to save to MySQL Database goes here
   // validate inputs(checking if none of the inputs are = null)
   if ($contact_id != false)
   {
      $query = 'DELETE FROM contacts WHERE contactID = :contact_id';
      
      $statement = $db->prepare($query);
      $statement->bindValue(':contact_id', $contact_id);

      // processes to the database
      $statement->execute();
      // close prepared statement
      $statement->closeCursor();
   }

      // reload index page
      $url = "index.php";
      header("Location: " . $url);
       die();
?>

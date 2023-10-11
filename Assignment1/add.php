<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Puneet' Clinic</title>
    <meta name="description" content="This week we will be using OOP PHP to create and read with our CRUD application">
    <meta name="robots" content="noindex, nofollow">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/style.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
  </head>
  <body>
    <main>
    <?php
      // start by including our classes
     
      include_once ('validate.php');
      include_once ('database.php');
      // create our class objects
      $valid = new validate();
      
      if(!empty($_POST['Submit'])){
        // using our escape_string function
        $name = $_POST['name'];
        $name = $_POST['patientid'];
        $age = $_POST['age'];
        $contact = $_POST['email'];
        $bloodgroup = $_POST['bloodgroup'];
        $disease = $_POST['disease'];
        $treatmenttime= $_POST['treatmenttime'];
        // using our functions found in our validate class 
        // (checkEmpty validAge validEmail)
        $msg = $valid->checkEmpty($_POST, array('name','patientid', 'age', 'email' , 'bloodgroup' ,'disease' , 'treatmenttime'));
        $checkAge = $valid->validAge($_POST['age']);
        $checkContact = $valid->validContact($_POST['contact']);
        $checkTime = $valid->validTime($_POST['treatmenttime']);
        
        // now handle any empty fields
        if($msg != null){
          echo $msg;
          //link to the previous page
          echo "<a href='javascript:self.history.back();'>Go Back</a>";
        }elseif(!$checkAge){
          echo '<p>Please provide a valid age.</p>';
          echo "<a href='javascript:self.history.back();'>Go Back</a>";
        }elseif(!$checkEmail){
          echo '<p>Please provide a valid contact.</p>';
          echo "<a href='javascript:self.history.back();'>Go Back</a>";
        }elseif(!$checkTime){
          echo '<p>Please provide a valid Time.</p>';
          echo "<a href='javascript:self.history.back();'>Go Back</a>";  
        }else{
          // if all the fields are valid
          $result = $database->execute("INSERT INTO clinicReport( name , patientid ,age,email,bloodgroup,disease,treatmenttime) VALUES('$name','$patientid','$age','$contact','$bloodgroup','$disease','$treatmenttime')");
          // let the user know that the record has been added
          if($result){
            echo "<p>Data added successfully.</p>";
            echo "<a href='view.php'>View Result</a>";
          }
               
        }
      }
    ?>
    </main>
  </body>
</html>

<?php


include 'classes/Library.php';


session_start();

$admin2 = new Admin();

$message = '';

#The isset() function checks whether a variable is set, which means that it has to be declared and is not NULL.

if(isset($_POST['Login'])){

    $result = $admin2->admin_login($_POST['username'],$_POST['password']);

    if($result === true){

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        header('Location: Admin/home.php');
        

    }else{

        $message = '<div class="alert alert-danger">Incorrect Data !! pls check again</button>

        </div>';

    }
}




?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>LMS SYSTEM!</title>
  </head>
  <body>

  <?php include 'include/navbar.php';  
  
  if(!isset($_SESSION['username'])){
  
  
  ?>

  <div class="container mt-5">

        <h1 class="text-center text-warning display-5">Admin Login</h1>
      
      <form method="POST" role="form" class="needs-validation"  id="product_form"  novalidate>

      <?php echo $message; ?>

        
        <label>User Name</label>
        <input type="text" class="form-control" name="username" required>
        <div class="invalid-feedback">Please fill out the username.</div> 
        <br/>
        <label>Password</label>
        <input type="password" class="form-control" name="password" required>
        <div class="invalid-feedback">Please fill out the password.</div> 
        <br/>
        
        username :: hash_idf_326  Password :: 1234567890

        <br/><br/>

        <input type="submit" name="Login" value="Login" class="btn btn-success mt-5">
          
      </form>

   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script>
 // Example starter JavaScript for disabling form submissions if there are invalid fields
     (() => {
       'use strict';

       // Fetch all the forms we want to apply custom Bootstrap validation styles to
       const forms = document.querySelectorAll('.needs-validation');

       // Loop over them and prevent submission
       Array.prototype.slice.call(forms).forEach((form) => {
         form.addEventListener('submit', (event) => {
           if (!form.checkValidity()) {
             event.preventDefault();
             event.stopPropagation();
           }
           form.classList.add('was-validated');
         }, false);
       });
     })();


   </script>
  </body>
</html>

<?php


    }

    ?>

<?php   include 'include/footer.php';       ?>
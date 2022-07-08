
<?php

include 'classes/Library.php';

session_start();

# A session is a way to store information (in variables) to be used across multiple pages.

$user_log = new User();

$message = '';

if(isset($_POST['Login'])){

    $result = $user_log->user_login($_POST['Name'],$_POST['Pwd']);

    if($result === TRUE){
         
        $_SESSION['Name'] = $_POST['Name'];
        $_SESSION['Pwd'] = $_POST['Pwd'];
        header('Location: User/home.php');
        

    }else{

        $message = '<div class="alert alert-danger">Incorrect Data !! pls check again</button>

        </div>';

    }
   
}

?>

<?php

include 'include/navbar.php';

if(!isset($_SESSION['Name'])){

?>

<div class="container mt-5">

        <h1 class="text-center text-warning display-5">User Login</h1>
      <?php echo $message; ?>
      <form method="POST" role="form" class="needs-validation"  id="product_form"  novalidate>

    

        
      <div class="mb-3 row mt-5">
    <label for="staticEmail" class="col-sm-2 col-form-label">UserName</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" name="Name" required>
      <div class="invalid-feedback">Please fill out the Name.</div> 
    </div>
  </div>
      
  <div class="mb-3 row mt-5">
    <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password"  class="form-control" name="Pwd" required>
      <div class="invalid-feedback">Please fill out the Password.</div> 
    </div>
  </div>   
       
      

        <center><input type="submit" name="Login" value="Login" class="btn btn-success mt-5"></center>
          
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
















<?php

include 'include/footer.php';

    }

?>
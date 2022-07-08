
<?php include 'include/navbar.php';  

include 'classes/Library.php';

$message = '';

if(isset($_POST['register'])){

$user = new User();

$user->name = $_POST['Name'];

$user->email = $_POST['Email'];

$user->age = $_POST['Age'];

$user->pwd = $_POST['Pwd'];

$user->Insert_User();

$message='<div class="alert alert-success">A New User is Registered !!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>';



}



?>

<div class="container">
<h1 class="text-center text-danger display-5 mt-5">User Registration</h1>
<?php echo $message; ?>
<form method="POST" role="form" class="needs-validation"  id="product_form"  novalidate>
    


<div class="mb-3 row mt-5">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" name="Name" required>
      <div class="invalid-feedback">Please fill out the Name.</div> 
    </div>
  </div>
<div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" name="Email" required>
        <div class="invalid-feedback">Please fill out the Email.</div> 
    </div>
  </div>


<div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Age</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" name="Age" required>
        <div class="invalid-feedback">Please fill out the Age.</div> 
    </div>
  </div>


<div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" name="Pwd" required>
        <div class="invalid-feedback">Please fill out the password.</div> 
    </div>
  </div>

  <center><input type="submit" name="register" value="Register" class="btn btn-warning"></center>
</form>

</div>


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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<?php   include 'include/footer.php';       ?>
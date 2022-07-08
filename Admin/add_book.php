<?php

include '../classes/Library.php';

include '../include_admin/navbar.php';

$message = '';

if(isset($_POST['save'])){

$admin1 = new Admin();

$admin1->Book_name = $_POST['name'];

$admin1->Book_author = $_POST['author'];

$admin1->Book_category = $_POST['category'];

$admin1->Book_price = $_POST['Price'];

$admin1->add_book();

$message='<div class="alert alert-success">A New Book Added !!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>';


}


if(isset($_SESSION['username'])){




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

  <div class="container mt-5">

        <h1 class="text-center text-warning display-5">Add A Book</h1>
      
      <form method="POST" role="form" class="needs-validation"  id="product_form"  novalidate>

      <?php echo $message;  ?>

        
        <label>Book Name ::</label>
        <input type="text" class="form-control" name="name" required>
        <div class="invalid-feedback">Please fill out the name.</div> 
        <br/>
        <label>Book Author ::</label>
        <input type="text" class="form-control" name="author" required>
        <div class="invalid-feedback">Please fill out the author.</div> 
        <br/>
        <label>Book Category ::</label>
        <input type="text" class="form-control" name="category" required>
        <div class="invalid-feedback">Please fill out the category.</div> 
        <br/>
        <label>Book Price ::</label>
        <input type="number" class="form-control" name="Price" required>
        <div class="invalid-feedback">Please fill out the price.</div> 

        <input type="submit" name="save" value="Insert Book" class="btn btn-success mt-5">
          
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

<?php include '../include_admin/footer.php';  ?>
  </body>
</html>



<?php
}

?>
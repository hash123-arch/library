<?php

include '../classes/Library.php';

include '../include_admin/navbar.php';

$message = '';

if(isset($_POST['save'])){

$author = new Admin();

$author->Book_author = $_POST['Author_name'];

$author->author_status = $_POST['Btn-1'];

$author->add_author();







$message='<div class="alert alert-success">A New Author Added !!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

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

        <h1 class="text-center text-warning display-5">Add A Author</h1>
      
      <form method="POST" role="form" class="needs-validation"  id="product_form"  novalidate>

      <?php echo $message;  ?>

        
        <label>Author Name ::</label>
        <input type="text" class="form-control" name="Author_name" required>
        <div class="invalid-feedback">Please fill out the Author.</div> 
        <br/>
        <label>Status ::</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Btn-1" id="flexRadioDefault1" value="Active" required>
            <label class="form-check-label" for="flexRadioDefault1">
                Active
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="Btn-1" id="flexRadioDefault2" value="Inactive" required>
            <label class="form-check-label" for="flexRadioDefault2">
                Inactive
            </label>
            </div>
        <div class="invalid-feedback">Please Select Status.</div> 
        <br/>
        

        <input type="submit" name="save" value="Insert Author" class="btn btn-success mt-5">
          
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
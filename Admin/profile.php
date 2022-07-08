
<?php

include '../include_admin/navbar.php'; 

include '../classes/Library.php';

$update = new Admin();

$message = '';


if(isset($_POST['Update'])){

  global $conn;

  $result = $conn->query("UPDATE admin SET Admin_Name = '".$_POST['Admin_Name']."' ,  Admin_Pwd = '".$_POST['Admin_Password']."' WHERE  id = '1'");

  if($result === TRUE){

    $message = '<div class="alert alert-success">Details SuccessFully Updated</div>';

  }else{
    $message = '<div class="alert alert-danger">Error Updating !! </div>'.$conn->error;
  }


}

if(isset($_SESSION['username'])){

?>

    <h1 class="text-danger display-5 mt-5 text-center">Admin Profile</h1>
    <div class="container">
        
    <?php echo $message;?>
   
    <form method = "POST">

        <label>Admin Name ::</label>
        <input type="text" class="form-control" name="Admin_Name" value="<?php echo $update->update_pwd_1(); ?>">

        <label>Admin Password ::</label>
        <input type="password" class="form-control" name="Admin_Password" value="<?php echo $update->update_pwd_2(); ?>">

        <input type="submit" name="Update" value="Update Details" class="btn btn-success mt-5">

    </form>

     </div>

<?php  }  
 

?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <?php include '../include_admin/footer.php';  ?>
  </body>
</html>









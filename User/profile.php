
<?php

include '../include_user/navbar.php'; 

include '../classes/Library.php';

$update = new User();

$message = '';


if(isset($_POST['Update'])){

  global $conn;

  $id = $_POST['id'];

  $name = $_POST['Name'];

  $pwd = $_POST['Password'];

  $sql = "UPDATE user SET Name1 = '$name' , Pwd = '$pwd' WHERE id = '$id'";

  $result = $conn->query($sql);

  if($result === TRUE){

    $message = '<div class="alert alert-success">Details SuccessFully Updated</div>';

    

  }else{
    $message = '<div class="alert alert-danger">Error Updating !! </div>'.$conn->error;
  }


}

if(isset($_SESSION['Name'])){

?>

    <h1 class="text-danger display-5 mt-5 text-center">User Profile</h1>
    <div class="container">
        
    
   
    <form method = "POST">

        <input type="hidden" name="id">

        <label>User Name ::</label>
        <input type="text" class="form-control" name="Name" value="<?php echo $update->update_pwd_1($_SESSION['Name']); ?>">

        <label>User Password ::</label>
        <input type="text" class="form-control" name="Password" value="<?php echo $update->update_pwd_2($_SESSION['Pwd']); ?>">

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









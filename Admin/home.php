
<?php

include '../include_admin/navbar.php'; 

include '../classes/Library.php';

$admin3 = new Admin();

if(isset($_SESSION['username'])){

?>

    <h1 class="text-danger display-5 mt-5 text-center">Welcome to Our Dashboard</h1>

    <div class="container mt-5">

    <div class="row">

    <div class="col-lg-4">

    <img src="../img/book.jpeg" alt=""  width="225px" height="225px">

    <h1 class="display-5 text-success text-center mt-3"><?php $admin3->display_book(); ?></h1>
    
    </div>

    <div class="col-lg-4">

    <img src="../img/category.jpeg" alt="">

    <h1 class="display-5 text-warning text-center mt-3"><?php $admin3->display_category(); ?></h1>
    
    </div>

    <div class="col-lg-4">

    <img src="../img/author.png" alt="" width="225px" height="225px">

    <h1 class="display-5 text-primary text-center mt-3"><?php $admin3->display_author(); ?></h1>
    
    </div>

    </div>

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









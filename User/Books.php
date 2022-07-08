
<?php

include '../include_user/navbar.php'; 

include '../classes/Library.php';



# The isset() function checks whether a variable is set, which means that it has to be declared and is not NULL.

# This function returns true if the variable exists and is not NULL, otherwise it returns false.

if(isset($_SESSION['Name'])){

?>

    <h1 class="text-danger display-5 mt-5 text-center">Please see the list of available books !!</h1>

    <div class="container mt-5">

        <div class="row">

            <?php 
            
              $select = new User(); 

              $result = $select->Select_Book_All();

              if($result == TRUE){

                    foreach($result as $row){
                        
                           
            ?>
            
              <div class="col-lg-3 mt-5">

                  <div class="card p-2" style="width: 18rem;">

                     <img src="../img/img5.jpeg" class="card-img-top" alt="...">

                     <div class="card-body">

                        <h5 class="card-title"><?php echo $row['name'];?></h5>

                        <h6 class="card-subtitle mt-2 text-muted">Written By :: <?php echo $row['author'];?></h6>

                        <h6 class="card-subtitle mt-2 text-muted">Type :: <?php echo $row['category'];?></h6>

                        <h6 class="card-subtitle mt-2 text-muted">Price :: <?php echo $row['price'];?>.00 US$</h6>

                        <p class="card-text mt-2">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    
                     </div>
                    
                  </div>

              </div>
              
              <?php  

       }  
  }

}

?> 
        </div>

                    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <?php include '../include_admin/footer.php';  ?>
  </body>
</html>









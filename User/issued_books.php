<?php

include '../include_user/navbar.php'; 

include '../classes/Library.php';

$message = '';

# The isset() function checks whether a variable is set, which means that it has to be declared and is not NULL.

# This function returns true if the variable exists and is not NULL, otherwise it returns false.

if(isset($_POST['return'])){

    global $conn;

    $del_id = $_POST['id'];

    $sql = "DELETE FROM issue_book WHERE BOOK_ID = '$del_id'";

    $result = $conn->query($sql);

    if($result == TRUE){

        $message = '<div class="alert alert-success">A Book is SuccessFully Returned</div>';

    }else{

        $message = '<div class="alert alert-danger">Error !! </div>'.$conn->error;

    }

    global $conn;

    $name = $_POST['name'];

    $sql1 = "UPDATE book set status = 'Available' WHERE name = '$name' ";

    $result = $conn->query($sql1);



}

if(isset($_SESSION['Name'])){

?>

    <h1 class="text-danger display-5 mt-5 text-center">Here are your Books <?php echo $_SESSION['Name'];?></h1>

    <div class="container mt-5">
    <?php echo $message;?>
    <div class="row">

    <div class="col-md-12">

        <div class="card-header">
            <h4 class="display-5 text-danger">View Issued Book List</h4>
        </div>

    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-success table-striped">
             <thead>
                <tr>
                   <th>Book ID</th>
                   <th>Book Name</th>
                   <th>Issued User Name</th>
                   <th>Return Book</th>
                  
                </tr>
             </thead>

             <tbody>
                  <?php

                            $select_issued_book = new User();
                            
                            $result = $select_issued_book->specific_user($_SESSION['Name']);

                            if($result == true){
                                
                                foreach($result as $row){

                                    
                                 ?> <tr>
                                    
                                    
                                    <td><?= $row['Book_ID'] ?></td>
                                    <td><?= $row['Book_Name'] ?></td>
                                    <td><?= $row['Issued_username'] ?></td>
                                    <td><button type="button" class="btn btn-warning return-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Return Book</button></td>

                                        <!-- modal -->

                                        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure You Want to return a Book ? </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST">
                                                <input type="hidden" name="id" id="id">
                                                <input type="hidden" name="name" id="name">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    <button type="submit" name="return" class="btn btn-primary">Yes</button>
                                                </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                </tr>

                                <?php
                                }         
                                }     
                                
                            
                            ?>

                            
                   
             </tbody>
        </table>
</div>
</div>
</div>
</div>
    </div>
               

<?php  

}

                              

                        


?> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    $(document).ready(function(){

        $('.return-btn').on('click',function(){

            var tr = $(this).closest('tr');

            var data = tr.children('td').map(function(){

            return $(this).text();

            }).get();

            $('#id').val(data[0]);
            
            $('#name').val(data[1]);
        });

    });
</script>   
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <?php include '../include_admin/footer.php';  ?>
  </body>
</html>

<?php

include '../classes/Library.php';

include '../include_admin/navbar.php';

$message1 = '';

if(isset($_POST['delete'])){

    global $conn;

    $del_id = $_POST['del_id'];

    $sql = "DELETE FROM category WHERE ID = '$del_id'";

    $result = $conn->query($sql);

    if($result == TRUE){

        $message1 = '<div class="alert alert-success">An Category is SuccessFully Deleted</div>';

    }else{

        $message1 = '<div class="alert alert-danger">Error Deleting !! </div>'.$conn->error;

    }


}

?>






<div class="container mt-4">

<?php echo $message1;?>

    <div class="row">

        <div class="col-md-12">

            <div class="card-header">
                <h4 class="display-5 text-danger">View List of Book Categories</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-success table-striped">
                     <thead>
                        <tr>
                           <th>Category ID</th>
                           <th>Category Name</th>
                           <th>Category Status</th>
                           <th>Date Created</th>
                           <th>Delete Category</th>
                        </tr>
                     </thead>

                     <tbody>
                        <?php

                            $Category = new Admin();
                            
                            $result = $Category->Select_Category();

                            if($result == true){
                                
                                foreach($result as $row){

                                    $status = '';
                                    
                                    

                                    if($row['status'] == 'Active'){
                                                
                                        $status = '<span class="badge bg-success">Active</span>';

                                    
                                    }else if($row['status'] == 'Inactive'){

                                        $status = '<span class="badge bg-danger">Inactive</span>';

                                    }
                                 ?> <tr>
                                    
                                    
                                    <td><?= $row['ID'] ?></td>
                                    <td><?= $row['category_name'] ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    
                                    <!-- Button trigger modal -->
                                    
                                        <!-- button trigger model -->

                                        <td><button type="button" class="btn btn-warning delete-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Delete</button></td>

                                        <!-- modal -->

                                        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure You Want to Delete a Book ? </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST">
                                                <input type="hidden" name="del_id" id="del_id">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    <button type="submit" name="delete" class="btn btn-primary">Yes</button>
                                                </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                        <!-- button trigger model -->
                                        
                                        
                                       

                                            
                                            
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</div>

<script>
    $(document).ready(function(){

        $('.delete-btn').on('click',function(){

            var tr = $(this).closest('tr');

            var data = tr.children('td').map(function(){

            return $(this).text();

            }).get();

            $('#del_id').val(data[0]);
            

        });

    });
</script>


<script>
    

        
    
</script>







<?php include '../include_admin/footer.php';  ?>
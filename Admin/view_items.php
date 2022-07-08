<?php

include '../classes/Library.php';

include '../include_admin/navbar.php';

$message = '';

$message1 = '';

$message2 = '';



if(isset($_POST['update'])){

    global $conn;

    $id = $_POST['id'];

    $name = $_POST['name'];

    $author = $_POST['author'];

    $category = $_POST['category'];

    $price = $_POST['Price'];

    $sql = "UPDATE book SET name = '$name' , author = '$author' , category = '$category' , price = '$price' WHERE ID = '$id' ";

    $result = $conn->query($sql);

    if($result == TRUE){

        $message = '<div class="alert alert-success">Details SuccessFully Updated</div>';

    }else{

        $message = '<div class="alert alert-danger">Error Updating !! </div>'.$conn->error;

    }



}

if(isset($_POST['delete'])){

    global $conn;

    $del_id = $_POST['del_id'];

    $sql = "DELETE FROM book WHERE ID = '$del_id'";

    $result = $conn->query($sql);

    if($result == TRUE){

        $message1 = '<div class="alert alert-success">A Book is SuccessFully Deleted</div>';

    }else{

        $message1 = '<div class="alert alert-danger">Error Deleting !! </div>'.$conn->error;

    }


}

if(isset($_POST['Issue'])){

    $issue = new Admin();

    $issue->Book_name = $_POST['name1'];

    $issue->name = $_POST['Select_User'];

    $issue->Issue_Book();

    $message2='<div class="alert alert-success">A Book is issued to a user !!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>';

    global $conn;

    $name = $_POST['name1'];

    $sql = "UPDATE book SET status = 'Unavailable' WHERE name = '$name' ";

    $result = $conn->query($sql);

}

   
                                                
 



?>






<div class="container mt-4">

<?php echo $message; ?>

<?php echo $message1; ?>

<?php echo $message2; ?>



<span id="message"></span>

    <div class="row">

        <div class="col-md-12">

            <div class="card-header">
                <h4 class="display-5 text-danger">View Book List</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-success table-striped">
                     <thead>
                        <tr>
                           <th>Book ID</th>
                           <th>Book Name</th>
                           <th>Book Author</th>
                           <th>Book Category</th>
                           <th>Book Price</th>
                           <th>Update Book</th>
                           <th>Delete Book</th>
                           <th>Issue Book</th>
                           <th>Book Status</th> 
                        </tr>
                     </thead>

                     <tbody>
                        <?php

                            $select = new Admin();
                            
                            $result = $select->Select_Book_All();

                            if($result == true){
                                
                                foreach($result as $row){

                                    $status = '';
                                    
                                    $table = '';

                                    if($row['status'] == 'Available'){
                                                
                                        $status = '<span class="badge bg-success">Available</span>';

                                        $table .= '<td><button type="button" class="btn btn-primary issue-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">Issue Book</button></td>';
                                    
                                    }else if($row['status'] == 'Unavailable'){

                                        $status = '<span class="badge bg-danger">Unavailable</span>';

                                        $table .= '<td><button type="button" class="btn btn-danger issue-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop3" disabled>Book Issued</button></td>';
                                    }
                                 ?> <tr>
                                    
                                    
                                    <td><?= $row['ID'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['author'] ?></td>
                                    <td><?= $row['category'] ?></td>
                                    <td><?= $row['price'] ?>.00 US$</td>
                                    
                                    <!-- Button trigger modal -->
                                    <td><button type="button" class="btn btn-success edit-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</button></td>
                                    
                                    <!-- Modal -->

                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Update Data</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <form method="POST">
                                                
                                            

                                            <div class="modal-body">

                                            <input type="hidden" name="id" id="id">
                                            
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Book Name">
                                            
                                            <br/>
                                            
                                            <input type="text" class="form-control" id="author" name="author" placeholder="Book Author">
                                            
                                            <br/>
                                            
                                            <input type="text" class="form-control" id="category" name="category" placeholder="Book Category">
                                            
                                            <br/>
                                            
                                            <input type="text" class="form-control" id="price" name="Price" placeholder="Book Price">
                                            
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="update">Update Data</button>
                                            </div>
                                            </div>
                                            </form>
                                        </div>
                                        </div>

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
                                        
                                        
                                        <?php echo $table;?>
                                        
                                          <!-- modal -->

                                        <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">To Which User Do you want to Issue the Book ? </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST">
                                                   <input type="hidden" name="id" id="id">
                                            
                                                   <input type="text" readonly class="form-control-plaintext display-5 text-left text-success" id="name1" name="name1" placeholder="Book Name">
                                                   
                                                   
                                                 
                                                   <select name="Select_User" id="Select_User" class="form-select mt-3">
                                                   <?php

                                                        $select_user  = new Admin();

                                                        $result = $select_user->select_user();

                                                        if($result == TRUE){
                                                            

                                                            foreach ($result as $row) {



                                                                
                                                            


                                                   
                                                   ?>

                                                   
                                                    
                                                        <option><?php echo $row['Name1']; }} ?></option>
                                                    </select>
                                                    
                                                    
                                                    
                                                   
                                                           
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Do Not Issue</button>
                                                    <button type="submit" name="Issue" class="btn btn-primary issue">Issue Book</button>
                                                </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                            
                                             <td><?php echo $status; ?></td>
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
    $(document).ready(function(){

        $('.edit-btn').on('click',function(){

            //The closest() method returns the first ancestor of the selected element. first ancestor - first grandparent

            var tr = $(this).closest('tr');

            // creates a new array from calling a function for every array element.

            var data = tr.children('td').map(function(){

                return $(this).text();

            }).get();

            //The get() method gets the value of a key in a Map:

            console.log(data);

            $('#id').val(data[0]);

            $('#name').val(data[1]);

            $('#author').val(data[2]);

            $('#category').val(data[3]);

            $('#price').val(data[4]);



        })

    })
</script>


<script>
    $(document).ready(function(){

        $('.issue-btn').on('click',function(){

            //The closest() method returns the first ancestor of the selected element. first ancestor - first grandparent

            var tr = $(this).closest('tr');

            // creates a new array from calling a function for every array element.

            var data = tr.children('td').map(function(){

                return $(this).text();

            }).get();

            //The get() method gets the value of a key in a Map:

            console.log(data);

            $('#id').val(data[0]);

            $('#name1').val(data[1]);

            



        });

    });
</script>


<script>
    

        
    
</script>







<?php include '../include_admin/footer.php';  ?>
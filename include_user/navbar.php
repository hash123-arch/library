
<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand display-5 text-warning" href="../User/home.php">Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../User/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../User/Books.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../User/issued_books.php">Issued Books</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $_SESSION['Name']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <center><li><a class="dropdown-item" href="../User/profile.php">View Profile</a></li>
            <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Logout
            </button></center>
         
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are You Sure You Want to Logout ? </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="../user_logout.php" method="POST">
        <button type="submit" name="logout_btn" class="btn btn-primary">Yes</button>
       </form>
      </div>
    </div>
  </div>
</div>

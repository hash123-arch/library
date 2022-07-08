<?php

$server = 'localhost';

$username = 'root';

$password = '';

$database = 'library';

$conn = new mysqli($server,$username,$password,$database);


abstract class Library{

    private $Book_name;

    private $Book_author;

    private $Book_category;

    private $Book_price;

    private $author_status;

    private $category_status;

    private $id;

    private $name;

    private $email;

    private $age;

    private $pwd;

    abstract public function Select_Book_All();

    
   

    public function __set($property,$value){

        if (property_exists($this, $property)) {

            $this->$property = $value;

        }
  
          return $this;

    }

    public function __get($property){

        if (property_exists($this, $property)) {

            return $this->$property;


        }

    }



}

class Admin extends Library{


    public function add_book(){

        global $conn;

        $sql = "INSERT INTO book(name,author,category,price)VALUES('".$this->Book_name."','".$this->Book_author."', 
        
        '".$this->Book_category."','".$this->Book_price."')";

        $conn->query($sql);


    }

    public function add_author(){

        

        global $conn;

        $sql = "INSERT INTO author(author,status)VALUES('".$this->Book_author."','".$this->author_status."')";

        $conn->query($sql);
        

    }

    public function add_category(){

        

        global $conn;

        $sql = "INSERT INTO category(category_name,status)VALUES('".$this->Book_category."','".$this->category_status."')";

        $conn->query($sql);
        

    }

    public function admin_login($username,$password){

      

        global $conn;

        $result = $conn->query("SELECT * FROM admin WHERE Admin_Name = '$username'");

        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0){

            if($password == $row['Admin_Pwd']){

                $this->id = $row['id'];

                return true;

            }else{

                return false;

            }

        }else{

            return false;
        }

    }

    

    public function update_pwd_1(){

 

        global $conn;

        $result1 = $conn->query("SELECT * FROM admin");

        

        foreach($result1 as $key){

            echo $key['Admin_Name'];
        }


        
    }

    public function update_pwd_2(){

 

        global $conn;

        $result1 = $conn->query("SELECT * FROM admin");

        

        foreach($result1 as $key){

            echo $key['Admin_Pwd'];
        }


        
    }


    public function display_book(){

        #The mysqli_num_rows() function returns the number of rows in a result set.

        global $conn;

        $count = 0;

        $result = $conn->query("SELECT * FROM book");

        $count = mysqli_num_rows($result);

        echo $count;



    }

    public function display_category(){

        #The mysqli_num_rows() function returns the number of rows in a result set.

        global $conn;

        $count = 0;

        $result = $conn->query("SELECT * FROM category");

        $count = mysqli_num_rows($result);

        echo $count;



    }

    public function display_author(){

        #The mysqli_num_rows() function returns the number of rows in a result set.

        global $conn;

        $count = 0;

        $result = $conn->query("SELECT * FROM author");

        $count = mysqli_num_rows($result);

        echo $count;



    }

    public function Select_Book_All(){

        global $conn;

        $Sql = "SELECT * FROM book ORDER BY ID ASC";

        #The query() / mysqli_query() function performs a query against a database.

        $result = $conn->query($Sql);

        if($result->num_rows > 0){

            return $result;

        }else{

            return false;
            
        }



    }

    public function Select_Category(){

        global $conn;

        $Sql = "SELECT * FROM category ORDER BY ID ASC";

        #The query() / mysqli_query() function performs a query against a database.

        $result = $conn->query($Sql);

        if($result->num_rows > 0){

            return $result;

        }else{

            return false;
            
        }



    }

    public function Select_Author(){

        global $conn;

        $Sql = "SELECT * FROM author ORDER BY ID ASC";

        #The query() / mysqli_query() function performs a query against a database.

        $result = $conn->query($Sql);

        if($result->num_rows > 0){

            return $result;

        }else{

            return false;
            
        }



    }

    public function select_user(){

        global $conn;

        $SQL = "SELECT Name1 FROM user";

        $result = $conn->query($SQL);

        if($result->num_rows > 0){

            return $result;

        }else{

            return false;

        }

    }


    public function Issue_Book(){

        global $conn;

        $query = "INSERT INTO issue_book (Book_Name,Issued_username) VALUES ('".$this->Book_name."','".$this->name."')";

        $conn->query($query);

    }

    

}


class User extends Library{

    public function Insert_User(){

        global $conn;

        $query = "INSERT INTO user(Name,Email,Age,Pwd) VALUES ('".$this->name."','".$this->email."','".$this->age."','".$this->pwd."')";

        $conn->query($query);

    }

    public function Select_Book_All(){

        global $conn;

        $Sql = "SELECT * FROM book ORDER BY ID ASC";

        #The query() / mysqli_query() function performs a query against a database.

        $result = $conn->query($Sql);

        if($result->num_rows > 0){

            return $result;

        }else{

            return false;
            
        }



    }

    

    public function user_login($u_Name,$Pwd){

        global $conn;

        $Sql = "SELECT * FROM user WHERE Name1 = '$u_Name' AND Pwd = '$Pwd'";

        $result = $conn->query($Sql);

        # The fetch_assoc() / mysqli_fetch_assoc() function fetches a result row as an associative array.

        $row = $result->fetch_assoc();

        if(mysqli_num_rows($result) > 0){

            $Pwd = $row['Pwd'];

            return true;

        }else{
            return false;
        }



    }

    public function specific_user($user_issue_name){

        global $conn;

        $sql = "SELECT * FROM issue_book WHERE Issued_username = '$user_issue_name'";

        $result = $conn->query($sql);

        if($result->num_rows > 0){

            return $result;

        }else{

            return false;
            
        }


    }

    

    

    public function update_pwd_1($Name){

 

        global $conn;

        $result1 = $conn->query("SELECT * FROM user WHERE Name1 = '$Name'");

        

        foreach($result1 as $key){

            echo $key['Name1'];
        }


        
    }

    public function update_pwd_2($Password){

 

        global $conn;

        $result1 = $conn->query("SELECT * FROM user WHERE Pwd = '$Password'");

        

        foreach($result1 as $key){

            echo $key['Pwd'];
        }


        
    }

}



?>
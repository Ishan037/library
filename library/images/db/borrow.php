<?php 
session_start(); 
  include('connect.php');
   if(isset($_POST['submit'])){
       $username = $_POST['username'];
       $name = $_POST['borrow'];
       $book = $_POST['name'];
       $bookquery = "SELECT * FROM book WHERE name=$book";
       $result  = mysqli_query($conn, $bookquery);
       $row = mysqli_num_rows($result) ;
       $book_id = mysqli_fetch_assoc($result)['id'];
       $userquery = "SELECT * FROM users WHERE username=$username";
       $userresult  = mysqli_query($conn, $userquery);
       $user_id = mysqli_fetch_assoc($result)['id'];
      
        if($name==''){
            $msg = "return date is required";
            header('Location:../borrow.php?errmsg='.$msg);
        }        
        if($row==0){
            $msg = "book not found";
            header('Location:../borrow.php?errmsg='.$msg);
        }
        else{
           

        
        $query = "INSERT INTO borrow(user_id,book_id,returndate ) VALUES('$user_id','$book_id','$name')";
        if(mysqli_query($conn,$query)){
            $msg = "Book Inserted";
            header('Location:../user.php?msg='.$msg);
        }else{
            $msg = "Error: ".mysqli_error($conn);
            header("Location:../borrow.php?errmsg=".$msg);
        }}
    }else{
        $msg = "data is not acceptable";
        header("Location:../borrow.php?errmsg=".$msg);
     } 
?>
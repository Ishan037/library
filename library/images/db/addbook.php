<?php 
  include('connect.php');
   if(isset($_POST['submit'])){
       $genre = $_POST['genre'];
       $name = $_POST['bookname'];
       $author = $_POST['author'];
     if($name==''){
         $msg = "name is required";
         header('Location:../addbook.php?errmsg='.$msg);
     }        
     if($genre==''){
         $msg = "genre is required";
         header('Location:../addbook.php?errmsg='.$msg);
     }

     if($author==''){
         $msg = "author is required";
         header('Location:../addbook.php?errmsg='.$msg);
     }
     $query = "INSERT INTO book(name,author,genre) VALUES('$name','$author','$genre')";
     if(mysqli_query($conn,$query)){
         $msg = "Signup successfully";
         header('Location:../book.php?msg='.$msg);
     }else{
         $msg = "Error: ".mysqli_error($conn);
         header("Location:../addbook.php?errmsg=".$msg);
     }
   }else{
       $msg = "data is not acceptable";
       header("Location:../addbook.php?errmsg=".$msg);
   }
?>
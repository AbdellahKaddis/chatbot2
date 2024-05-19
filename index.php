<?php require_once 'connection.php';
    if(isset($_POST['LogIN'])){
        $UserName=$_POST["UserName"];
        $Password=$_POST["Password"];
   
    if(!empty($UserName) && !empty($Password)){
        $stmt=$connection->prepare("select * from Users where UserName=? and Password=?;");
        $stmt->execute([$UserName,$Password]);
        $data=$stmt->fetch(PDO::FETCH_OBJ);
        if($data === false)
        {
            ?>
            <div class="alert alert-danger" role="alert">
           Wrong password or username!
          </div><?php
        }else{
            header('location:chat.php');
        }
    }
    else
    {
        ?>
        <div class="alert alert-danger" role="alert">
        you didn't fill a required field!
      </div><?php
    }
    }
      

    ?>
<!DOCTYPE html>
<html>



<head>
<link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Ensat : Home</title>
</head>
<?php
include("auth.php");
include("connect.php");
$user= $_SESSION['user'] ;
$sql1 = "SELECT `etat` FROM comptes where user='$user';";
            $result1 = mysqli_query($conn,$sql1);
            while($rows=$result1->fetch_assoc())
                {$etat=$rows['etat'];
}
           
            if($etat == 0){
                $direct = "all_members_user.php";
            }else{
                $direct = "all_members_admin.php";
            }
            ?>


<body>
    <br>
    <div class="center">
    <center><img height="300" width="500" src="ensa tanger.png"></center>
        <div class="d-flex justify-content-center">
        
            <h1 style ="font-size:140px">Welcome <?php echo $_SESSION['user']; ?> !</h1>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <center>
        
            
            <a href="<?php echo $direct; ?>" class="btn btn-primary">All Students</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
      
    </center>
</body>

</html><center>
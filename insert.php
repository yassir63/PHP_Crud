<?php
include('connect.php');
include("auth.php");
if (isset($_POST['button']) && $_POST['button'] == 1){
    $first =$_POST['Prenom'];
    $last = $_POST['Nom'];
    
    $cne = $_POST['CNE'];
    $email = $_POST['email'];
    $adresse = $_POST['Adresse'];
    $ville = $_POST['Ville'];
    $etat=$_POST['etat'];
    $photo = $_FILES['Photo']['name'];
    
    if(!empty($photo)){
        $sql= "INSERT INTO `eleves`(`Prenom`, `Nom`, `CNE`, `email`,`etat`,`Adresse`,`Photo`,`Ville`) VALUES ('$first','$last','$cne','$email','$etat','$adresse','$photo','$ville')";
    }else{
        $photo = "default.png";
        $sql= "INSERT INTO `eleves`(`Prenom`, `Nom`, `CNE`, `email`,`etat`,`Adresse`,`Photo`,`Ville`) VALUES ('$first','$last','$cne','$email','$etat','$adresse','$photo','$ville')";
    }
   
    $result = mysqli_query($conn,$sql);
    if ($result) {
       
            move_uploaded_file($_FILES['Photo']['tmp_name'],$photo);
            header("location:all_members_admin.php");
       
    }
    }
   
    
?>
<!DOCTYPE html>
<html>



<head>
<link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Add Student</title>
</head>

<body>
    <center>
        <br>
        
        <div class="center">
            <!-- <h1 style ="font-size:150px">Add Student</h1> -->
            <img height="300" width="500" src="ensa tanger.png">
</div>
<br>
        <br>
            <a href="index.php" class="btn btn-primary">Home</a>
            <a href="all_members.php" class="btn btn-primary">All Students</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>

       
    </center>

    <br>
    
    <br>
    
    <div class="d-flex justify-content-center">
    <form method="post" enctype="multipart/form-data">
   
    <input type="hidden" name="button" value="1" />
            <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nom</span>
                    <input type="text" name="Nom" class="form-control" placeholder="Nom" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Prenom</span>
                    <input type="text" name="Prenom" class="form-control" placeholder="Prenom" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">CNE</span>
                    <input type="text" name="CNE" class="form-control" placeholder="CNE" required>
                </div>
               
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Adresse</span>
                    <input type="text" name="Adresse" class="form-control" placeholder="Adresse" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Ville</span>
                    <input type="text" name="Ville" class="form-control" placeholder="Ville" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Photo</span>
                            <input type="file" name="Photo" class="form-control">
                        </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Etat</span>
                    <input type="number" name="etat" class="form-control" placeholder="Etat" required>
                </div>
                <center><input class="btn btn-primary" type="submit" value="Submit"></center>
    </form>
    <center>
        
        
   
    </center>
</body>

</html>
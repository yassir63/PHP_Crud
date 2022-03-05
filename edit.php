<?php
include('connect.php');
include("auth.php");
$id = $_GET['ID_eleve'];
$sql = "SELECT * from eleves where ID_eleve='" . $id . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>


<head>
<link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Ensat : Modify</title>
</head>

<body>
    
        <?php
        if (isset($_POST['button']) && $_POST['button'] == 1) {
            $cne = $_POST['CNE'];
            $nom = $_POST['Nom'];
            $prenom = $_POST['Prenom'];
            $adresse = $_POST['Adresse'];
            $ville = $_POST['Ville'];
            $photo = $_FILES['Photo']['name'];
            $email = $_POST['email'];
            $etat = $_POST['etat'];
            if(!empty($photo)){
                $sql = "update eleves set CNE='$cne', Nom='$nom',Prenom='$prenom', Adresse='$adresse',Ville='$ville',email='$email',Photo='$photo',etat='$etat' where ID_eleve='$id'";
            }else{
                $sql = "update eleves set CNE='$cne', Nom='$nom',Prenom='$prenom', Adresse='$adresse',Ville='$ville',email='$email',etat='$etat' where ID_eleve='$id'";
            }
            
            $result = mysqli_query($conn, $sql);
            if ($result) {
                
                    move_uploaded_file($_FILES['Photo']['tmp_name'],$photo);
                    header("location:all_members_admin.php");
             
            }
        } else {
        ?>
             
        
                    <!-- <h1 style ="font-size:150px">Modify Student</h1> -->
                    <img height="300" width="500" src="ensa tanger.png">
            <center>
                <br>
                <br>
        
                    <a href="index.php" class="btn btn-primary">Home</a>
                    <a href="all_members_admin.php" class="btn btn-primary">All Students</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
             
                    <br>
                    <br>
                    <br>

            </center>
            <div class="d-flex justify-content-center">
            <form method="post" enctype="multipart/form-data">
         
                
            <input type="hidden" name="button" value="1" />
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">CNE</span>
                            <input type="text" name="CNE" class="form-control" placeholder="CNE" required value="<?php echo $row['CNE']; ?>">
                        </div>
                      
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Nom</span>
                            <input type="text" name="Nom" class="form-control" placeholder="Nom" required value="<?php echo $row['Nom']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Prenom</span>
                            <input type="text" name="Prenom" class="form-control" placeholder="Prenom" required value="<?php echo $row['Prenom']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Adresse</span>
                            <input type="text" name="Adresse" class="form-control" placeholder="Adresse" required value="<?php echo $row['Adresse']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Ville</span>
                            <input type="text" name="Ville" class="form-control" placeholder="Ville" required value="<?php echo $row['Ville']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input type="email" name="email" class="form-control" placeholder="Email" required value="<?php echo $row['email']; ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Photo</span>
                            <input type="file" name="Photo" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Etat</span>
                            <input type="number" name="etat" class="form-control" placeholder="Etat" required value="<?php echo $row['etat']; ?>">
                        </div>
                        <center>
                <input name="submit" class="btn btn-primary" type="submit" value="Submit">
            </center>
            </form>
            <?php } ?>
            

    
   
    </div>
</body>

</html>
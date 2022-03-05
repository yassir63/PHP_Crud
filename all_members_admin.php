<?php
include('connect.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <title>Ensat : All Students</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    
    <div class="center">
        <center>
        <br>
    <br>
    <br>
            <h1 >All Students</h1>
    </div>
    <br>
    <br>
    <center>
       
            <a href="index.php" class="btn btn-primary">Home</a>
            <a href="insert.php" class="btn btn-primary">Add Student</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>

    </center>
    <br>
    <br>
    <br>
    <table >
        <thead>
            <tr>
                <th scope="col">CNE</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Adresse</th>
                <th scope="col">Ville</th>
                <th scope="col">Email</th>
                <th scope="col">Photo</th>
                <th scope="col">Etat</th>
                <th scope="col"> Operations</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "Select * FROM eleves ;";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row["CNE"]; ?></td>
                    <td><?php echo $row["Nom"]; ?></td>
                    <td><?php echo $row["Prenom"]; ?></td>
                    <td><?php echo $row["Adresse"]; ?></td>
                    <td><?php echo $row["Ville"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><img src="<?php echo $row['Photo']; ?>" height="200" width="200"></td>
                    <td><?php echo $row["etat"]; ?></td>
                    <td><a href="edit.php?ID_eleve=<?php echo $row["ID_eleve"]; ?>" class="btn btn-primary">Update</a>
                    <a href="delete.php?ID_eleve=<?php echo $row["ID_eleve"]; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php 
            } ?>
        </tbody>
    </table>
    </center>
</body>

</html>
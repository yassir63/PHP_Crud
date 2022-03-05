<!DOCTYPE html>
<html>



<head>
<link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign Up !</title>
</head>

<body>
    <?php
    include('connect.php');
    if (isset($_REQUEST['user'])) {
        $username = stripslashes($_REQUEST['user']);
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['passwd']);
        $password = mysqli_real_escape_string($conn, $password);
        $password = md5($password);
        $sql = "INSERT into comptes (user, passwd) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
        header("Location: login.php");
        }
    } else {
    ?>
        <center>
        <br>
        <br>
            <br>
            <!-- <h1 style ="font-size:150px">Sign Up</h1> -->
            <img height="300" width="500" src="ensa tanger.png">
        </center>
        <br>
        <br>
        <br>
        <br>
        <div class="center">
            <div class="d-flex justify-content-center">
                    <form name="registration" method="post">
                        <center>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                                <input type="text" class="form-control" name="user" placeholder="Username" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                                <input type="password" class="form-control" name="passwd" placeholder="Password" required><br>
                            </div>
                            <input class="btn btn-primary" type="submit" name="submit" value="Register">
                        </center>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>
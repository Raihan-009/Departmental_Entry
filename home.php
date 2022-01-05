<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>My Department</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Department</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/Departmental_Info/home.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/Departmental_Info/home.php">Refresh</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pword = $_POST['pass'];
        
        if (!empty ($email) && !empty ($pword))
        {
            $server_name = "localhost";
            $username = "root";
            $password = "";
            $database = "Department";
            
            $conn = mysqli_connect($server_name, $username, $password, $database);
            
            if (!$conn)
            {
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                <strong>Error!</strong> Something went wrong :(
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            else
            {
                $sql = "INSERT INTO `students` (`name`, `email`, `password`) VALUES ('$name', '$email', '$pword')";
                $result = mysqli_query($conn, $sql);

                if ($result)
                {
                    echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <strong>Success!</strong> Your entry has submitted successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>Error!</strong> Something went wrong :(
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
        } 
        else
        {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
            <strong>Invalid Input!</strong> Please submit your email and password carefully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }

    }
?>


    <div class="container mt-3">
        <div class="half-part">
            <img src="login.jpeg" alt="">
        </div>
        <div class="half-part">
            <h3 class = "center_text">Welcome Back!</h3>
            <form action = "/Departmental_Info/home.php" method = "post">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name = "name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name = "email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name = "pass">
                </div>
                <button class ="submit-button" type="submit">Submit</button>
            </form>
            <div class="stay_connect">
                <h4>Stay connected with us</h4>
                <i class="fab fa-facebook iconn"></i>
                <i class="fab fa-instagram-square iconn"></i>
                <i class="fab fa-linkedin iconn"></i>
            </div>
        </div>
    </div>
  </body>
</html>


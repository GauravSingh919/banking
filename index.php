<?php
include_once('./php/connection.php');
session_start();

if (isset($_SESSION['auth_active']) && $_SESSION['auth_active'] == 1) {
    if (isset($_SESSION['auth_personnel']) && $_SESSION['auth_personnel'] == "user") {
        header("location:./transactions.php");
    } else {
        header("location:./logout.php");
    }
}

if (isset($_POST["user_login"])) {
    $email = isset($_POST["user_email"]) ? $_POST["user_email"] : "";
    $password = isset($_POST["user_pass"]) ? md5($_POST["user_pass"]) : "";
    $user_login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND is_deleted = 0 LIMIT 1";
    $user_login_query_request = mysqli_query($db_connection, $user_login_query);
    $user_login_query_data_array = mysqli_fetch_array($user_login_query_request);
    if ($user_login_query_data_array != NULL) {
        $_SESSION['auth_active'] = 1;
        $_SESSION['auth_personnel'] = 'user';
        $_SESSION['user_details'] = array(
            "user_id" => $user_login_query_data_array["user_id"],
            "user_name" => $user_login_query_data_array["name"],
            "user_email" => $user_login_query_data_array["email"],
            "account_created" => $user_login_query_data_array["created_at"]
        );
        header("location:./transactions.php");
        die();
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Banking System</title>
    <link rel="icon" type="image/x-icon" href="./images/b.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Customer Login</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Header-->
    <header class="bg-dark py-5" id="main-header">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder"> Banking Transaction System </h1>
            </div>
        </div>
    </header>
    <!--User Login-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card-header">
                        <div class="card-title text-center w-100 p-3 fw-bold">Login</div>
                    </div>
                    <form action="" method="POST">
                        <div class="mb-5">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="user_email" required>
                            <div class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Password</label>
                            <input type="password" name="user_pass" class="form-control" required>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-primary btn-flat" name="user_login"
                                role="button">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>
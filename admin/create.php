<?php
include_once('../php/connection.php');
session_start();

function generateUniqueRandom()
{
    $timestamp = microtime(true);
    $timestampStr = str_replace('.', '', (string) $timestamp);
    $randomNum = str_pad(mt_rand(0, 9999999999), 12, '0', STR_PAD_LEFT);
    $uniqueValue = substr($timestampStr . $randomNum, 0, 12);
    return $uniqueValue;
}

$new_account_no = generateUniqueRandom();

if (!(isset($_SESSION['auth_active']))) {
    header("location:../logout.php");
}

if (isset($_SESSION['auth_active']) && $_SESSION['auth_active'] == 1) {
    if (!(isset($_SESSION['auth_personnel']))) {
        header("location:../logout.php");
    }

    if (isset($_POST['create_account'])) {
        $user_account_no = $_POST['account_no'];
        $initial_balance = isset($_POST['initial_balance']) ? $_POST['initial_balance'] : 1;
        $user_name = $_POST['user_firstname'] . " " . $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $password = md5(strtolower($_POST['user_firstname']));
        $transaction_query = "INSERT INTO `users` (`account_no`, `balance`, `name`, `email`, `password`) VALUES ('$user_account_no', $initial_balance, '$user_name', '$user_email', '$password')";
        $transaction_query_request = mysqli_query($db_connection, $transaction_query);
        if ($transaction_query_request) {
            echo '<script type="text/javascript">alert("Account created.")</script>';
        } else {
            echo '<script type="text/javascript">alert("Something went wrong.")</script>';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Banking System</title>
    <link rel="icon" type="image/x-icon" href="../images/b.png">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary " data-bs-theme="dark">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Create a Customer Profile</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="manage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Create Customer Account</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Bankers Account
                        </a>
                        <ul class="dropdown-menu">

                    </li>
                    <li>
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Account Create-->
    <section class="content text-dark">
        <div class="container-sm p-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create New Account</h3>
                </div>
                <form method="post" action="">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="form-group col-sm-3">
                                <label class="control-label">Account Number</label>
                                <input type="text" class="form-control col-sm-6" required readonly name="account_no"
                                    value="<?= $new_account_no ?>">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <label class="control-label">First Name</label>
                                    <input type="text" class="form-control" name="user_firstname" value="" required="">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" class="form-control" name="user_lastname" value="" required="">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group col-sm-3">
                                <label class="control-label">Email</label>
                                <input type="text" class="form-control col-sm-6" name="user_email" value="" required="">
                            </div>
                            <div class="form-group col-sm-2">
                                <label class="control-label">Initial Balance</label>
                                <input type="number" step="any" min="1" class="form-control col-sm-6 text-right"
                                    name="initial_balance" value="1" required="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex w-100">
                            <button type="submit" name="create_account" class="btn btn-primary mr-2">Save</button>
                            <a href="manage.php" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!--Javascript cdn-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>

</body>

</html>
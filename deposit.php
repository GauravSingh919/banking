<?php
include_once('./php/connection.php');
session_start();

if (!(isset($_SESSION['auth_active']))) {
    header("location:./logout.php");
}

if (isset($_SESSION['auth_active']) && $_SESSION['auth_active'] == 1) {
    if (!(isset($_SESSION['auth_personnel']))) {
        header("location:./logout.php");
    }

    $user_id = $_SESSION['user_details']['user_id'];
    $user_account_query = "SELECT * FROM users WHERE user_id = '$user_id' AND is_deleted = 0 LIMIT 1";
    $user_account_query_request = mysqli_query($db_connection, $user_account_query);
    $user_account_query_data_array = mysqli_fetch_array($user_account_query_request);
    if (!$user_account_query_data_array) {
        header("location:./logout.php");
        die();
    }

    $user_balance = intval($user_account_query_data_array['balance']);

    if (isset($_POST['deposit'])) {
        $deposit_amount = isset($_POST['deposit_amount']) ? intval($_POST['deposit_amount']) : 0;
        if ($deposit_amount <= 0) {
            echo '<script type="text/javascript">alert("Invalid Deposit amount.")</script>';
        } else {
            $user_account_no = $user_account_query_data_array['account_no'];
            $transaction_query = "INSERT INTO `transactions` (`user_id`, `type`, `amount`) VALUES ($user_id, 'credit', $deposit_amount)";
            $transaction_query_request = mysqli_query($db_connection, $transaction_query);
            if ($transaction_query_request) {
                $new_balance = $user_balance + $deposit_amount;
                $balance_update_query = "UPDATE `users` SET `balance` = '$new_balance' WHERE `user_id` = '$user_id'";
                $balance_update_query_request = mysqli_query($db_connection, $balance_update_query);
                $user_balance = $new_balance;
                echo '<script type="text/javascript">alert("Deposit successful.")</script>';
            } else {
                echo '<script type="text/javascript">alert("Something went wrong.")</script>';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Banking System</title>
    <link rel="icon" type="image/x-icon" href="./images/b.png">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#!">Account Transaction</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            My Account
                        </a>
                        <ul class="dropdown-menu">
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="content  text-dark">
        <div class="container-sm p-3">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Deposit</h3>
                </div>
                <form method="post" action="">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="form-group">
                                <label class="control-label">Account Number</label>
                                <input type="text" class="form-control col-sm-6" name="account_number"
                                    value="<?= $user_account_query_data_array['account_no'] ?>" readonly=""
                                    autocomplete="off">
                            </div>
                            <div class="form-group">
                                <h4>
                                    <b>Current Balance:
                                        <?= $user_balance ?>
                                    </b>
                                </h4>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label">Deposit Amount</label>
                                <input type="number" step="any" min="1" class="form-control col-sm-6 text-right"
                                    name="deposit_amount" value="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex w-100">
                            <button type="submit" name="deposit" class="btn btn-primary mr-2">Submit</button>
                            <a href="transactions.php" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!--Javascript-->
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
</body>

</html>
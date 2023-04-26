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

    $user_transaction_query = "SELECT * FROM transactions WHERE user_id = '$user_id' AND is_deleted = 0 ORDER by transaction_id DESC";
    $user_transaction_query_request = mysqli_query($db_connection, $user_transaction_query);
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>

    <!-- Navigation-->
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

    <!--Account Transactions-->

    <div class="container-sm p-5 py-3">
        <div class="card">
            <div class="card-body">
                <h3>Account Number:
                    <?= $user_account_query_data_array['account_no']; ?>
                </h3>
                <h3>Current Balance:
                    <?= $user_account_query_data_array['balance'] ?>
                </h3>
            </div>
        </div>
    </div>

    <div class="container-sm p-5 py-3">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header fw-bolder">
                        Withdrawals
                    </div>
                    <div class="card-body">
                        <p>Withdraw funds from your account.</p>
                        <a href="withdraw.php" class="btn btn-primary">Make a Withdrawal</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header fw-bolder">
                        Deposits
                    </div>
                    <div class="card-body">
                        <p>Deposit funds from your account.</p>
                        <a href="deposit.php" class="btn btn-primary">Make a Deposit</a>
                    </div>
                </div>
            </div>
            <div class="p-4 md-6">
                <div class="card">
                    <div class="card-header fw-bolder">
                        Your Recent Transactions
                    </div>
                    <div class="card-body">
                        <table class="table" id="transaction_table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sr_no = 1;
                                while ($row = mysqli_fetch_array($user_transaction_query_request)) {
                                    echo "<tr>
                                        <th scope='row'>" . $sr_no . "</th>
                                        <td>" . $row['transaction_id'] . "</td>
                                        <td class='text-uppercase'>" . $row['type'] . "</td>
                                        <td>" . $row['amount'] . "</td>
                                        <td>" . date('M j, Y, g:i a', strtotime($row['created_at'])) . "</td>
                                    </tr>";
                                    $sr_no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#transaction_table').DataTable();
        });

        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Banking System</title>
    <link rel="icon" type="image/x-icon" href="./images/b.jpg">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-primary " data-bs-theme="dark">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Customers Records</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Transactions Management
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="transaction.php">Transactions History</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="dropdown-item" href="withdraw.php">Withdraw</a></li>
                    <li><a class="dropdown-item" href="deposit.php">Deposit</a></li>
                    <li><a class="dropdown-item" href="transfer.php">Transfer</a></li>
                </ul>
                <ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Account Management
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="create.php">Create Customer Account</a>
                            </li>
                        </ul>
                    <li>
                        <a class="dropdown-item" href="#">Manage Customer Account</a>
                    </li>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Bankers Account
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="admin.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Header-->
    <div class="container-fluid">
        <h1 class="text-dark p-3">Welcome to Accounts Log</h1>
        <hr>
        <!--Records-->
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-10 col-sm-6 col-md-3">
                    <div class="info-box p-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-2x fa-id-card"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Accounts</span>
                            <span class="info-box-box">
                                2 </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3 p-3">
                        <span class="info-box-icon bg-warning elevation-1"><i
                                class="fas fa-2x fa-money-bill"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Accounts Balance</span>
                            <span class="info-box-number">
                                39,500 </span>
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
</body>

</html>
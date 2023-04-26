<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Banking System</title>
    <link rel="icon" type="image/x-icon" href="./images/b.png">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="bg-primary">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Admin Login</a>
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
    <header class="text-bg-danger py-5" id="main-header">
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
                        <div class="card-title text-center w-100 p-3 fw-bold"> Admin Login</div>
                    </div>
                    <form>
                        <div class="mb-5">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="name" class="form-control" id="admin-name" placeholder="Write your username">
                        </div>
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <a href="dashboard.php" class="btn btn-sm btn-primary btn-flat" role="button">Login</a>

                        </div>
                    </form>
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
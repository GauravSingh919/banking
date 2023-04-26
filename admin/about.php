<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Banking System</title>
    <link rel="icon" type="image/x-icon" href="../images/b.png">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/line-awesome.min.css">
    <style>
        @charset "UTF-8";

        :root {
            --bs-blue: #0d6efd;
            --bs-indigo: #6610f2;
            --bs-purple: #6f42c1;
            --bs-pink: #d63384;
            --bs-red: #dc3545;
            --bs-orange: #fd7e14;
            --bs-yellow: #ffc107;
            --bs-green: #198754;
            --bs-teal: #20c997;
            --bs-cyan: #0dcaf0;
            --bs-white: #fff;
            --bs-gray: #6c757d;
            --bs-gray-dark: #343a40;
            --bs-primary: #0d6efd;
            --bs-secondary: #6c757d;
            --bs-success: #198754;
            --bs-info: #0dcaf0;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #212529;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        *::before,
        *::after {
            box-sizing: border-box;
        }

        @media (prefers-reduced-motion: no-preference) {
            :root {
                scroll-behavior: smooth;
            }
        }

        hr {
            margin: 1rem 0;
            color: inherit;
            background-color: currentColor;
            border: 0;
            opacity: 0.25;
        }

        hr:not([size]) {
            height: 1px;
        }

        h6,
        .h6,
        h5,
        .h5,
        h4,
        .h4,
        h3,
        .h3,
        h2,
        .h2,
        h1,
        .h1 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        h1,
        .h1 {
            font-size: calc(1.375rem + 1.5vw);
        }

        @media (min-width: 1200px) {

            h1,
            .h1 {
                font-size: 2.5rem;
            }
        }

        h2,
        .h2 {
            font-size: calc(1.325rem + 0.9vw);
        }

        @media (min-width: 1200px) {

            h2,
            .h2 {
                font-size: 2rem;
            }
        }

        h3,
        .h3 {
            font-size: calc(1.3rem + 0.6vw);
        }

        @media (min-width: 1200px) {

            h3,
            .h3 {
                font-size: 1.75rem;
            }
        }

        h4,
        .h4 {
            font-size: calc(1.275rem + 0.3vw);
        }

        @media (min-width: 1200px) {

            h4,
            .h4 {
                font-size: 1.5rem;
            }
        }

        h5,
        .h5 {
            font-size: 1.25rem;
        }

        h6,
        .h6 {
            font-size: 1rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .fa-solid,
        .fas {
            font-weight: 900;
        }

        .fa-classic,
        .fa-regular,
        .fa-solid,
        .far,
        .fas {
            font-family: "Font Awesome 6 Free";
        }

        .fa,
        .fa-brands,
        .fa-classic,
        .fa-regular,
        .fa-sharp,
        .fa-solid,
        .fab,
        .far,
        .fas {
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            display: var(--fa-display, inline-block);
            font-style: normal;
            font-variant: normal;
            line-height: 1;
            text-rendering: auto;
        }

        /*devices*/
        .loader {
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: 10;
            width: 160px;
            height: 100px;
            margin-left: -80px;
            margin-top: -50px;
            border-radius: 5px;
            background: #1e3f57;
            animation: dot1_ 3s cubic-bezier(0.55, 0.3, 0.24, 0.99) infinite;
        }

        .loader:nth-child(2) {
            z-index: 11;
            width: 150px;
            height: 90px;
            margin-top: -45px;
            margin-left: -75px;
            border-radius: 3px;
            background: #3c517d;
            animation-name: dot2_;
        }

        .loader:nth-child(3) {
            z-index: 12;
            width: 40px;
            height: 20px;
            margin-top: 50px;
            margin-left: -20px;
            border-radius: 0 0 5px 5px;
            background: #6bb2cd;
            animation-name: dot3_;
        }

        @keyframes dot1_ {

            3%,
            97% {
                width: 160px;
                height: 100px;
                margin-top: -50px;
                margin-left: -80px;
            }

            30%,
            36% {
                width: 80px;
                height: 120px;
                margin-top: -60px;
                margin-left: -40px;
            }

            63%,
            69% {
                width: 40px;
                height: 80px;
                margin-top: -40px;
                margin-left: -20px;
            }
        }

        @keyframes dot2_ {

            3%,
            97% {
                height: 90px;
                width: 150px;
                margin-left: -75px;
                margin-top: -45px;
            }

            30%,
            36% {
                width: 70px;
                height: 96px;
                margin-left: -35px;
                margin-top: -48px;
            }

            63%,
            69% {
                width: 32px;
                height: 60px;
                margin-left: -16px;
                margin-top: -30px;
            }
        }

        @keyframes dot3_ {

            3%,
            97% {
                height: 20px;
                width: 40px;
                margin-left: -20px;
                margin-top: 50px;
            }

            30%,
            36% {
                width: 8px;
                height: 8px;
                margin-left: -5px;
                margin-top: 49px;
                border-radius: 8px;
            }

            63%,
            69% {
                width: 16px;
                height: 4px;
                margin-left: -8px;
                margin-top: -37px;
                border-radius: 10px;
            }
        }

        /*end of devices*/

        .user-img {
            position: absolute;
            height: 27px;
            width: 27px;
            object-fit: cover;
            left: -7%;
            top: -12%;
        }

        .btn-rounded {
            border-radius: 50px;
        }
    </style>
</head>

<body>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">About This Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Header-->
    <header class="bg-dark py-5" id="main-header">
        <div class="container px-4 px-sm-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder"> Banking Transaction System </h1>

                <div class="container">
                    <div class="loader"></div>
                    <div class="loader"></div>
                    <div class="loader"></div>
                </div>


            </div>
        </div>
    </header>

    <h2 class="text-center fw-bolder">Assignment work for NPoint Company works on all Devices</h2>

    </div>
</body>

</html>
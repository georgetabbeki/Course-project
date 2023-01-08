<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <!-- inner page section -->
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>About us</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page section -->
    <div class="heading_container heading_center">

        <h2> Who are we?</h2>

        <p>
            An advanced service that aims to introduce a wide range of different commercial products offered by several
            large companies, and make them visible to customers and bank account holders to allow customers to obtain
            them electronically without the need to go to stores, in addition to obtaining exclusive discounts offered
            by these sponsoring companies.
        </p>

        <h2>Our goal</h2>
        <p>
            Enhancing the role of technology and software in Arab society.

        </p>

    </div>
    <!-- why section -->
    @include('home.why')
    <!-- end why section -->
    <div class="heading_container heading_center">

        <h2> Our vision </h2>

        <p>
            We have adopted a policy in which we maintain continuous development to provide easy-to-use solutions,
            keeping pace with the latest technical developments, in addition to covering all requirements with the
            ability to adapt them to the special requirements of each beneficiary, and our vision lies in providing a
            real informational environment

        </p>
    </div>

    <!-- footer section -->
    @include('home.footer')
    <!-- footer section -->
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>

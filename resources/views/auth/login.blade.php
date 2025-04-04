<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Login - UIT Portal</title>

    <meta name="description" content="Login to the UIT portal using your Google account.">
    <meta name="author" content="UIT IT Department">
    <meta name="robots" content="index, follow">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/logo.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/logo.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/media/favicons/logo.png') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">

</head>

<body>

    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('{{ asset('assets/media/photos/photo22@2x.jpg') }}');">
                <div class="row g-0 bg-primary-op">
                    <!-- Main Section -->
                    <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
                        <div class="p-3 w-100">
                            <!-- Header -->
                            <div class="mb-3 text-center">
                                <a class="link-fx fw-bold fs-1" href="#">
                                    <span class="text-dark">UIT</span><span class="text-primary"> Portal</span>
                                </a>
                                <p class="text-uppercase fw-bold fs-sm text-muted">Sign In</p>
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->
                            <div class="row g-0 justify-content-center">
                                <div class="col-sm-8 col-xl-6">
                                    <div class="py-3 text-center">
                                        <p class="mb-3">Login with your UIT Google account</p>

                                        <!-- Google Sign-In Button -->
                                        <a href="{{ route('auth.google') }}"
                                            class="btn w-100 btn-lg btn-hero btn-primary">
                                            <i class="fab fa-google opacity-50 me-1"></i> Sign in with Google
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                    <!-- END Main Section -->

                    <!-- Meta Info Section -->
                    <div
                        class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                        <div class="p-3">
                            <p class="display-4 fw-bold text-white mb-3">
                                <img src="{{ asset('images/Ibn Tofail University_Logo_Horizontal_Full Color (1).png') }}"
                                    alt="Ibn Tofail University Logo" class="img-fluid" style="max-height: ;">
                            </p>
                            <p class="fs-lg fw-semibold text-white-75 mb-0">
                                Administrative
                            </p>
                        </div>
                    </div>
                    <!-- END Meta Info Section -->
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!-- Dashmix JS -->
    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

</body>

</html>
<!doctype html>
<html lang="en" class="remember-theme">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Apogée UIT | Portail Administratif</title>

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description"
        content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/media/favicons/logo.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/logo.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Dashmix framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/xpro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <!-- END Stylesheets -->

    <!-- Load and set color theme + dark mode preference (blocking script to prevent flashing) -->
    <script src="{{ asset('assets/js/setTheme.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body>

    <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-dark main-content-boxed">

        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-primary">
                <!-- Logo -->
                <a class="fw-semibold text-white tracking-wide" href="">
                    Ibn<span class="opacity-75">Tofail</span>
                    <span class="fw-normal">University</span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <a class="d-lg-none text-white ms-2" data-toggle="layout" data-action="sidebar_close"
                        href="javascript:void(0)">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- User Info -->
                <div class="smini-hidden">
                    <div class="content-side content-side-full bg-black-10 d-flex align-items-center">
                        <a class="img-link d-inline-block" href="javascript:void(0)">
                            <img class="img-avatar img-avatar48 img-avatar-thumb"
                                src="{{ session('user_avatar') ?? auth()->user()->avatar }}" alt="">
                        </a>
                        <div class="ms-3">
                            <a class="fw-semibold text-dual"
                                href="javascript:void(0)">{{ session('user_name') ?? auth()->user()->name }}</a>
                        </div>
                        <!-- Logout Button -->
                        <div class="ms-3">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-primary ">Logout</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- END User Info -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="{{ route('home') }}">
                                <i class="nav-main-link-icon fa fa-compass"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">More</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-briefcase"></i>
                                <span class="nav-main-link-name">Projects</span>
                            </a>
                            <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('inscription-annee-anterieure') }} ">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Inscription Administrative ( Licence / Master )</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('compte-fonctionnel-apogee.show') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Compte Fonctionnel Apogée</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('insertion.resultat.etudiant') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Résultat Étudiant </span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('insertion.module.form') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Résultat Étudiants Par Module</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('doctorat.inscription.show') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Inscription Administrative Doctorat</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('calcul.notes.show') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Calcul des Notes</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-main-link" href="{{ route('annulation.inscription.form') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Annulation d'Inscription</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-main-link" href="{{ route('suppression.note.etudiant.form') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">suppression des notes</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header" class="container-fluid">


            <!-- Header Content -->

            <div class="content-header">

                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Logo -->
                    <a class="fw-semibold text-dual tracking-wide" href="#">
                        Ibn<span class="opacity-75">Tofail</span>
                        <span class="fw-normal">University</span>
                    </a>
                    <!-- END Logo -->
                    <!-- Menu -->
                    <ul
                        class="nav-main nav-main-horizontal nav-main-hover  nav-main-horizontal-justify d-none d-lg-block ms-5">
                        <li class="nav-main-item">
                            <span>
                                <a class="img-link d-inline-block" href="javascript:void(0)">
                                    <img class="img-avatar img-avatar20 img-avatar-thumb"
                                        src="{{ session('user_avatar') ?? auth()->user()->avatar }}" alt="">
                                </a>
                                <span class="fw-medium fs-base text-white-75 d-block d-md-inline-block">
                                    {{ session('user_name') ?? auth()->user()->name }}
                                </span>
                            </span>
                        </li>
                    </ul>
                    <ul class="nav-main nav-main-horizontal nav-main-hover d-none d-lg-block ms-6">
                        <li class="nav-main-item">
                            <a class="nav-main-link " href="{{ route('home') }}">
                                <i class="nav-main-link-icon fa fa-compass"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">More</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-briefcase"></i>
                                <span class="nav-main-link-name">Demandes</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('inscription-annee-anterieure') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Inscription Administrative ( Licence / Master )</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('compte-fonctionnel-apogee.show') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Compte Fonctionnel Apogée</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('insertion.resultat.etudiant') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Résultat Étudiant</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('insertion.module.form') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Résultat Étudiants Par Module</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('doctorat.inscription.show') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">nscription Administrative Doctorat</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ route('calcul.notes.show') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Calcul des Notes</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-main-link" href="{{ route('annulation.inscription.form') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">Annulation d'Inscription</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-main-link" href="{{ route('suppression.note.etudiant.form') }}">
                                        <i class="fa fa-file-word fa-2x text-muted"></i>
                                        <span class="nav-main-link-name ms-3">suppression des notes</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="nav-main nav-main-horizontal nav-main-hover d-none d-lg-block ms-9">
                        <li class="nav-main-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class=" btn  btn-sm  btn-light ">Logout</button>
                            </form>
                        </li>
                    </ul>
                    <!-- END Menu -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div>
                    <button type="button" class="btn btn-alt-secondary d-lg-none" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->


            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->

            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Content -->
        <main id="main-container">
            <!-- Hero -->
            <div class="bg-header-dark">
                <div class="content content-full">
                    <div class="row pt-0 justify-content-center text-center">

                        <div class="col-12 py-3 d-flex flex-column align-items-center">
                            <h2 class="fw-bold text-white mb-1">Apogée UIT | Portail Administratif</h2>
                        </div>
                    </div>

                </div>
                <div class="ms-3">

                </div>
            </div>


            <!-- END Hero -->

            @yield('content')
        </main>
        <!-- END Main Content -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-0">
                <div class="row fs-sm">
                    <div class="col-sm-12 order-sm-1 text-center ">
                        <a class="fw-semibold" href="https://www.uit.ac.ma/" target="_blank">Ibn Tofail University</a>
                        &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>

    <!-- Dashmix JS -->
   <!-- Scripts -->
   <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/js/pages/db_corporate_slim.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
    @yield('scripts')
    @stack('scripts')
</body>

</html>
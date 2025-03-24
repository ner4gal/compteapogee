<!doctype html>
<html lang="en" class="remember-theme">

<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title>Dashmix - Bootstrap 5 Admin Template &amp; UI Framework</title>

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
  <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
  <!-- END Icons -->

  <!-- Stylesheets -->
  <!-- Dashmix framework -->
  <link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">

  <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
  <link rel="stylesheet" id="css-theme" href="assets/css/themes/xpro.min.css">
  <!-- END Stylesheets -->

  <!-- Load and set color theme + dark mode preference (blocking script to prevent flashing) -->
  <script src="assets/js/setTheme.js"></script>
</head>

<body>

  <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-dark main-content-boxed">

    <nav id="sidebar" aria-label="Main Navigation">
      <!-- Side Header -->
      <div class="content-header bg-primary">
        <!-- Logo -->
        <a class="fw-semibold text-white tracking-wide" href="index.html">
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
              <a class="nav-main-link active" href="db_corporate_slim.html">
                <i class="nav-main-link-icon fa fa-compass"></i>
                <span class="nav-main-link-name">Dashboard</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link" href="">
                <i class="nav-main-link-icon fa fa-user-circle"></i>
                <span class="nav-main-link-name">Profile</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link" href="">
                <i class="nav-main-link-icon fa fa-envelope-open"></i>
                <span class="nav-main-link-name">Messages</span>
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
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon fa fa-check"></i>
                    <span class="nav-main-link-name">Active</span>
                    <span class="nav-main-link-badge badge rounded-pill bg-success">3</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon fa fa-users"></i>
                    <span class="nav-main-link-name">Colleagues</span>
                    <span class="nav-main-link-badge badge rounded-pill bg-primary">24</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon fa fa-cog"></i>
                    <span class="nav-main-link-name">Manage</span>
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
    <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
          <!-- Logo -->
          <a class="fw-semibold text-dual tracking-wide" href="index.html">
            Ibn<span class="opacity-75">Tofail</span>
            <span class="fw-normal">University</span>
          </a>
          <!-- END Logo -->

          <!-- Menu -->
          <ul class="nav-main nav-main-horizontal nav-main-hover d-none d-lg-block ms-9">
            <li class="nav-main-item">
              <a class="nav-main-link active" href="db_corporate_slim.html">
                <i class="nav-main-link-icon fa fa-compass"></i>
                <span class="nav-main-link-name">Dashboard</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link" href="">
                <i class="nav-main-link-icon fa fa-user-circle"></i>
                <span class="nav-main-link-name">Profile</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link" href="">
                <i class="nav-main-link-icon fa fa-envelope-open"></i>
                <span class="nav-main-link-name">Messages</span>
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
                  <a class="nav-main-link" href="">
                    <i class="fa fa-file-word fa-2x text-muted"></i>
                    <span class="nav-main-link-name ms-3">Inscription Administrative</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="fa fa-file-word fa-2x text-muted"></i>
                    <span class="nav-main-link-name ms-3">Compte Fonctionnel Apogée</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="fa fa-file-word fa-2x text-muted"></i>
                    <span class="nav-main-link-name ms-3">Résultat Étudian</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="fa fa-file-word fa-2x text-muted"></i>
                    <span class="nav-main-link-name ms-3">Résultat Étudians Par Module</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="fa fa-file-word fa-2x text-muted"></i>
                    <span class="nav-main-link-name ms-3">Inscription Doctorat</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="fa fa-file-word fa-2x text-muted"></i>
                    <span class="nav-main-link-name ms-3">Calcul des Notes</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="fa fa-file-word fa-2x text-muted"></i>
                    <span class="nav-main-link-name ms-3">Nouvelle Spécialité Doctorat</span>
                  </a>
                </li>
              </ul>
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

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header bg-primary">
        <div class="content-header">
          <form class="w-100" action="be_pages_generic_search.html" method="POST">
            <div class="input-group">
              <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                <i class="fa fa-fw fa-times-circle"></i>
              </button>
              <input type="text" class="form-control border-0" placeholder="Search your company.."
                id="page-header-search-input" name="page-header-search-input">
            </div>
          </form>
        </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-primary-darker">
        <div class="content-header">
          <div class="w-100 text-center">
            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
          </div>
        </div>
      </div>
      <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

      <!-- Hero -->
      <div class="bg-header-dark">
        <div class="content content-full">
          <div class="row pt-0 justify-content-center text-center">
            <div class="mt-0">
              <img src="{{ asset('images/logo50.png') }}" alt="Header Image" class="img-fluid"
                style="max-height: 100px;">
            </div>
            <div class="col-12 py-3 d-flex flex-column align-items-center">
              <h2 class="fw-bold text-white mb-1">Apogée UIT | Portail Administratif</h2>
            </div>
          </div>
          <h1 class="text-white mb-0 d-flex justify-content-between align-items-center">
            <span>
              <span class="fw-semibold">Bienvenue</span>
              <span class="fw-medium fs-base text-white-75 d-block d-md-inline-block">
                {{ session('user_name') ?? auth()->user()->name }}
              </span>
            </span>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-sm  btn-outline-secondary ">Logout</button>
            </form>
          </h1>

        </div>
        <div class="ms-3">

        </div>
      </div>


      <!-- END Hero -->


      <!-- Page Content -->
      <div class="bg-body-extra-light">
        <div class="content content-full">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt bg-body-light px-4 py-2 rounded push">
              <li class="breadcrumb-item">
                <a href="javascript:void(0)">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </nav>
          <!-- END Breadcrumb -->

          <!-- Quick Menu -->
          <div class="row">
            <div class="col-6 col-md-4 col-xl-4">
              <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('home') }}">
                <div class="block-content">
                  <p class="my-2">
                    <i class="fa fa-compass fa-2x text-muted"></i>
                  </p>
                  <p class="fw-semibold">Home</p>
                </div>
              </a>
            </div>
            <div class="col-8 col-md-6 col-xl-4">
              <a class="block block-rounded block-bordered block-link-shadow ribbon ribbon-modern ribbon-primary text-center"
                href="javascript:void(0)">
                <div class="block-content">
                  <p class="my-2">
                    <i class="fa fa-user-tie fa-2x text-muted"></i>
                  </p>
                  <p class="fw-semibold">Profile</p>
                </div>
              </a>
            </div>
            <div class="col-6 col-md-4 col-xl-4">
              <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('Demands') }}">
                <div class="block-content">
                  <p class="my-2">
                    <i class="fa fa-file-word fa-2x text-muted"></i>
                  </p>
                  <p class="fw-semibold">Les Demandes Administratives</p>
                </div>
              </a>
            </div>
          </div>
          <!-- END Quick Menu -->

          <!-- Quick Stats -->
          <div class="row">
            <div class="col-md-6 col-xl-3">
              <a class="block block-rounded block-bordered" href="javascript:void(0)">
                <div class="block-content p-2">
                  <div class="py-5 text-center bg-body-light rounded">
                    <div class="fs-2 fw-bold mb-0">45</div>
                    <div class="fs-sm fw-semibold text-uppercase">All Projects</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-3">
              <a class="block block-rounded block-bordered" href="javascript:void(0)">
                <div class="block-content p-2">
                  <div class="py-5 text-center bg-body-light rounded">
                    <div class="fs-2 fw-bold mb-0">4</div>
                    <div class="fs-sm fw-semibold text-uppercase">Pending Tasks</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-3">
              <a class="block block-rounded block-bordered" href="javascript:void(0)">
                <div class="block-content p-2">
                  <div class="py-5 text-center bg-body-light rounded">
                    <div class="fs-2 fw-bold mb-0">19</div>
                    <div class="fs-sm fw-semibold text-uppercase">Tickets</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-xl-3">
              <a class="block block-rounded block-bordered" href="javascript:void(0)">
                <div class="block-content p-2">
                  <div class="py-5 text-center bg-body-light rounded">
                    <div class="fs-2 fw-bold mb-0">2</div>
                    <div class="fs-sm fw-semibold text-uppercase">Meetings</div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- END Quick Stats -->


          <!-- END People and Tickets -->
        </div>
      </div>
      <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
      <div class="content py-0">
        <div class="row fs-sm">
          <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold"
              href="https://github.com/ner4gal" target="_blank">Nergal</a>
          </div>
          <div class="col-sm-6 order-sm-1 text-center text-sm-start">
            <a class="fw-semibold" href="https://www.uit.ac.ma/" target="_blank">ibn tofail university</a> &copy; <span
              data-toggle="year-copy"></span>
          </div>
        </div>
      </div>
    </footer>
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->

  <!--
      Dashmix JS

      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
  <script src="assets/js/dashmix.app.min.js"></script>

  <!-- Page JS Plugins -->
  <script src="assets/js/plugins/chart.js/chart.umd.js"></script>

  <!-- Page JS Code -->
  <script src="assets/js/pages/db_corporate_slim.min.js"></script>
</body>

</html>
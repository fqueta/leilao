<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('/')}}/assets/img/favicon.png" rel="icon">
  <link href="{{url('/')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- CDN CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Vendor CSS Files -->
  <link href="{{url('/')}}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{url('/')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  @yield('css')
  <!-- Template Main CSS File -->
  <link href="{{url('/')}}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: L.ACJF - v4.11.0
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-L.ACJF/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>L.ACJF</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{url('/')}}/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active " href="{{route('index')}}">Home</a></li>
          <li><a href="about.html">Sobre nós</a></li>
          <li><a href="{{url('/')}}/{{App\Qlib\Qlib::get_slug_post_by_id(37)}}">Leilões</a></li>
          <li><a href="portfolio.html">Produtos</a></li>
          <li><a href="contact.html">Contato</a></li>
          @can('is_logado')
          @if (Gate::allows('is_admin2') || Gate::allows('is_customer_logado'))
          <li class="dropdown dropdown-menu-right"><a href="#"><span><i class="fas fa-user-circle fa-2x   "></i></span> <i class="bi bi-chevron-down"></i></a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right show">
            @can('is_admin2')
                <li><a href="/admin">Painel Admin</a></li>
            @endcan
            <li class="dropdown"><a href="#"> <span>Gerenciar leilões</span> <i class="bi bi-chevron-right"></i> </a>
                <ul>
                <li><a href="{{url('/')}}/{{App\Qlib\Qlib::get_slug_post_by_id(2)}}">{{__('Cadastrar leilão')}}</a></li>
                <li><a href="{{url('/')}}/{{App\Qlib\Qlib::get_slug_post_by_id(18)}}">{{__('Meus leilões')}}</a></li>
                <li><a href="{{url('/')}}/{{App\Qlib\Qlib::get_slug_post_by_id(3)}}">{{__('Meus lances')}}</a></li>
                {{-- <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li> --}}
                </ul>
            </li>
            <li><a href="{{url('/')}}/{{App\Qlib\Qlib::get_slug_post_by_id(34)}}">Meu Cadastro</a></li>
            <li><a href="#">Meus pacotes</a></li>
            {{-- <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li> --}}
            <li class="user-footer">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{__('Sair')}}
                </a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            </ul>
        </li>
          @else
          <li>

            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{__('Usuario bloquedo clique para sair')}}
            </a>
            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
          @endif
            <li><a href="/cart"><i class="fas fa-cart-arrow-down"></i></a></li>

          @else
            <li><a class="btn btn-default btn-flat float-right" href="{{route('login')}}"><i class="fas fa-user"></i>&nbsp;Login</a></li>
            <li><a class="btn btn-default btn-flat float-right" href="{{route('register')}}"><i class="fas fa-user"></i>&nbsp;Cadastrar</a></li>
          @endcan
          <li><a class="btn btn-default btn-flat float-right" href="#"><i class="fas fa-search"></i></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @yield('banner-topo')


  <main id="main">
    <!-- ======= Services Section ======= -->
    @yield('main')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}/{{App\Qlib\Qlib::get_slug_post_by_id(37)}}">Leilões</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About L.ACJF</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>L.ACJF</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-L.ACJF/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('/')}}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{url('/')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{url('/')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{url('/')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{url('/')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{url('/')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{url('/')}}/assets/vendor/waypoints/noframework.waypoints.js"></script>
  {{-- <script src="{{url('/')}}/assets/vendor/php-email-form/validate.js"></script> --}}

  <!-- Template Main JS File -->
  @yield('js')
  <script src="{{url('/')}}/assets/js/main.js"></script>

</body>

</html>

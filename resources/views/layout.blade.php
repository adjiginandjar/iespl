<!DOCTYPE html>
<html>
  <head>
    <title>Indonesia eSports Premiere League</title><meta name="robots" content=",">


        <meta charset="utf-8">
        @yield('meta')

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
        @yield('stylesheet')

  </head>
  <body>
      <!-- Header -->
      <header id="layout-header" class="">
          <div class="container">
              <div class="row">
                  <nav class="navbar">
                      <!-- <div class="bg-header"><img src="http://iespl.id/themes/iespl/assets/images/bg/home/home.jpg"/></div> -->
                      <div class="navbar-block">
                          <a data-track="ga" track-cat="Header" track-action="Header_Logo" track-label="Logo" href="http://iespl.id" class="navbar-brand justify-content-center"><i class="icon-iespl"></i></a>
                          <div class="main-navbar d-flex" id="">
                          <ul class="nav text-uppercase font-white d-flex justify-sm-content-center">
                              <!-- <li class="nav-item ">
                              <a data-track="ga" track-cat="Header" track-action="Header_Menu" track-label="Home" class="nav-link active" href="http://iespl.id">Home</a>
                              </li> -->
                              <li class="nav-item">
                              <a data-track="ga" track-cat="Header" track-action="Header_Menu" track-label="Team" class="nav-link" href="http://iespl.id/team">Team</a>
                              </li>
                              <li class="nav-item">
                              <a data-track="ga" track-cat="Header" track-action="Header_Menu" track-label="Match" class="nav-link" href="http://iespl.id/match">Match</a>
                              </li>
                              <li class="nav-item">
                              <a data-track="ga" track-cat="Header" track-action="Header_Menu" track-label="League" class="nav-link" href="http://iespl.id/league">League</a>
                              </li>
                              <!-- <li class="nav-item">
                                  <i data-track="ga" track-cat="Header" track-action="Header_Menu" track-label="Search" class="icon-search"></i>
                              </li>   -->
                          </ul>
                      </div>
                    </div>
                </nav>
            </div>
        </div>
      </header>

    <!-- Content -->

    <section id="layout-content" class="">
      @yield('layout-content')
    </section>
    <!-- Footer -->
    <section id="layout-footer">
        @include('includes.footer')
    </section>

    <!-- Scripts -->
    <script async="" src="https://www.google-analytics.com/analytics.js"></script><script src="http://iespl.id/themes/iespl/assets/vendor/jquery.js"></script>
<script src="http://iespl.id/themes/iespl/assets/vendor/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://iespl.id/themes/iespl/assets/js/bootstrap-toolkit.min.js"></script>


<script src="http://iespl.id/combine/9ba87ce5b88380d9c0bc957357c5a086-1533896574"></script>

<!-- <script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-39379500-6', 'auto');
ga('send', 'pageview');
ga('send', 'pageview');

</script> -->

<script src="/modules/system/assets/js/framework.js"></script>
<script src="/modules/system/assets/js/framework.extras.js"></script>
<link rel="stylesheet" property="stylesheet" href="/modules/system/assets/css/framework.extras.css">


<div class="responsive-bootstrap-toolkit"><div class="d-sm-none"></div><div class="d-none d-sm-block d-md-none d-lg-none d-xl-none"></div><div class="d-none d-md-block d-lg-none d-xl-none"></div><div class="d-none d-lg-block d-xl-none"></div><div class="d-none d-xl-block"></div></div><div class="stripe-loading-indicator loaded"><div class="stripe"></div><div class="stripe-loaded"></div></div></body></html>

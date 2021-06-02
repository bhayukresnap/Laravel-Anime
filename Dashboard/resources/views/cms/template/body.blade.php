<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>AdminHero</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="googlebot-news" content="nosnippet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="{{asset('assets/cms/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/stylesheets/theme-libs-plugins.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/stylesheets/skin.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/stylesheets/demo.css')}}">
    <link rel="stylesheet" href="{{asset('assets/cms/stylesheets/custom.css')}}">
    <script src="{{asset('assets/cms/scripts/lib/modernizr-custom.js')}}"></script>
    <script src="{{asset('assets/cms/scripts/lib/respond.js')}}"></script>
    <script src="{{asset('assets/cms/scripts/lib/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('assets/cms/scripts/lib/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/cms/scripts/lib/tether.min.js')}}"></script>
    <script src="{{asset('assets/cms/scripts/theme/theme-plugins.js')}}"></script>
    <script src="{{asset('assets/cms/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('assets/cms/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/cms/scripts/plugins/notify.js')}}"></script>
    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script src="{{asset('assets/cms/scripts/theme/main.js')}}"></script>
    <script src="{{asset('assets/cms/scripts/demo/demo-skin.js')}}"></script>
    <script src="{{asset('assets/cms/scripts/demo/bar-chart-menublock.js')}}"></script>
    @yield('css')
  </head>

  <body class="orchid  ">

    <!-- #SIDEMENU-->
    <div class="mainmenu-block">
      <!-- SITE MAINMENU-->
      <nav class="menu-block">
        <ul class="nav">
          <li class="nav-item mainmenu-user-profile"><a href="user-profile.html">
              <div class="circle-box"><img src="/assets/cms/images/face/1.jpg" alt="">
                <div class="dot dot-success"></div>
              </div>
              <div class="menu-block-label"><b>Odalys Broussard</b><br>Managing Director</div></a></li>
        </ul>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('cms.home')}}"><i class="icon ion-home"></i>
              <div class="menu-block-label">Home</div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('cms.animes.index')}}">
              <i class="icon fa fa-bug"></i>
              <div class="menu-block-label">Anime</div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('cms.characters.index')}}">
              <i class="icon ion-android-contacts"></i>
              <div class="menu-block-label">Characters</div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('cms.episodes.index')}}">
              <i class="icon fa fa-film"></i>
              <div class="menu-block-label">Episodes</div>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon fa fa-file-text-o"></i>
              <div class="menu-block-label">Mangas</div>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="{{route('unisharp.lfm.show')}}">
              <i class="icon ion-image"></i>
              <div class="menu-block-label">Gallery</div>
            </a>
          </li>
          <li class="menu-block-has-sub nav-item">
            <a class="nav-link active" href="#">
              <i class="icon fa fa-gg-circle"></i>
              <div class="menu-block-label">
                Miscellaneous
              </div>
            </a>
            <ul class="nav menu-block-sub active">
              <li class="nav-item"><a class="nav-link" href="{{route('cms.people.index')}}">People</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('cms.licensors.index')}}">Licensors</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('cms.sources.index')}}">Sources</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('cms.studios.index')}}">Studios</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('cms.seasons.index')}}">Seasons</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('cms.producers.index')}}">Producers</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('cms.genres.index')}}">Genres</a></li>
            </ul>
          </li>
        </ul>
        <!-- END SITE MAINMENU-->
      </nav>
    </div>

    <!-- #MAIN-->
    <div class="main-wrapper">

      <!-- VIEW WRAPPER-->
      <div class="view-wrapper">

        <!-- TOP WRAPPER-->
        <div class="topbar-wrapper">

          <!-- NAV FOR MOBILE-->
          <div class="topbar-wrapper-mobile-nav"><a class="topbar-togger js-minibar-toggler" href="#"><i class="icon ion-ios-arrow-back hidden-md-down"></i><i class="icon ion-navicon-round hidden-lg-up"></i></a><a class="topbar-togger pull-xs-right hidden-lg-up js-nav-toggler" href="#"><i class="icon ion-android-person"></i></a>

            <!-- ADD YOUR LOGO HEREText logo: a.topbar-wrapper-logo(href="#") AdminHero
            --><a class="topbar-wrapper-logo demo-logo" href="{{route('cms.home')}}">AdminHero</a>
          </div>
          <!-- END NAV FOR MOBILE-->

          <!-- TOP RIGHT MENU-->
          <ul class="nav navbar-nav topbar-wrapper-nav">

            <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon ion-android-notifications-none"></i><span class="badge badge-danger status">9+</span></a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">Notifications (5)</div>
                <div class="dropdown-menu-inner"><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle"><img class="media-object circle-object" src="/assets/cms/images/face/2.jpg" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading">Ryan Sears</div>
                      <p class="text-muted small">Pink do well together specially name if design postage briefs big into in her working</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle">
                      <div class="media-object circle-object bg-danger"><i class="fa fa-bug"></i></div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">Server Error</div>
                      <p class="text-muted small">3 minutes ago</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle">
                      <div class="media-object circle-object bg-success"><i class="fa fa-check"></i></div>
                    </div>
                    <div class="media-body">
                      <div class="media-heading">Server Error Reports</div>
                      <p class="text-muted small">3 minutes ago</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle"><img class="media-object circle-object" src="/assets/cms/images/face/1.jpg" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading">Judith Sullivan</div>
                      <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle"><img class="media-object circle-object" src="/assets/cms/images/face/2.jpg" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading">Judith Sullivan</div>
                      <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle"><img class="media-object circle-object" src="/assets/cms/images/face/3.jpg" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading">Judith Sullivan</div>
                      <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                    </div></a><a class="dropdown-item media circle-box" href="#">
                    <div class="media-left media-middle"><img class="media-object circle-object" src="/assets/cms/images/face/4.jpg" alt=""></div>
                    <div class="media-body">
                      <div class="media-heading">Judith Sullivan</div>
                      <p class="text-muted small">Option wouldn't small hardly of and more believe The fundamentals</p>
                    </div></a>
                </div><a class="dropdown-item" href="#">
                  <div class="text-xs-center"><i class="ion-more"></i></div></a>
              </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon ion-paintbucket"></i></a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <div class="js-color-switcher demo-color-switcher">
                  <div class="dropdown-header">Flat</div>
                  <div class="list-inline"><a class="list-inline-item" href="#" data-color="f-dark">
                      <div class="demo-skin-grid f-dark"></div></a><a class="list-inline-item" href="#" data-color="f-dark-blue">
                      <div class="demo-skin-grid f-dark-blue"></div></a><a class="list-inline-item" href="#" data-color="f-blue">
                      <div class="demo-skin-grid f-blue"></div></a><a class="list-inline-item" href="#" data-color="f-green">
                      <div class="demo-skin-grid f-green"></div></a><a class="list-inline-item" href="#" data-color="f-deep-taupe">
                      <div class="demo-skin-grid f-deep-taupe"></div></a>
                  </div>
                  <div class="dropdown-header">Gradient</div>
                  <div class="list-inline"><a class="list-inline-item" href="#" data-color="orchid">
                      <div class="demo-skin-grid orchid"></div></a><a class="list-inline-item" href="#" data-color="cadetblue">
                      <div class="demo-skin-grid cadetblue"></div></a><a class="list-inline-item" href="#" data-color="joomla">
                      <div class="demo-skin-grid joomla"></div></a><a class="list-inline-item" href="#" data-color="influenza">
                      <div class="demo-skin-grid influenza"></div></a><a class="list-inline-item" href="#" data-color="moss">
                      <div class="demo-skin-grid moss"></div></a><a class="list-inline-item" href="#" data-color="mirage">
                      <div class="demo-skin-grid mirage"></div></a><a class="list-inline-item" href="#" data-color="stellar">
                      <div class="demo-skin-grid stellar"></div></a><a class="list-inline-item" href="#" data-color="servquick">
                      <div class="demo-skin-grid servquick"></div></a>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="icon ion-android-exit"></i></a></li>
            <li class="nav-item"><a class="nav-link close-mobile-nav js-close-mobile-nav" href="#"><i class="icon ion-close"></i></a></li>
            <!-- END TOP RIGHT MENU-->
          </ul>
        </div>
        <!--END TOP WRAPPER-->

        <!-- #LAYOUT-->
        @yield('body')
        <!-- END PAGE CONTENT-->

      </div>
      <!-- END VIEW WAPPER-->

    </div>
    <!-- END MAIN WRAPPER-->


    <!-- WEB PERLOAD-->
    <div id="preloading">
      <ul class="loading">
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>

    <script src="{{asset('assets/cms/scripts/custom.js')}}"></script>
    @yield('script')

  </body>
</html>
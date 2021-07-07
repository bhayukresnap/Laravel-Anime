<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
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
</head>
<body class="cadetblue login login-transparent">
  <form class="login-form widget" autocomplete="off" id="login" action="{{route('cms.login.post')}}">
    @csrf
    <div class="w-section"><a class="demo-logo white m-b-2" href="index.html">AdminHero</a>
      <p class="small">Simple and effective. AdminHero is a premium admin dashboard template based on Bootstrap. There are a huge of powerful components build with Sass css</p>
    </div>
    <div class="w-section">
      <div class="form-group">
        <label class="sr-only" for="formBasicEmail">Email Address</label>
        <input class="form-control form-control-border-b" id="formBasicEmail" type="email" name="email" placeholder="Email Address" autocomplete="off">
      </div>
      <div class="form-group">
        <label class="sr-only" for="formBasicPassword">Password</label>
        <input class="form-control form-control-border-b" id="formBasicPassword" type="password" name="password" placeholder="Password" autocomplete="off">
      </div>
      <div class="form-group text-xs-right">
        <button class="btn btn-success" type="submit">Sign in</button>
      </div>
    </div>
  </form>
  <div id="preloading">
    <ul class="loading">
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <script src="{{asset('assets/cms/scripts/custom.js')}}"></script>
</body>
</html>
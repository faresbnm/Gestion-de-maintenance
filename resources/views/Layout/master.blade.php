
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://kit.fontawesome.com/90df9de916.js" crossorigin="anonymous"></script>
    <title>CESI EXIA</title>

    <!--PWA-->
    <!-- Web Application Manifest -->
<link rel="manifest" href="/manifest.json">
<!-- Chrome for Android theme color -->
<meta name="theme-color" content="#000000">

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="PWA">
<link rel="icon" sizes="512x512" href="/images/icons/icon-512x512.png">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="PWA">
<link rel="apple-touch-icon" href="/images/icons/icon-512x512.png">

<link href="/images/icons/splash-640x1136.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-750x1334.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1242x2208.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1125x2436.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-828x1792.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1242x2688.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1536x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1668x2224.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1668x2388.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-2048x2732.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/images/icons/icon-512x512.png">
</head>
<body>
  <nav class="navbar">
    <div class="navbar-container container">
        <input type="checkbox" name="" id="">
        <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>
        <ul class="menu-items">
            <li  class="{{ 'home' == request()->path() ? 'activeLink' : ''}}" ><a href="/home">Home</a></li>
            <li class="{{ 'internships' == request()->path() ? 'activeLink' : '' }}"><a href="/internships">Internships</a></li>
            <li class="{{ 'companies' == request()->path() ? 'activeLink' : '' }}"><a href="/companies">Companies</a></li>
            <li class="{{ 'account' == request()->path() ? 'activeLink' : '' }}"><a href="/account">Account</a></li>
            <li class="{{ 'jokes' == request()->path() ? 'activeLink' : '' }}"><a href="/jokes">Polite jokes</a></li>
            <li><a href="{{ route('auth.logout') }}"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;font-size:30px;"></i></a></li>
        </ul>
        <h1 class="logo">CESI EXIA</h1>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>
  
    <footer>
        <div class="footer-content">
         <center><p>&copy; 2024 G2. All rights reserved.</p></center> 
        </div>
    </footer>


    <script type="text/javascript">
      // Initialize the service worker
      if ('serviceWorker' in navigator) {
          navigator.serviceWorker.register('/serviceworker.js', {
              scope: '.'
          }).then(function (registration) {
              // Registration was successful
              console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
          }, function (err) {
              // registration failed :(
              console.log('Laravel PWA: ServiceWorker registration failed: ', err);
          });
      }
  </script>
</body>
</html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://kit.fontawesome.com/90df9de916.js" crossorigin="anonymous"></script>
    <title>CESI EXIA</title>
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
</body>
</html>

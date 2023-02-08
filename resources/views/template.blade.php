<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/template.css">
    <title>@yield('title')</title> 
</head>
<body>
    <div class="header">
        <div class="language">
            <a href="/language/en">EN</a> | <a href="/language/id">ID</a>
        </div>
        <div class="headertext">      
            Amazing E-Grocery
            <div class="custombutton">
                @yield('header')
            </div>
        </div>
    </div>
    <div class="navbar">
        @yield('navbar')
    </div>
    @yield('content')
    <div class="footergap">

    </div>
</body>
<footer>
    <div class="align">
        <div class="footer"> 
            <p class="footer_text">&copy; Amazing E-Grocery 2023</p>
       </div>
    </div>
</footer>
</html>
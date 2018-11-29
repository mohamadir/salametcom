<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <meta name="description" content="جمعية سلامتكم, رغم الالم يوجد الم!">
    <meta property="og:title"  content="جمعية سلامتكم, رغم الالم يوجد الم!"/>
    <meta property="og:url" content="http://mohamdibrahem.com" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <title>@yield('title')</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" style="background: white !important;">
      <h3><a class="navbar-brand text-primary"   href="/">جمعية سلامتكم</a></h3>
      <img src="http://www.slametkom.org/uploads/1/0/8/2/10824401/1409657547.png" class="img-fluid" style="margin: 0 auto; width: 60px; height: 40px;" alt="Responsive image">
      <button class="navbar-toggler p-1 border-0 bg-primary" type="button"  data-toggle="offcanvas">
       <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse bg-primary" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto mt-3" style="direction: rtl; text-align: right;" >
          <li class="nav-item active">
            <h3><a class="nav-link" style="color: white;" href="/transports"> توصيلات <i class="fas fa-car"></i><span class="sr-only">(current)</span></a></h3>
          </li>
          <li class="nav-item">
           <h3> <a class="nav-link"  style="color: white;" href="/helps">مساعدات <i class="fas fa-hands-helping"></i></a></h3>
          </li>
          @auth
          @if($user->is_admin == 1)
          <li class="nav-item">
           <h3> <a class="nav-link"   style="color: white;" href="#">احصائيات {{$user->is_admin}} <i class="fas fa-chart-bar"></i></a></h3>
          </li>  
          @endif         
          @endauth
         


        </ul>
            <li class="nav-item">
                @auth
                    <h3> <a class="nav-link"   style="color: white;" href="/signout">خروج </i></a></h3>
                @endauth

                @guest
                    <h3> <a class="nav-link"   style="color: white;" href="/signout"> <i class="fas fa-sign-in-alt"> دخول</i></a></h3>
                @endguest
            </li>
      </div>
    </nav>

      <main role="main" class="container"  >
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
    <script>
    $(function () {
        'use strict'

        $('[data-toggle="offcanvas"]').on('click', function () {
            $('.offcanvas-collapse').toggleClass('open')
        })
        })
    </script>
</body>
</html>
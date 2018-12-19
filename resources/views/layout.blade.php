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
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0, user-scalable=no">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    @yield('css')

    <title>@yield('title')</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" style="background: white !important;">
      <h3><a class="navbar-brand text-primary"   href="/">جمعية سلامتكم</a></h3>
      <button class="navbar-toggler p-1 border-0 bg-primary" type="button"  data-toggle="offcanvas">
       <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse bg-primary" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto mt-3" style="direction: rtl; text-align: right;" >
          <li class="nav-item active">
            <h3><a class="nav-link" style="color: white;" href="/">  <i class="fas fa-home"></i> الرئيسية<span class="sr-only">(current)</span></a></h3>
          </li>
          <div style="height: 1px; background: white;"></div>
          <li class="nav-item active">
            <h3><a class="nav-link" style="color: white;" href="/transports"> <i class="fas fa-car"></i> توصيلات <span class="sr-only">(current)</span></a></h3>
          </li>
          <div style="height: 1px; background: white;"></div>
          <li class="nav-item">
           <h3> <a class="nav-link"  style="color: white;" href="/helps"><i class="fas fa-hands-helping"></i> مساعدات </a></h3>
          </li>
          <div style="height: 1px; background: white;"></div>
          <li class="nav-item">
           <h3> <a class="nav-link"  style="color: white;" href="/tools"><i class="fas fa-prescription-bottle-alt"></i> شراء اجهزة </a></h3>
          </li>
          <div style="height: 1px; background: white;"></div>
          <li class="nav-item">
           <h3> <a class="nav-link"  style="color: white;" href="/donates"> <i class="fas fa-hand-holding-usd"></i> تبرعات عينية </a></h3>
          </li>
          @auth
          @if($user->is_admin == 1)
          <div style="height: 1px; background: white;"></div>
          <li class="nav-item">
           <h3> <a class="nav-link"   style="color: white;" href="/statistics"> <i class="fas fa-chart-bar"></i> احصائيات  </a></h3>
          </li>
          <div style="height: 1px; background: white;"></div>
          <li class="nav-item">
           <h3> <a class="nav-link"   style="color: white;" href="/users"><i class="fas fa-users"></i> مستخدمين </a></h3>
          </li>
          <div style="height: 1px; background: white;"></div>
          <li class="nav-item">
           <h3> <a class="nav-link"   style="color: white;" href="/contacts"><i class="fas fa-phone-volume"></i> جهات الاتصال </a></h3>
          </li>
           <li class="nav-item">
           <h3> <a class="nav-link"   style="color: white;" href="/store"><i class="fas fa-store"></i> المخزن   </a></h3>
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

      <main role="main" class="container bg-white"  >
        @yield('content')
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

   <script>
    $(function () {
        'use strict'

        $('[data-toggle="offcanvas"]').on('click', function () {
            $('.offcanvas-collapse').toggleClass('open')
        })
        })
    </script>
    @yield('script')
</body>
</html>
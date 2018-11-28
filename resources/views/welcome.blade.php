@extends('layout')

@section('title', 'Login')

@section('content')
     <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" style="background: white !important;">
      <a class="navbar-brand"  style="color: red;" href="#">جمعية سلامتكم</a>
      <img src="http://www.slametkom.org/uploads/1/0/8/2/10824401/1409657547.png" class="img-fluid mr-auto mr-lg-0" style="width: 40px; height: 40px; float:right;" alt="Responsive image">
      <button class="navbar-toggler p-0 border-0" type="button" style="background: red;" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" style="background: red;" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto mt-3" style="direction: rtl; text-align: right;" >
          <li class="nav-item active">
            <h3><a class="nav-link" href="#">توصيلات<span class="sr-only">(current)</span></a></h3>
          </li>
          <li class="nav-item">
           <h3> <a class="nav-link" href="#">مساعدات</a></h3>
          </li>
          <li class="nav-item">
           <h3> <a class="nav-link" href="#">احصائيات</a></h3>
          </li>


        </ul>

      </div>
    </nav>



    <main role="main" class="container">

    </main>
@endsection

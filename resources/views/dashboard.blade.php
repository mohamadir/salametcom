@extends('layout')

@section('title', 'صفحتي')

@section('content')
<!-- <iframe id="inlineFrameExample"
    title="Inline Frame Example"
    style="width:100%; height: 100vh;"
    src="http://www.slametkom.org/">
</iframe> -->
<div class="container">
@if (!empty($message))
<div class="text-center mt-5">

        <div class="alert alert-success m-3 text-center" role="alert">
        {{$message}}
        </div>
</div>
@endif

@if (!empty($register_message))
<div class="text-center mt-5">
        <div class="alert alert-success m-3 " role="alert">
           <h4 class="text-center">تمت اضافة مستحدم جديد</h4>
           <div class="text-center" style="direction: ltr;">
            {{$register_message->name}}   <br/>
             {{$register_message->email}}  <br/>
           {{$register_message->password}}
        </div>
           </div>
</div>
@endif

<div class="text-center">
    <img src="http://www.slametkom.org/uploads/1/0/8/2/10824401/1409657547.png" class="img-fluid" style="height:60px;" alt="Responsive image">
</div>
<p>
    <h5 class="text-center textosh">
     حان الوقت لتوثيق العطاء
    </h5>

</p>
<!-- <p class="d-none">
    <h5 class="text-center textosh">
    مئات التوصيلات تقوم بها سلامتكم لمرضى ومرافقيهم من الحواجز الى المستشفيات وبالعكس عشرات الاجهزة الطبية تقوم سلامتكم باقتنائها شهرياُ
    العديد من النشاطات والمساعدات اليومية يقوم بها المتطوعين .
    </h5>

</p>
<p>
    <h4 class="text-center">
       <strong>
       حان الوقت لتوثيق كل هذا العطاء
       </strong>
    </h4>
</p> -->
<p>
  <!--  START -->
	<div class="main-section">

            <div class="dashbord">
                <div class="icon-section">
                    <i class="fas fa-car" aria-hidden="true"></i><br>
                    <h5>توصيلات</h5>
                    <p> <small>{{$transports}}</small>
                </div>
                <div class="detail-section">
                    <a href="/transports">اضافة </a>
                </div>
            </div>

            <div class="dashbord">
                <div class="icon-section">
                    <i class="fas fa-hands-helping" aria-hidden="true"></i><br>
                    <h5>مساعدات</h5>
                    <p> <small>{{$helps}}</small>
                </div>
                <div class="detail-section">
                    <a href="/helps">اضافة </a>
                </div>
            </div>
            <div class="dashbord">
                <div class="icon-section">
                    <i class="fas fa-prescription-bottle-alt" aria-hidden="true"></i><br>
                    <h5>اجهزة</h5>
                    <p> <small>{{$tools}}</small>
                </div>
                <div class="detail-section">
                    <a href="/tools">اضافة </a>
                </div>
            </div>
            <div class="dashbord">
                <div class="icon-section">
                    <i class="fas fa-hand-holding-usd" aria-hidden="true"></i><br>
                    <h5>تبرعات</h5>
                    <p> <small>{{$helps}}</small>
                </div>
                <div class="detail-section">
                    <a href="/donates">اضافة </a>
                </div>
            </div>
            <div class="dashbord">
                <div class="icon-section">
                    <i class="fas fa-chart-bar" aria-hidden="true"></i><br>
                    <h5>احصائيات</h5>
                    <p> <small>{{$statistics}}</small>
                </div>
                <div class="detail-section">
                    <a href="/statistics">عرض</a>
                </div>
            </div>
            <div class="dashbord">
                <div class="icon-section">
                    <i class="fas fa-users" aria-hidden="true"></i><br>
                    <h5>مستخدمين</h5>
                    <p> <small>{{$users}}</small>
                </div>
                @if($user->is_admin == 1)
                <div class="detail-section">
                    <a href="/users">عرض </a>
                </div>
                @else
                 <div class="detail-section">
                    <a href="#">عرض </a>
                </div>
                @endif
            </div>
            <div class="dashbord">
                <div class="icon-section">
                    <i class="fas fa-phone-volume" aria-hidden="true"></i><br>
                    <h5>جهات اتصال</h5>
                    <p> <small>{{$contacts}}</small>
                </div>
                 @if($user->is_admin == 1)
                <div class="detail-section">
                    <a href="/contacts">عرض </a>
                </div>
                @else
                 <div class="detail-section">
                    <a href="#">عرض </a>
                </div>
                @endif
            </div>
            <div class="dashbord">
                <div class="icon-section">
                    <i class="fas fa-store" aria-hidden="true"></i><br>
                    <h5>المخزن</h5>
                    <p> <small>{{$things}}</small>
                </div>
                @if($user->is_admin == 1)
                <div class="detail-section">
                    <a href="/store">عرض </a>
                </div>
                @else
                 <div class="detail-section">
                    <a href="#">عرض </a>
                </div>
                @endif
            </div>

</div>
  <!-- END -->
<div class="aaa">


<ul class="navbar-nav mr-auto mt-3 d-none" style="direction: rtl; text-align: right;" >


          <li class="nav-item active">
            <h3><a class="nav-link  text-center" style="color: red;" href="/transports"> توصيلات <i class="fas fa-car"></i><span class="sr-only">(current)</span></a></h3>
          </li>
          <li class="nav-item">
           <h3> <a class="nav-link text-center"  style="color: red;" href="/helps">مساعدات <i class="fas fa-hands-helping"></i></a></h3>
          </li>
          <li class="nav-item">
           <h3> <a class="nav-link text-center"  style="color: red;" href="/tools">شراء اجهزة <i class="fas fa-prescription-bottle-alt"></i></a></h3>
          </li>
          <li class="nav-item">
           <h3> <a class="nav-link text-center"  style="color: red;" href="/donates">تبرعات عينية <i class="fas fa-hand-holding-usd"></i></a></h3>
          </li>
          @auth
          @if($user->is_admin == 1)
          <li class="nav-item">

           <h3> <a class="nav-link text-center"   style="color: red;" href="/statistics">احصائيات  <i class="fas fa-chart-bar"></i></a></h3>
          </li>
          <li class="nav-item">
           <h3> <a class="nav-link text-center"   style="color: red;" href="/users">مستخدمين <i class="fas fa-users"></i></i></a></h3>
          </li>
           <li class="nav-item">
           <h3> <a class="nav-link text-center"   style="color: red;" href="/contacts">جهات الاتصال <i class="fas fa-phone-volume"></i> </a></h3>
          </li>
            <li class="nav-item">
           <h3> <a class="nav-link text-center"   style="color: red;" href="/store">المخزن <i class="fas fa-store"></i>  </a></h3>
          </li>

          @endif
          @endauth



        </ul>

 </div>
</p>
<div class="d-none">
@if($user->is_admin)
<p class="text-center">
                     <div class="text-center mt-5">
                        <h2><a href="/register" class="font-weight-bold" >إضافة</a> حساب جديد</h2>
                    </div>
                      <div class="text-center mt-5">
                        <h2><a href="/add_contacts" class="font-weight-bold" >إضافة</a> الى جهات الاتصال</h2>
                    </div>
</p>
@endif
</div>

</div>

@endsection

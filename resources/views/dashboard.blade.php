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

<p >
    <h5 class="text-center">
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
</p>
<p>
<ul class="navbar-nav mr-auto mt-3" style="direction: rtl; text-align: right;" >
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
</p>
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

@endsection

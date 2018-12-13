@extends('layout')

@section('title', 'جمعية سلامتكم')

@section('content')

            <div class="container mt-4">
                <h2 class="text-center m-3">
                    اضافة مستخدم جديد
                </h2>
                @if (!empty($error_message))
                <div class="text-center">

                        <div class="alert alert-danger m-3 text-center" role="alert">
                        {{$error_message}}
                        </div>
                </div>
                @endif
                <div style="direction: rtl; text-align: right;">
                    <form action="/register" method="post">
                        {{csrf_field()}}
                                @csrf
                            <!-- Name -->
                            <div class="form-group" >
                                <label for="name">الاسم الكامل:</label><br>
                                <input type="text" name="name" class="form-control" >
                            </div>
                            <!-- Name -->
                            <div class="form-group">
                                <label for="email">بريد الكتروني:</label><br>
                                <input type="email" name="email" id="exampleInputEmail1" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">كلمة المرور:</label><br>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                            </div>

                             <div class="form-group">
                                <label for="phone">رقم الهاتف:</label><br>
                                <input type="number" name="phone" class="form-control"placeholder="رقم الهاتف">
                            </div>

                            <div class="form-group">
                                <label for="area" >المنطقة:</label><br>
                                <input type="text" name="area" id="username" class="form-control">
                            </div>

                            <div class="text-center" >
                            <button type="submit" class="mt-3 btn btn-primary btn-w">اضافة </button>
                            </div>
                    </form>
                   <!--  <div class="text-center mt-5">
                        <h5> لديك حساب؟ <a href="/login" class="font-weight-bold" >تسجيل الدخول</a></h5>
                    </div> -->
            </div>
@endsection

@extends('layout')

@section('title', 'جمعية سلامتكم')

@section('content')

            <div class="container mt-4">
                <h2 class="text-center m-3">
                        اضافة الى جهات الاتصال
                </h2>
                @if (!empty($error_message))
                <div class="text-center">
                        <div class="alert alert-danger m-3 text-center" role="alert">
                        {{$error_message}}
                        </div>
                </div>
                @endif
                <div style="direction: rtl; text-align: right;">
                    <form action="/contacts" method="post">
                        {{csrf_field()}}
                                @csrf
                            <!-- Name -->
                            <div class="form-group" >
                                <label for="name">الاسم الكامل:</label><br>
                                <input type="text" name="name" class="form-control" >
                            </div>
                             <!-- Profession -->
                            <div class="form-group">
                                <label for="profession">المهنة:</label><br>
                                <input type="text" name="profession" class="form-control" >
                            </div>
                            <!-- Name -->
                            <div class="form-group">
                                <label for="email">بريد الكتروني:</label><br>
                                <input type="email" name="email" id="exampleInputEmail1" class="form-control">
                            </div>

                            <!-- Phone -->
                             <div class="form-group">
                                <label for="phone">رقم الهاتف:</label><br>
                                <input type="number" name="phone" class="form-control" >
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

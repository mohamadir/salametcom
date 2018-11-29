@extends('layout')

@section('title', 'جمعية سلامتكم')

@section('content')
            <div class="container mt-4">
                <h2 class="text-center m-3">
                    دخول المستخدم
                </h2>
                <div style="direction: rtl; text-align: right;">
                    <form action="/login" method="post">
                        {{csrf_field()}}
                                @csrf
                            <div class="form-group" >
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الالكتروني">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                            </div>
                            <div class="text-center" >
                            <button type="submit" class="mt-3 btn btn-primary btn-w">تسجيل الدخول</button>
                            </div>
                            @if (!empty($error))
                                <div class="alert alert-danger m-3 text-center" role="alert">
                                {{$error}}
                                </div>
                            @endif
                    </form>
                    <div class="text-center mt-5">
                        <h5>ليس لديك حساب؟ <a href="/register" class="font-weight-bold" >تسجيل</a></h5>
                    </div>

            </div>
@endsection

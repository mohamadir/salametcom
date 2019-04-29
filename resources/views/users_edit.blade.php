@extends('layout')

@section('title', 'مساعدات')

@section('content')

<div>
   <div style="background: white;">
    <h3 style="text-align: center;" class="mt-3"> تعديل المستخدم</h3>
    <form class="flex-column" style="background: white; text-align: right; direction: rtl;" method="post" action="/users/edit/{{$user2->id}}" >
    @csrf

     @if (!empty($error))
    <div class="alert alert-danger m-3 text-center" role="alert">
        {{$error}}
        </div>
    @endif

    <div class="form-group" >
        <label for="patient">الاسم: </label>
        <input type="text" class="form-control" value="{{$user2->name}}" name="name" id="patient"  placeholder="">
    </div>

    <div class="form-group" >
        <label for="patient">ايمل: </label>
        <input type="text" class="form-control" value="{{$user2->email}}" name="email" id="patient"  placeholder="">
    </div>

    <div class="form-group" >
        <label for="patient">باسسورد: </label>
        <input type="text" class="form-control" value="{{$user2->password}}" name="password" id="patient"  placeholder="">
    </div>

    <div class="form-group" >
        <label for="patient">رقم الهاتف: </label>
        <input type="text" class="form-control" value="{{$user2->phone}}" name="phone" id="patient"  placeholder="">
    </div>

    <div class="form-group" >
        <label for="patient">المنطقة: </label>
        <input type="text" class="form-control" value="{{$user2->area}}" name="area" id="patient"  placeholder="">
    </div>


    <div style="width: 100%; text-align: center;" class="mb-3">
      <button type="submit" class="btn btn-primary" >حفظ</button>
    </div>
</form>
</div>
</div>
@endsection

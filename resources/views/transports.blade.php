@extends('layout')

@section('title', 'توصيلات')

@section('content')

<div style="background: white;">
    <form class="flex-column" style="background: white; text-align: right; direction: rtl;" action="/transports" method="post">
    @csrf
    <h3 style="text-align: center;" class="mt-5">التوصيلات</h3>
    <div class="form-group" >
        <label for="from">توصيل من: </label>
        @if(!empty($from))
        <input type="text" class="form-control" value="{{$from}}" id="exampleInputEmail1"  name="from" aria-describedby="emailHelp" placeholder="قلنديا, حزمة...الخ">
        @else
        <input type="text" class="form-control"  id="exampleInputEmail1"  name="from" aria-describedby="emailHelp" placeholder="قلنديا, حزمة...الخ">
        @endif
    </div>
    @if (!empty($from_error))
        <div class="alert alert-danger m-3 text-center" role="alert">
        {{$from_error}}
        </div>
    @endif
    <div class="form-group" >
        <label for="to">توصيل الى: </label>
        @if(!empty($to))
        <input type="text" class="form-control" name="to" value="{{$to}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="القدس, بيت حنينا.. الخ">
        @else
        <input type="text" class="form-control" name="to"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="القدس, بيت حنينا.. الخ">
        @endif
    </div>
    @if (!empty($to_error))
        <div class="alert alert-danger m-3 text-center" role="alert">
        {{$to_error}}
        </div>
    @endif
    <div class="form-group" >
        <label for="people">عدد الاشخاص:</label>
        @if(!empty($people))
        <input type="number" class="form-control" value="{{$people}}" name="people" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
        @else
        <input type="number" class="form-control" name="people" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
        @endif
    </div>
    @if (!empty($people_error))
        <div class="alert alert-danger m-3 text-center" role="alert">
        {{$people_error}}
        </div>
    @endif
    <div class="form-group" >
        <label for="price_share">مساعدة بمبلغ</label>
        @if(!empty($price_share))
        <input type="number" class="form-control" name="price_share" value="{{$price_share}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
        @else
        <input type="number" class="form-control" name="price_share"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
        @endif
    </div>
    <div class="form-group">
        <label for="driver">السائق: </label>
        <select class="form-control" name="driver" id="exampleSelect1">
        @auth
        <option value="{{$user->name}}"  >أنا ( {{$user->name}} )</option>
        @endauth
        @guest
        <option>أنا </option>
        @endguest
        <option value="driver">تاكسي</option>
         </select>
    </div>
    <div style="width: 100%; text-align: center;" class="mb-3">
      <button type="submit" class="btn btn-primary btn-w" style="background: red; align-self: center;">تسجيل</button>
    </div>
</form>
</div>
@endsection


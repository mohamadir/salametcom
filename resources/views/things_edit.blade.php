@extends('layout')

@section('title', 'تعديل')

@section('content')

<div>
   <div style="background: white;">
    <h3 style="text-align: center;" class="mt-3"> تعديل </h3>
    <form class="flex-column" style="background: white; text-align: right; direction: rtl;" method="post" action="/things/edit/{{$thing->id}}" >
    @csrf

     @if (!empty($error))
    <div class="alert alert-danger m-3 text-center" role="alert">
        {{$error}}
        </div>
    @endif

    <div class="form-group" >
        <label for="patient">نوع الغرض: </label>
        <input type="text" class="form-control" value="{{$thing->type}}" name="type" id="patient"  placeholder="">
    </div>

    <div class="form-group" >
        <label for="quantity">الكميّة: </label>
        <input type="number" class="form-control" value="{{$thing->quantity}}" name="quantity" id="patient"  placeholder="">
    </div>

    <div class="form-group" >
        <label for="description">تفاصيل: </label>
        <input type="text" class="form-control" value="{{$thing->description}}" name="description" id="patient"  placeholder="">
    </div>


    <div style="width: 100%; text-align: center;" class="mb-3">
      <button type="submit" class="btn btn-primary" >حفظ</button>
    </div>
</form>
</div>
</div>


@endsection

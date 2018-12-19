@extends('layout')

@section('title', 'المخزن')

@section('content')
<div>
   <div style="background: white;">
    <h3 style="text-align: center;" class="mt-3">المخزن</h3>
        @if (!empty($error))
        <div class="alert alert-danger m-3 text-center" role="alert">
               {{$error}}
        </div>
     @endif
    <form class="flex-column" style="background: white; text-align: right; direction: rtl;" method="post" action="/things" >
    @csrf


    <div class="form-group" >
        <label for="type">اسم الغرض: </label>
        <input type="text" class="form-control" name="type" id="type"  placeholder="">
    </div>



     <div class="form-group" >
        <label for="quantity">الكمية: </label>
        <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
    </div>

    <div class="form-group" >
        <label for="description"></label>ملاحظات</span></label>
        <input type="text" class="form-control" name="description" id="hospital" aria-describedby="emailHelp" placeholder="">
    </div>


    <div style="width: 100%; text-align: center;" class="mb-3">
      <button type="submit" class="btn btn-primary" >حفظ</button>
    </div>
</form>
</div>
</div>

@endsection

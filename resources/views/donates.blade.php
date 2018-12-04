@extends('layout')

@section('title', 'تبرعات عينية')

@section('content')
<div>
   <div style="background: white;">
    <h3 style="text-align: center;" class="mt-3">تبرعات</h3>
    <form class="flex-column" style="background: white; text-align: right; direction: rtl;" method="post" action="/donates" >
    @csrf
    <div class="form-group" >
        <label for="donor_name">اسم المتبرع: </label>
        <input type="text" class="form-control" name="donor_name" id="donor_name"  placeholder="">
    </div>
    @if (!empty($donor_name_error))
        <div class="alert alert-danger m-3 text-center" role="alert">
        {{$donor_name_error}}
        </div>
    @endif

     <div class="form-group" >
        <label for="donate_type">التبرع بـ : </label>
        <input type="text" class="form-control" name="donate_type" id="patient"  placeholder="">
    </div>
    @if (!empty($donate_type_error))
        <div class="alert alert-danger m-3 text-center" role="alert">
        {{$donate_type_error}}
        </div>
    @endif

    <div class="form-group" >
        <label for="description"></label>ملاحظات</span></label>
        <input type="text" class="form-control" name="description" id="hospital" aria-describedby="emailHelp" placeholder="">
    </div>


    <div style="width: 100%; text-align: center;" class="mb-3">
      <button type="submit" class="btn btn-primary" >تسجيل</button>
    </div>
</form>
</div>
</div>
@endsection

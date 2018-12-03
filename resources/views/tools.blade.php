@extends('layout')

@section('title', 'اجهزة')

@section('content')
<div>
   <div style="background: white;">
    <h3 style="text-align: center;" class="mt-3">شراء أجهزة</h3>
    <form class="flex-column" style="background: white; text-align: right; direction: rtl;" method="post" action="/tools" >
    @csrf
    <div class="form-group" >
        <label for="patient">اسم المريض: </label>
        <input type="text" class="form-control" name="patient" id="patient"  placeholder="">
    </div>
    @if (!empty($patient_error))
        <div class="alert alert-danger m-3 text-center" role="alert">
        {{$patient_error}}
        </div>
    @endif

     <div class="form-group" >
        <label for="tool">اسم الجهاز: </label>
        <input type="text" class="form-control" name="tool" id="patient"  placeholder="">
    </div>
    @if (!empty($tool_error))
        <div class="alert alert-danger m-3 text-center" role="alert">
        {{$tool_error}}
        </div>
    @endif

     <div class="form-group" >
        <label for="patient_phone">رقم الهاتف: </label>
        <input type="number" class="form-control" name="patient_phone" id="patient_phone" aria-describedby="emailHelp" placeholder="05555555555">
    </div>
  
    <div class="form-group" >
        <label for="hospital">اسم المستشفى: </label>
        <input type="text" class="form-control" name="hospital" id="hospital" aria-describedby="emailHelp" placeholder="">
    </div>
    
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

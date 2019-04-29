@extends('layout')

@section('title', 'مساعدات')

@section('content')

<div>
   <div style="background: white;">
    <h3 style="text-align: center;" class="mt-3">المساعدات</h3>
    <form class="flex-column" style="background: white; text-align: right; direction: rtl;" method="post" action="/helps" >
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
        <label for="patient_phone">رقم الهاتف: </label>
        <input type="number" class="form-control" name="patient_phone" id="patient_phone" aria-describedby="emailHelp" placeholder="05555555555">
    </div>
  
    <div class="form-group" >
        <label for="hospital">اسم المستشفى: </label>
        <input type="text" class="form-control" name="hospital" id="hospital" aria-describedby="emailHelp" placeholder="">
    </div>
    
    <div class="form-group">
        <label for="exampleSelect1">نوع المساعدة: </label>
        <select class="form-control" name="help_type" id="exampleSelect1">
        <option value="جهاز طبّي">جهاز طبّي</option>
        <option value="دواء">دواء</option>
        <option value="مساهمة في تكلفة الفحص">مساهمة في تكلفة الفحص</option>
        <option value="اغراض شخصية">اغراض شخصية</option>
        <option value="اَخر">اَخر</option>
        </select>
    </div>

     <div class="form-group" >
        <label for="description">ملاحظات عن نوع المساعدة *اختياري</span></label>
        <input type="text" class="form-control" name="description" id="hospital" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
        <label for="exampleSelect1">بطلب من: </label>
        <select class="form-control" name="asked_from" id="exampleSelect1">
        <option value="طاقم اجتماعي" >طاقم اجتماعي</option>
        <option value="طاقم اداري" >طاقم اداري</option>
        <option value="طاقم طبي" >طاقم طبي</option>
        <option value="مريض" >مريض</option>
        </select>
    </div>


     <div class="form-group" >
        <label for="exampleInputEmail1">مشاركة في الدفع بمبلغ:</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
    </div>

    <div style="width: 100%; text-align: center;" class="mb-3">
      <button type="submit" class="btn btn-primary" >تسجيل</button>
    </div>
</form>
</div>
</div>
@endsection

@extends('layout')

@section('title', 'مساعدات')

@section('content')

<div>
   <div style="background: white;">
    <h3 style="text-align: center;" class="mt-3">المساعدات</h3>
    <form class="flex-column" style="background: white; text-align: right; direction: rtl;" >
     <div class="form-group" >
        <label for="exampleInputEmail1">مشاركة في الدفع بمبلغ:</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
    </div>
    <div class="form-group" >
        <label for="exampleInputEmail1">اسم المريض: </label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    </div>
    <div class="form-group" >
        <label for="exampleInputEmail1">اسم المستشفى: </label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    </div>

    <div class="form-group">
        <label for="exampleSelect1">نوع المساعدة: </label>
        <select class="form-control" id="exampleSelect1">
        <option>جهاز طبّي</option>
        <option>دواء</option>
        <option>مساهمة في تكلفة الفحص</option>
        <option>اغراض شخصية</option>
        <option>اَخر</option>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleSelect1">بطلب من: </label>
        <select class="form-control" id="exampleSelect1">
        <option>طاقم اجتماعي</option>
        <option>طاقم اداري</option>
        <option>طاقم طبي</option>
        <option>مريض</option>
        </select>
    </div>
    <!-- <div class="form-group">
        <label for="exampleSelect2">Example multiple select</label>
        <select multiple class="form-control" id="exampleSelect2">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        </select>
    </div> -->
    <div style="width: 100%; text-align: center;" class="mb-3">
      <button type="submit" class="btn btn-primary" style="background: red; align-self: center;">Submit</button>
    </div>
</form>
</div>
</div>
@endsection

@extends('layout')

@section('title', 'توصيلات')

@section('content')

<div style="background: white;">
    <form class="flex-column" style="background: white; text-align: right; direction: rtl;" >
    <h3 style="text-align: center;" class="mt-5">التوصيلات</h3>
    <div class="form-group" >
        <label for="exampleInputEmail1">توصيل من: </label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="القدس, بيت حنينا.. الخ">
        <small id="emailHelp" class="form-text text-muted">الرجاء كتابة المكان بشكل صحيح</small>
    </div>
    <div class="form-group" >
        <label for="exampleInputEmail1">توصيل الى: </label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="القدس, بيت حنينا.. الخ">
        <small id="emailHelp" class="form-text text-muted">الرجاء كتابة المكان بشكل صحيح</small>
    </div>
    <div class="form-group" >
        <label for="exampleInputEmail1">عدد الاشخاص:</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
    </div>
    <div class="form-group">
        <label for="exampleSelect1">السائق: </label>
        <select class="form-control" id="exampleSelect1">
        <option>أنا</option>
        <option>تاكسي</option>
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
@endsection

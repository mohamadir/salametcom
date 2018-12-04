@extends('layout')

@section('title', 'احصائيات')

@section('content')
<h3 class="text-center mb-4">
    احصائيات
</h3>
<form class="form-group" action="/statistics" method="post">
@csrf
    <div class="row">
        <div class="col-8">
            <input id="datepicker"  name="from_date" placeholder="yyyy-mm-dd"  />
        </div>
        <div class="col-4 text-center">
            من تاريخ
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <input id="datepicker2" class="mt-5" name="to_date" placeholder="yyyy-mm-dd"  />
        </div>
        <div class="col-4 text-center mt-5">
            حتى تاريخ
        </div>
    </div>
    <div class="row">
        <div class="col-8">
        <div class="form-group mt-5">
                <select class="form-control" name="type" id="exampleSelect1">
                <option value="Help">مساعدات</option>
                <option value="Transport">توصيلات</option>
                <option value="Donate">تبرعات</option>
                <option value="Tool">اجهزة</option>
                </select>
            </div>
        </div>
        <div class="col-4 text-center mt-5">
            نوع البحث
        </div>
    </div>
    <div class="text-center mb-2 mt-2">
    <div class="form-check form-check-inline ">
    <input class="form-check-input" checked type="radio" name="info_type" id="inlineRadio1" value="statistics">
    <label class="form-check-label" for="inlineRadio1">مفصّل</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="info_type" id="inlineRadio2" value="graph">
    <label class="form-check-label"  for="inlineRadio2">رسم بياني</label>
    </div>
    <div class="row mt-2">
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary"> عرض النتائج </button>
        </div>     
    </div>
    
   
</form>

@endsection



@section('script')
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap3',
            format: 'yyyy-mm-dd'
        });
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap3',
            format: 'yyyy-mm-dd'
        });
</script>
@endsection
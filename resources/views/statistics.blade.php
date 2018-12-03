@extends('layout')

@section('title', 'احصائيات')

@section('content')
<h3 class="text-center mb-4">
    احصائيات
</h3>
<form class="form-group">
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
</form>
@endsection



@section('script')
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap3',
            format: 'yyyy-dd-mm'
        });
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap3',
            format: 'yyyy-dd-mm'
        });
    </script>
@endsection
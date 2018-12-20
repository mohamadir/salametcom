@extends('layout')

@section('title', 'توصيلات')

@section('content')

<div style="background: white;">
    <form class="flex-column" style="background: white; text-align: right; direction: rtl;" action="/transports" method="post">
    @csrf
    <h3 style="text-align: center;" class="mt-5">التوصيلات</h3>
      @if (!empty($error_message))
        <div class="alert alert-danger m-3 text-center" role="alert">
        {{$error_message}}
        </div>
    @endif
    <div class="form-group" >
       <!--  <label for="from"></label>
        @if(!empty($from))
        <input type="text" class="form-control" value="{{$from}}" id="exampleInputEmail1"  name="from" aria-describedby="emailHelp" placeholder="قلنديا, حزمة...الخ">
        @else
        <input type="text" class="form-control"  id="exampleInputEmail1"  name="from" aria-describedby="emailHelp" placeholder="قلنديا, حزمة...الخ">
        @endif -->
        <div class="form-group">
            <label for="from">توصيل من:  </label>
            <select class="form-control" id="from" name="from" id="exampleSelect1">
                <option value="قلنديا">قلنديا</option>
                <option value="بيت لحم">بيت لحم</option>
                <option value="هداسا">هداسا</option>
                <option value="المطلع">المطلع</option>
                <option value="المقاصد">المقاصد</option>
                <option value="ايريز"> ايريز</option>
                <option value="تل ابيب"> تل ابيب</option>
                <option value="اخر"> اخر</option>
            </select>
        </div>
    </div>
    <input type="text" id="from-input" class="form-control d-none"  id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="اسم المنطقة">


    <!-- <div class="form-group" >
        <label for="to">توصيل الى: </label>
        @if(!empty($to))
        <input type="text" class="form-control" name="to" value="{{$to}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="القدس, بيت حنينا.. الخ">
        @else
        <input type="text" class="form-control" name="to"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="القدس, بيت حنينا.. الخ">
        @endif
    </div> -->
        <div class="form-group">
            <label for="to">توصيل الى:  </label>
            <select class="form-control" name="to" id="to" id="exampleSelect1">
                <option value="قلنديا">قلنديا</option>
                <option value="بيت لحم">بيت لحم</option>
                <option value="هداسا">هداسا</option>
                <option value="المطلع">المطلع</option>
                <option value="المقاصد">المقاصد</option>
                <option value="ايريز"> ايريز</option>
                <option value="تل ابيب"> تل ابيب</option>
                <option value="اخر"> اخر</option>
            </select>
        </div>
    <input type="text" id="to-input" class="form-control d-none"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="اسم المنطقة">


    <div class="form-group" >
        <label for="people">عدد الاشخاص:</label>
        @if(!empty($people))
        <input type="number" class="form-control" value="{{$people}}" name="people" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
        @else
        <input type="number" class="form-control" name="people" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0">
        @endif
    </div>

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
        <select class="form-control"  name="driver" id="driver">
            <option value="سيارة أجرة">سيارة أجرة</option>
            <option value="متطوع">متطوع</option>
         </select>
    </div>

    <input type="text" id="driver-input" class="form-control d-none"  id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="اسم المتطوع">
    <input type="text" id="cost-input" class="form-control"  name="cost" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="سعر التوصيلة">


    <div style="width: 100%; text-align: center;" class="mb-3">
      <button type="submit" class="btn btn-primary btn-w" style="background: red; align-self: center;">تسجيل</button>
    </div>
</form>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
<script type="text/javascript">
    $(document).ready(function() {

       $('#from').change(function(){
           var value = $(this).val();
           if(value == "اخر"){
               $('#from-input').removeClass("d-none");
               $(this).removeAttr("name")
               $('#from-input').attr("name","from");
            }else{
               $('#from-input').addClass("d-none");
               $(this).attr("name","from");
               $('#from-input').removeAttr("name");
           }
        });


          $('#to').change(function(){
           var value = $(this).val();
           if(value == "اخر"){
               $('#to-input').removeClass("d-none");
               $(this).removeAttr("name")
               $('#to-input').attr("name","to");
            }else{
               $('#to-input').addClass("d-none");
               $(this).attr("name","to");
               $('#to-input').removeAttr("name");
           }
        });


          $('#driver').change(function(){
           var value = $(this).val();
           if(value == "متطوع"){
               $('#driver-input').removeClass("d-none");
               $(this).removeAttr("name")
               $('#driver-input').attr("name","driver");
               $('#cost-input').addClass("d-none");

            }else{
               $('#driver-input').addClass("d-none");
               $('#cost-input').removeClass("d-none");
               $('#cost-input').attr("name","driver");
               $('#driver-input').removeAttr("name");
           }
        });

    });
</script>
@endsection


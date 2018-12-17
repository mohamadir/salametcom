@extends('layout')

@section('title', 'نتائج البحث')

@section('content')

   <h2 class="text-center mt-3"> نتائج البحث</h2>
   <h6 class="text-center mt-3">
    من تاريخ
    <strong>{{$from}}</strong>
    وحتى تاريخ
    <strong>{{$to}}</strong>
   </h6>
   <h6 class="text-center mt-3">
    العدد الكلّي:
    <strong class="text-primary"> {{$count}} </strong>
   </h6>



    <div class="list-group" style="direction: rtl;" >
        @foreach ($results as $result)
            <div class="list-group-item" style="width: 100%;">
                <div class="row"  style=" direction: rtl;">
                    <div class="col-10 text-right mt-3">

                        @if ($type == 3)
                        <h6 class="align-self-right" >
                             {{$result->donate_type}}
                         </h6>
                        @elseif ($type == 2)
                        <h6 class="align-self-right" >
                             {{$result->help_type}}
                         </h6>
                        @elseif ($type == 1)
                        <h6 class="align-self-right" >
                             {{$result->tool}}
                         </h6>
                        @else
                        <h6 class="align-self-right" >
                             {{$result->from}} <strong class="text-primary"> الى </strong> {{$result->to}}
                         </h6>
                        @endif

                    </div>
                    <div class="col-2 text-left d-flex flex-row" style=" direction: ltr;">
                        <div  style=" direction: ltr;">
                            <a  data-toggle="collapse" href="#collapse{{$result->id}}"  class="btn btn-info mt-2 mb-2 ml-1 text-white"> معلومات<i class="far fa-info-alt"></i></a>
                        </div>


                    </div>
                    <div id="collapse{{$result->id}}" class="panel-collapse collapse text-right pr-4">

                         <!-- Donate -->

                         @if ($type == 3)
                            <p>
                                <strong>اسم المتبرع: </strong> {{$result->donor_name}}
                            </p>
                            <p>
                                <strong>رقم الهاتف: </strong> {{$result->phone}}
                            </p>
                            <p>
                                <strong>نوع التبرع : </strong>  {{$result->donate_type}}
                            </p>
                            <p>
                                <strong>ملاحظات: </strong> {{$result->description}}
                            </p>
                           <!-- Help -->
                        @elseif ($type == 2)
                             <p>
                                <strong>المريض : </strong> {{$result->patient}}
                            </p>
                            <p>
                                <strong>مستشفى : </strong>  {{$result->hospital}}
                            </p>
                            <p>
                                <strong>نوع المساعده: </strong> {{$result->help_type}}
                            </p>
                            <p>
                                <strong>ملاحظات : </strong>  {{$result->description}}
                            </p>
                            <p>
                                <strong>هاتف المريض: </strong> {{$result->patient_phone}}
                            </p>
                            <p>
                                <strong>بطلب من : </strong>  {{$result->asked_from}}
                            </p>

                           <!-- Tools -->
                        @elseif ($type == 1)
                             <p>
                                <strong>المريض : </strong> {{$result->patient}}
                            </p>
                            <p>
                                <strong>مستشفى : </strong>  {{$result->hospital}}
                            </p>
                            <p>
                                <strong>الجهاز : </strong> {{$result->tool}}
                            </p>
                            <p>
                                <strong>ملاحظات : </strong>  {{$result->description}}
                            </p>
                            <p>
                                <strong>هاتف المريض: </strong> {{$result->patient_phone}}
                            </p>
                            <!-- Transport -->
                        @else
                           <p>
                                <strong>من : </strong> {{$result->from}}
                            </p>
                            <p>
                                <strong>الى : </strong>  {{$result->to}}
                            </p>
                            <p>
                                <strong>عدد الاشخاص: </strong> {{$result->people}}
                            </p>
                            <p>
                                <strong>السائق : </strong>  {{$result->driver}}
                            </p>
                            <p>
                                <strong>مساعدة بمبلغ: </strong> {{$result->price_share}}
                            </p>
                        @endif
                             <p>
                                <strong> الزمان:  </strong> <strong style="color: green;">  {{$result->created_at}}  </strong>
                            </p>

                    </div>

                </div>
            </div>

        @endforeach
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".delete").on("submit", function(){
            return confirm("هل تريد حذف هذا الشخص؟");
        });
    });
</script>

@endsection

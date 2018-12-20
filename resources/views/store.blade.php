@extends('layout')

@section('title', 'المخزن')

@section('content')
    <h2 class="text-center mt-3"> المخزن </h2>
    <div class="input-group md-form form-sm form-1 pl-0 mb-2" >
        <form method="get" action="/store" class="d-flex flex-row w-100 mb-1">
            <button type="submit" class="btn btn-primary">
                بحث
             </button>
            <input class="form-control my-0 py-1 text-right" name="search" type="text" placeholder="بحث حسب الاسم" aria-label="Search">
        </form>
     </div>
        <a class="btn btn-success w-100" style="" href="/add_things">  اضافة <i class="fas fa-plus ml-1"></i>  </a>

    <div class="list-group mt-2" style="direction: rtl;" >
        @foreach ($things as $thing)
            <div class="list-group-item" style="width: 100%;">
                <div class="row"  style=" direction: rtl;">
                    <div class="col-10 text-right mt-3">
                                <h6 class="align-self-right" >{{$thing->type}} </h6>

                                            </div>
                    <div class="col-2 text-left d-flex flex-row" style=" direction: ltr;">

                        <div  style=" direction: ltr;">
                            <a  data-toggle="collapse" href="#collapse{{$thing->id}}"  class="btn btn-info mt-2 mb-2 mr-1 text-white"> تفاصيل<i class="far fa-info-alt"></i></a>
                        </div>



                    </div>
                    <div id="collapse{{$thing->id}}" class="panel-collapse collapse text-right pr-4">
                        <p>
                           <strong>الغرض: </strong> {{$thing->type}}
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-6  text-right mt-3">
                                    <strong class="text-center mt-3">الكمية: </strong>
                                </div>
                                 <div class="col-1">
                                    <form action="/things/dec/{{$thing->id}}" class="dec mb-2 mt-2" method="post"  style=" direction: ltr;">
                                        {{ csrf_field() }}
                                        <button type="submit"  class="btn btn-primary">-</i></button>
                                    </form>
                                </div>
                                <div class="col-2 text-center mt-3 ml-4" >
                                    <strong class="text-center "> {{$thing->quantity}}  </strong>
                                </div>
                                <div class="col-1">
                                  <form action="/things/inc/{{$thing->id}}" class="inc mb-2 mt-2" method="post"  style=" direction: ltr;">
                                    {{ csrf_field() }}
                                    <button type="submit"  class="btn btn-primary">+</i></button>
                                    </form>
                                </div>
                            </div>





                        </p>
                        <p>
                             @if (!empty($thing->description))
                            <strong>تفاصيل: </strong> {{$thing->description}}
                            @else
                            <strong>تفاصيل: </strong> ----
                            @endif

                        </p>
                    </div>

                </div>
            </div>

        @endforeach
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
<script type="text/javascript">
    $(document).ready(function() {

        $(".inc").on("submit", function(){
            return confirm("هل تريد زيادة العدد؟");
        });
        $(".dec").on("submit", function(){
            return confirm("هل تريد تنقيص العدد؟");
        });

    });
</script>

@endsection






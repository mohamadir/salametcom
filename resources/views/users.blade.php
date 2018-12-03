@extends('layout')

@section('title', 'تبرعات عينية')

@section('content')
    <h2 class="text-center mt-3"> المستخدمين</h2>
    <div class="input-group md-form form-sm form-1 pl-0 mb-2" >
        <form method="get" action="/users" class="d-flex flex-row w-100">
            <button type="submit" class="btn btn-primary">
                بحث
             </button>
            <input class="form-control my-0 py-1 text-right" name="search" type="text" placeholder="بحث حسب الاسم" aria-label="Search">
        </form>
     </div>


    <div class="list-group" style="direction: rtl;" >
        @foreach ($users as $user)
            <div class="list-group-item" style="width: 100%;">
                <div class="row"  style=" direction: rtl;">
                    <div class="col-10 text-right mt-3">
                        <h6 class="align-self-right" >{{$user->name}}</h6>  
                    </div>
                    <div class="col-2 text-left d-flex flex-row" style=" direction: ltr;">
                        <form action="/delete/{{$user->id}}" class="delete mb-2 mt-2" method="post"  style=" direction: ltr;">
                        {{ csrf_field() }}
                          <button type="submit"  class="btn btn-primary"><i class="far fa-trash-alt"></i></button>
                        </form> 
                        <div  style=" direction: ltr;">
                            <a  data-toggle="collapse" href="#collapse{{$user->id}}"  class="btn btn-info mt-2 mb-2 ml-1 text-white"> معلومات<i class="far fa-info-alt"></i></a>
                        </div>

                        
                    </div>
                    <div id="collapse{{$user->id}}" class="panel-collapse collapse text-right pr-4">
                        <p>
                             <strong>ايمل: </strong> <a href="mailto://{{$user->email}}"> {{$user->email}} </a>
                        </p>
                        <p>
                            <strong>هاتف: </strong>  <a href="tel://{{$user->email}}"> {{$user->phone}} </a>
                        </p>
                        <p>
                            <strong>المنطقة: </strong> {{$user->area}}
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






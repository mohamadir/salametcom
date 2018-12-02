@extends('layout')

@section('title', 'تبرعات عينية')

@section('content')
    <h2 class="text-center mt-3"> المستخدمين</h2>
   
    <div class="list-group" style="direction: rtl;" >
        @foreach ($users as $user)
            <div class="list-group-item" style="width: 100%;">
                <div class="row">
                    <div class="col-6 text-right mt-3">
                        <h6 class="align-self-right" >{{$user->name}}</h6>  
                    </div>
                    <div class="col-6 text-left d-flex flex-row" style=" direction: ltr;">
                        <form action="/delete/{{$user->id}}" class="m-2" method="post">
                          <button type="submit" class="btn btn-primary"><i class="far fa-trash-alt"></i></button>
                        </form> 
                    </div>
                       

                </div>
            </div>
          
        @endforeach
    </div>    


@endsection




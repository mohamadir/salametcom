@extends('layout')

@section('title', 'احصائيات')

@section('content')

@endsection

<h2 class="mt-3 mb-5 text-center"> رسم بياني</h2>

<h6 class="text-center mb-3">
    من تاريخ
    <strong style="color: green;">{{$from}}</strong>
    وحتى تاريخ 
    <strong style="color: green;">{{$to}}</strong>
</h6>

<canvas id="myChart" data-donate="{{$donate}}" data-transport="{{$transport}}" data-help = "{{$help}}" data-tool="{{$tool}}"></canvas>


@section('script')
<script>
var ctx = document.getElementById('myChart').getContext('2d');


            var charts = document.querySelector('#myChart');
            var help = charts.dataset.help;
            var donate = charts.dataset.donate;
            var transport = charts.dataset.transport;
            var tool = charts.dataset.tool;


            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'doughnut',

                // The data for our dataset
                data: {
                    labels: ["مساعدات", "شراء اجهزة" , "توصيلات", "تبرعات"],
                    datasets: [{
                        label: "My First dataset",
                        backgroundColor: ['#ee0000','#178ae5','#3ede04','#04625d'],
                        data: [help, tool, transport, donate],
                    }]
                },

                // Configuration options go here
                options: {}
            }); 
</script>
@endsection
@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
          </div>
                <div class="panel-body">
                  <div class="card">
              <div class="card-content">
                <h3 class='center' >Gráficos</h3>
                <div class="row">
                  
                  @if (isset($meta))
                  <div class="row">
                    <div class="col s12">
                      <ul class="tabs">
                        <li class="tab col s6"><a class="active" href="#test1">Meta x Realizado</a></li>
                        <li class="tab col s6"><a href="#test3">Aberto x Finalizado</a></li>
                      </ul>
                    </div>
                    <div id="test1" class="col col s8 offset-s2">
                        <div id="Bar"></div>
                    </div>
                    <div id="test3" class="col col s8 offset-s2">
                      <div id="chart"></div>
                    </div>
                  
                  </div>
                  @else
                        Não há Safra ou metas vigente
                  @endif
                </div>
              </div>
                </div>
                </div>
            </div>
        </div>        
</div>
</div>
    <script type="text/javascript">

        var options = {
          chart: {
                type: 'donut',
                size: '10%'
            },
            labels: <?php echo(json_encode($meta[0])) ?>,
            series: <?php echo(json_encode($meta[1],JSON_NUMERIC_CHECK)) ?>
            
            }
        
          var chart = new ApexCharts(
            document.querySelector("#chart"),
            options
        );

        var GrupoBarra = {
            chart: {
                height: 430,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    dataLabels: {
                        position: 'top',
                },
            }  
            },
            dataLabels: {
                enabled: true,
                offsetX: -6,
                style: {
                    fontSize: '12px',
                    colors: ['#fff']
                }
            },
            stroke: {
                show: true,
                width: 1,
                colors: ['#fff']
            },
            series: [{
                name: "Meta",
                data: <?php echo(json_encode($dados[1],JSON_NUMERIC_CHECK)) ?>
            },{
                name: "Apontado",
                data: <?php echo(json_encode($dados[2],JSON_NUMERIC_CHECK)) ?>
            }],
            xaxis: {
                categories: <?php echo(json_encode($dados[0])) ?>,
            },
           
        }
    

       var Barra = new ApexCharts(document.querySelector("#Bar"),GrupoBarra);
        
        chart.render();
        Barra.render();


    </script>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lak Derana - Dashboard</title>
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/card.css">

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});
  
        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);
  
        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Months');
          data.addColumn('number', 'Sales');
          data.addRows([
          @php 
          foreach($sales as $order){ 
              echo "['".$order->month."', ".$order->total_sale."],";}
         
          @endphp
          
           
          ]);
  
          // Set chart options
          
          var options = {title: 'Monthly Selling (LKR)'}; 
          
          // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }

        google.charts.setOnLoadCallback(drawChart1);
        function drawChart1() {
          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Name');
          data.addColumn('number', 'Count');
          data.addRows([
          @php 
          foreach($mostsold as $topsale){ 
              echo "['".$topsale->item_id."', ".$topsale->magnitude."],";}
         
          @endphp
          
           
          ]);
  
          // Set chart options
          
          var options = {title: 'Top Sold item'}; 
          
          // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.PieChart(document.getElementById('pie'));
          chart.draw(data, options);
        }


      </script>
</head>
<body>
    @include('include.logo')

    @include('include.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Last month Income</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    @foreach($lasttmonthincome as $datas)
                                    <p style="font-size:60%;">LKR {{$datas->total}}.00</p>
                                    @endforeach
                                </h2>
                            </div>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Last month outcome</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                   @foreach ($lasttmonthOutcome as $datas)
                                    <p style="font-size:60%;">LKR {{$datas->total}}.00</p>
                                   @endforeach
                                </h2>
                            </div>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">This month income</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-12">
                                <h2 class="d-flex align-items-center mb-0">
                                    @foreach($thismonthincome as $datas)
                                   <p style="font-size:60%;">LKR {{$datas->total}}.00</p>
                                   @endforeach
                                </h2>
                            </div>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">this month outcome</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    @foreach ($thismonthOutcome as $datas)
                                    <p style="font-size:60%;">LKR.{{$datas->total}}.00</p>
                                    @endforeach
                                </h2>
                            </div>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6">
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Monthly sales report</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <a href="/monthly-report"><i class="fa fa-print fa-2x text-light" aria-hidden="true"></i></a>
                                </h2>
                            </div>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6">
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Inventory</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <a href="/barinventory"><i class="fa fa-print fa-2x text-light" aria-hidden="true"></i></a>
                                </h2>
                            </div>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6">
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Most sold items</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <a href="/most-sold"><i class="fa fa-print fa-2x text-light" aria-hidden="true"></i></a>
                                </h2>
                            </div>
                        </div>
                        <div class="progress mt-1 " data-height="8" style="height: 8px;">
                            <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="width:100%; margin-top:25px;" id="chart_div"></div>    
            </div>
        </div>
    </div>
<hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="width:100%; margin-top:25px;" id="pie"></div>    
            </div>
        </div>
    </div>

</body>
</html>
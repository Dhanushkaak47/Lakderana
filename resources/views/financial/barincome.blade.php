<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lak Derana</title>
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
          foreach($outcomes as $order){ 
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
          data.addColumn('string', 'Months');
          data.addColumn('number', 'Sales');
          data.addRows([
          @php 
          foreach($income as $orders){ 
              echo "['".$orders->month."', ".$orders->total_sale."],";}
         
          @endphp
          
           
          ]);
  
          // Set chart options
          
          var options = {title: 'Monthly Selling (LKR)'}; 
          
          // Instantiate and draw our chart, passing in some options.
          var chart = new google.visualization.ColumnChart(document.getElementById('pie'));
          chart.draw(data, options);
        }


      </script>

</head>
<body style="background: rgb(25,69,157);">
    @include('include.logo')

    @include('include.financialNavbar')

    <div class="container-fluid mt-5 text-light font-weight-bold">
        <div class="row">
            <div class="col-md-6">
                <h3>Outcomes</h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="width:100%; margin-top:25px;" id="chart_div"></div>    
                        </div>
                    </div>
                </div>
            <hr>
    
            </div>
            <div class="col-md-6">
                <h3>Incomes</h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="width:100%; margin-top:25px;" id="pie"></div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>No.</th>
                            <th>Liquor name</th>
                            <th>Quantity</th>
                            <th>Unit price (LKR)</th>
                            <th>Total (LKR)</th>
                            <th>Date and time</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        @foreach ($barsales as $datas)
                        <tr>
                        <td>{{$datas->id}}</td>
                        <td>{{$datas->itemName}}</td>
                        <td>{{$datas->qty}}</td>
                        <td style="text-align: right;">{{$datas->unit_price}}.00</td>
                        <td style="text-align: right;">{{$datas->line_total}}.00</td>
                        <td>{{$datas->created_at}}</td>
                        </tr>
                        @endforeach
                </table>   
            </div>
        </div>
    </div>

</body>
</html>
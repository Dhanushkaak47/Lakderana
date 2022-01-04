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
</head>
<body>
    @include('include.logo')

    @include('include.custnav')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title text-center font-weight-bold">Payments Hadeling</h3>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
             <table class="table">
                 <thead class="thead-dark">
                   <tr>
                     <th scope="col">#Reservation ID</th>
                     <th scope="col">Customer ID</th>
                     <th scope="col">Full name</th>
                     <th scope="col">Contact Number</th>
                     <th></th>
                   </tr>
                 </thead>
                 <tbody>
                 @foreach($data as $serveddata)
                   <tr>
                     <th scope="row">#{{$serveddata->id}}</th>
                     <td>{{$serveddata->cus_id}}</td>
                     <td>{{$serveddata->cus_full_name}}</td>
                     <td>{{$serveddata->mobile}}</td>
                     <td><a href="/viewpayslip/{{$serveddata->id}}/{{$serveddata->roomNo}}" class="btn btn-success">View</a></td>
                   </tr>
                 @endforeach
                 </tbody>
               </table>
            </div>
        </div>
    </div>

</body>
</html>
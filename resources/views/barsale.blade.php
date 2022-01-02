<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bar sale</title>
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/card.css">
</head>
<body>
    @include('include.logo')

    @include('include.navbar')

    <div class="container-fluid">
        <div class="card">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="text-center mt-5">Liquor Sales</h3>
                        <hr>
                    </div>
                </div>
                <div class="row justify-content-center mb-5">
                    
                    <div class="col-md-8">
                        <div class="input-group">
                                <input type="search" class="form-control rounded" name="Search" placeholder="Search" aria-label="Search"
                                aria-describedby="search-addon" />
                            <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i></button>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            @foreach($baritem as $datas)
            <div class="col-md-2">
                
                    <div class="card" style="height: 100%;">
                        <div class="card-header">
                            <p class="font-weight-bold text-center" style="font-size:90%;">{{$datas->itemName}}</p>
                        </div>
                        <div class="card-body">
                            <img src="{{asset('barpic/'.(($datas->picture)))}}" style="max-width:100%; height:100%;" alt="">  
                        </div>
                        @if ($datas->qty==0)
                            <a href="#" style="text-decoration:none;">
                            <div class="card-footer text-center bg-danger text-light font-weight-bold">
                                LKR {{$datas->sellprice}}.00
                                <p style="font-size:70%;">Quantity {{$datas->qty}}</p>
                            </div>
                            </a>
                        @else
                            <a href="/liqorview/{{$datas->id}}" style="text-decoration:none;">
                            <div class="card-footer text-center bg-success text-light font-weight-bold">
                                LKR {{$datas->sellprice}}.00
                                <p style="font-size:70%;">Quantity {{$datas->qty}}</p>
                            </div>
                        </a>
                        @endif
                    </div>
                
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
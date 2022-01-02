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
                <div class="col-md-5">
                    <div class="card">
                        <img src="{{asset('barpic/'.(($datas->picture)))}}" style="max-width:100%; height:100%;" alt="">  
                    </div>
                </div>
                <div class="col-md-7">
                    <form action="/salesliq" method="post">
                        @csrf
                        
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Successfully</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <h3 class="text-uppercase font-weight-bold">{{$datas->itemName}}</h3>
                        <h5 class="text-danger font-weight-bold">LKR {{$datas->sellprice}}.00</h5>
                        @if ($datas->qty != 0)
                        <p class="font-weight-bold">Quantity available: {{$datas->qty}} <i class="fa fa-check text-success" aria-hidden="true"></i></p>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" name="qty" id="qty" class="form-control" placeholder="Quantity" min="0" max="{{$datas->qty}}" onchange="getTot()">
                                <input type="hidden" name="itemprice" id="itemprice" value="{{$datas->sellprice}}">
                                <input type="hidden" name="linetotal" id="demo">
                                <input type="hidden" name="itemID" id="itemID" value="{{$datas->id}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="cid" id="cid" class="form-control" placeholder="Customer ID">
                            </div>
                            <div class="col-md-6">
                                <input type="submit" value="Confirm" class="btn btn-success font-weight-bold mt-3 btn-block">
                            </div>
                        </div>
                        @else
                        <div class="card bg-danger">
                            <p class="text-light mt-2 mb-2 text-center">not available</p>
                        </div>
                        @endif 
                        <p class=" mt-5">{{$datas->description}} <i class="fa fa-check text-success" aria-hidden="true"></i></p>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <script>

        getTot = function() {
    
        let text1 = document.getElementById("itemprice").value
    
        let text2 = document.getElementById("qty").value
    
        let result = text1 * text2;
    
        
    
        document.getElementById("demo").value = result;
    
        }
    
        </script>
</body>
</html>
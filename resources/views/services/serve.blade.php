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

    @include('include.rsnav')

   <div class="container mt-5">
    <div class="row">
        <div class="col">
            <h3 class="text-center font-weight-bold text-uppercase mb-2">Service for Room no : {{$roomno}}</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
          @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Served Successfully</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
        </div>
      </div>
    <form action="/res_service" method="post">
        @csrf
        <div class="row">
            
                <div class="col-md-4">
                    <label class="font-weight-bold" for="">Reservation Number</label>
                    <input type="text" name="rsid" id="rsid" class="form-control" value="{{$id}}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="font-weight-bold" for="">Needed Service</label>
                    <select name="service" id="service" class="form-control">
                        <option value="">Select</option>
                        @foreach($service as $serve)
                        <option value="{{$serve->id}}">{{$serve->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1">
                    <label class="font-weight-bold" for="">QTY</label>
                    <input type="number" name="qty" id="qty" class="form-control">
                </div>
                <div class="col-md-1">
                    <label class="font-weight-bold" for=""></label>
                    <input type="submit" value="Serve" class="btn btn-primary btn-block mt-2">
                </div>
            
        </div>
    </form>
   </div>
   
   <div class="container mt-3">
       <div class="row">
           <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#serve ID</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Unit Price (LKR)</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total (LKR)</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($served as $serveddata)
                  <tr>
                    <th scope="row">#{{$serveddata->id}}</th>
                    <td>{{$serveddata->name}}</td>
                    <td>{{$serveddata->price}}.00</td>
                    <td>{{$serveddata->qty}}</td>
                    <td>{{$serveddata->qty*$serveddata->price}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
           </div>
       </div>
   </div>

   


</body>
</html>
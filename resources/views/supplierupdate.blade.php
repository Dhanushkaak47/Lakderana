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
<body style="background: rgb(25,69,157);">
    @include('include.logo')

    @include('include.navbar')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center text-light font-weight-bold text-uppercase">Suppliers Management</h3><hr>
            </div>
        </div>
    </div>

    <div class="container mt-2 text-light font-weight-bold">
        <form action="/savesuppdata" method="post">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <label for="">First name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" value="{{$data->firstname}}">
                    <input type="hidden" name="id" id="id" class="form-control" value="{{$data->id}}">
                </div>
                <div class="col-md-6">
                    <label for="">Last name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" value="{{$data->lastname}}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <label for="">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control" placeholder="First Name" value="{{$data->contact_No}}">
                </div>
                <div class="col-md-4">
                    <label for="">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Last Name" value="{{$data->email}}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-7">
                    <label for="">Company Name</label>
                    <input type="text" name="comname" id="comname" class="form-control" placeholder="First Name" value="{{$data->companyname}}">
                </div>
            </div>
    
            <div class="row mt-4">
                <div class="col-md-4">
                    <input type="submit" value="Save" class="btn btn-success btn-block">
                </div>
            </div>
        </form>
    </div>
       
</body>
</html>
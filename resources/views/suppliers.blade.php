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

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <table class="table bg-light">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#_iD</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Contact no.</th>
                        <th scope="col">Email</th>
                        <th scope="col">Company</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $datas)
                      @if($datas->status)
                      <tr>
                        <th scope="row">{{$datas->id}}</th>
                        <td>{{$datas->firstname}}</td>
                        <td>{{$datas->lastname}}</td>
                        <td>{{$datas->contact_No}}</td>
                        <td>{{$datas->email}}</td>
                        <td>{{$datas->companyname}}</td>
                        <td><a href="/supplierUpd/{{$datas->id}}"><i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i></a></td>
                        <td><a href="/supplierBan/{{$datas->id}}"><i class="fa fa-ban text-danger" aria-hidden="true"></i></a></td>
                      </tr>
                      @else
                      <tr class="bg-danger text-light">
                        <th scope="row">{{$datas->id}}</th>
                        <td>{{$datas->firstname}}</td>
                        <td>{{$datas->lastname}}</td>
                        <td>{{$datas->contact_No}}</td>
                        <td>{{$datas->email}}</td>
                        <td>{{$datas->companyname}}</td>
                        <td></td>
                        <td><a href="/supplierUnBan/{{$datas->id}}"><i class="fa fa-arrow-up text-dark" aria-hidden="true"></i></a></td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
       
</body>
</html>
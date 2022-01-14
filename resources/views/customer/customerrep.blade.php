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

    @include('include.custnav')

   <div class="container mt-3">
    <form action="/customerdatafilter" method="post">
        @csrf
       <div class="row justify-content-center font-weight-bold">
          
            <div class="col-md-4">
                <label for="">First date</label>
                 <input type="date" name="dateone" id="dateone" class="form-control">
            </div>
            <div class="col-md-4">
             <label for="">Second date</label>
              <input type="date" name="datetwo" id="datetwo" class="form-control">
             </div>
             <div class="col-md-1">
                 <label for="" class="mt-2"></label>
                 <input type="submit" value="Filter" class="btn btn-primary btn-block">
             </div>
       </div>
    </form>

       <div class="row mt-5">
           <div class="col">
               <a href="/export-cus-data" class="btn btn-primary">Export</a>
           </div>
       </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Address</th>
                        <th scope="col">NIC</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $datas)
                      <tr>
                        <th scope="row">{{$datas->cus_id}}</th>
                        <td>{{$datas->cus_full_name}}</td>
                        <td>{{$datas->mobile}}</td>
                        <td>{{$datas->email}}</td>
                        <td>{{$datas->gender}}</td>
                        <td>{{$datas->address}}</td>
                        <td>{{$datas->nic}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  
            </div>
        </div>
   </div>
</body>
</html>
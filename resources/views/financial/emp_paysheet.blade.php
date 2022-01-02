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

    @include('include.financialNavbar')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center text-light font-weight-bold text-uppercase">Employees Salaries - Pending</h3><hr>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col"># EMP ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Basic salary</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="bg-light">
                    @foreach($empData as $empDatas)
                      <tr>
                        <th scope="row">{{$empDatas->id}}</th>
                        <td>{{$empDatas->First_name}} {{$empDatas->Last_name}}</td>
                        <td>{{$empDatas->Address}}</td>
                        <td>{{$empDatas->basic_salary}}</td>
                        <td><a href="/paysheetview/{{$empDatas->id}}" class="btn btn-success">Preview</a></td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
       
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lak Derana - Attendance</title>
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/card.css">
</head>
<body>
    @include('include.logo')

    @include('include.HRnavbar')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center font-weight-bold text-uppercase">Lak Derana Employee Attendance</h3><hr>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                {{-- <input type="button" value="New Department" class="btn btn-primary btn-block font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg"> --}}
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">In time</th>
                        <th scope="col">Leave time</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($attendence as $data)
                        <tr>
                            <td>{{$data->empID}}</td>
                            <td>{{$data->in_time}}</td>
                            <td>{{$data->out_time}}</td>
                            <td><a href="#"><i class="fa fa-pencil-square text-warning" aria-hidden="true"></i></a></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    

</body>
</html>
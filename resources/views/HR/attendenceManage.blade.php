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
<body style="background: rgb(25,69,157);">
    @include('include.logo')

    @include('include.HRnavbar')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center text-light font-weight-bold text-uppercase">Lak Derana Employee Attendance</h3><hr>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <button type="button" class="btn btn-light font-weight-bold text-dark mb-2 btn-block" data-toggle="modal" data-target="#empatt">
              Make attendence
            </button>
          </div>
            <div class="col-12">
              <a href="/export-attendence" class="btn btn-success mt-2">Export</a>
                {{-- <input type="button" value="New Department" class="btn btn-primary btn-block font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg"> --}}
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Employee name</th>
                        <th scope="col">In time</th>
                        <th scope="col">Leave time</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="bg-light">
                      @foreach($attendence as $data)
                        <tr>
                            <td>{{$data->empID}}</td>
                            <td>{{$data->First_name}} {{$data->Last_name}}</td>
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

    
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="empatt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <form action="/empattendenceHR" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Employee attendence</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <label for="empID">Employee ID</label>
                <input type="text" name="empID" id="empID" class="form-control" placeholder="Employee ID">
              </div>
            </div>
            <hr>
            <div class="row mt-2">
              <div class="col-md-6">
                <label for="empID">In time</label>
                <input type="time" name="intime" id="intime" class="form-control">
              </div>
              <div class="col-md-6">
                <label for="empID">Leave time</label>
                <input type="time" name="outTime" id="outTime" class="form-control">
              </div>
            </div>
            <hr>
            <div class="row mt-2">
              <div class="col-md-6">
                <label for="Date">Date</label>
                <input type="date" name="date" id="date" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body>
</html>
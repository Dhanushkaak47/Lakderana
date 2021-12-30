<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lak Derana - Departments</title>
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
                <h3 class="text-center text-light font-weight-bold text-uppercase">Lak Derana Departments</h3><hr>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <input type="button" value="New Department" class="btn btn-primary btn-block font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg">
                <table class="table table-sm table-dark mt-3">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Department name</th>
                        <th scope="col">Contact No.</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($departmentData as $data)
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->departmentName}}</td>
                        <td>{{$data->contactNo}}</td>
                        <td><a href="#"><i class="fa fa-pencil-square text-warning" aria-hidden="true"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    {{-- model --}}
    

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="post" action="/saveDepData">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Department Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="depname" class="mt-2 font-weight-bold">Department name</label>
                                <input type="text" name="depname" id="depname" class="form-control" placeholder="Department name">
                                <label for="contact" class="mt-2 font-weight-bold">Contact No.</label>
                                <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact No.">
                            </div>
                        </div>
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" value="Save" class="btn btn-primary">
                </div>
              </div>
            </form>
        </div>
    </div>

</body>
</html>
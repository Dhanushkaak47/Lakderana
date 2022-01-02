<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lak Derana - Job roles</title>
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
                <h3 class="text-center text-light font-weight-bold text-uppercase">Lak Derana Job roles</h3><hr>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <input type="button" value="Create Roles" class="btn btn-primary btn-block font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg">
                <table class="table table-sm table-dark mt-3">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Job Role</th>
                        <th scope="col">Department</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($rolesdata as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->rolename}}</td>
                            <td>{{$data->departmentName}}</td>
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
            <form method="post" action="/jbrolesave">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Job role Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="rolename" class="mt-2 font-weight-bold">role name</label>
                                    <input type="text" name="rolename" id="rolename" class="form-control" placeholder="role name">

                                    <label for="department" class="mt-3 font-weight-bold">Department</label>
                                    <select name="department" id="department" class="form-control" required>
                                        <option value="">Select Department</option>
                                        @foreach($departmentData as $department)
                                            <option value="{{$department->id}}">{{$department->departmentName}}</option>
                                        @endforeach
                                    </select>
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
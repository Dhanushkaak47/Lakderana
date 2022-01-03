<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lak Derana - Rooms Manage</title>
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/card.css">
</head>
<body>
    @include('include.logo')

    @include('include.rmdashboard')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <input type="button" value="New Room" class="btn btn-success btn-block font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg">
            </div>
            <div class="col-md-3">
                <input type="button" value="New Room type" class="btn btn-success btn-block font-weight-bold" data-toggle="modal" data-target=".roomType">
            </div>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfully</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm table-dark mt-3">
                    <thead>
                      <tr>
                        <th scope="col">#Room No</th>
                        <th scope="col">Room Type</th>
                        <th scope="col">Status</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($roomsdata as $data)
                      <tr>
                        <td>{{$data->roomNo}}</td>
                        <td>{{$data->typename}}</td>
                        @if ($data->status)
                        <td class="bg-success text-center"><b>Available</b></td>
                        @else
                        <td class="bg-danger text-center"><b>Not available</b></td>
                        @endif   
                        <td><a href="#"><i class="fa fa-pencil-square text-warning" aria-hidden="true"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="post" action="/saveRoomdata">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Room Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="depname" class="mt-2 font-weight-bold">Room No.</label>
                                <input type="number" name="roomno" id="roomno" class="form-control" placeholder="Room No">

                                <label for="contact" class="mt-2 font-weight-bold">Room type</label>
                                <select name="roomtype" id="roomtype" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($room as $data)
                                    <option value="{{$data->id}}">{{$data->typename}}</option>
                                    @endforeach
                                </select>
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

    <div class="modal fade roomType" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="post" action="/roomtypesave">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Room Types</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <label for="contact" class="mt-2 font-weight-bold">Type name</label>
                                <input type="text" name="typename" id="typename" class="form-control" placeholder="type name">

                                <label for="contact" class="mt-2 font-weight-bold">charge per day (LKR)</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="charge per day">
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
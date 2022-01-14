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

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          @if(session()->has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>New department added Successfully</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
        </div>
      </div>
    </div>

    <div class="container mt-3 text-light font-weight: bold">
        <form action="/updatedepartment" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <h3 class="text-light text-uppercase">Update Department Data</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mt-4">
                    <label for="">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control" value="{{$dep->contactNo}}">
                    <input type="hidden" name="id" id="id" class="form-control" value="{{$dep->id}}">
                </div>
                <div class="col-8 mt-3">
                    <label for="">Department name</label>
                    <input type="text" name="Departmentname" id="Departmentname" class="form-control" value="{{$dep->departmentName}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="submit" value="Save" class="btn btn-success mt-4 btn-block">
                </div>
            </div>
        </form>
    </div>


</body>
</html>
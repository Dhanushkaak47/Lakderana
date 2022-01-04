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
<body>
    @include('include.logo')

    @include('include.rsnav')

   <div class="container mt-5">
    <div class="row">
        <div class="col">
            <h3 class="text-center font-weight-bold text-uppercase">Rooms services</h3>
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-md-3">
            <input type="button" value="Services" class="btn btn-success btn-block font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg">
        </div>
    </div>
   </div>
   
   <div class="container mt-3">
       <div class="row">
           <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Price (LKR)</th>
                    <th scope="col">Description</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($services as $data)
                  <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->price}}.00</td>
                    <td>{{$data->description}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
           </div>
       </div>
   </div>

   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="post" action="/saveservices">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Dining Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <label for="depname" class="mt-2 font-weight-bold">Name</label>
                            <input type="text" name="name" id="roomno" class="form-control" placeholder="ex Lunch, Dinner, Pizza">

                            <label for="contact" class="mt-2 font-weight-bold">Price</label>
                            <input type="number" name="price" id="roomno" class="form-control" placeholder="ex 2500">

                            <label for="contact" class="mt-2 font-weight-bold">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>

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
              <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Drinks</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <label for="depname" class="mt-2 font-weight-bold">Drink Name</label>
                            <input type="number" name="name" id="name" class="form-control" placeholder="ex Cocacola, Pepsi">

                            <label for="contact" class="mt-2 font-weight-bold">Price</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="ex 2500">

                            <label for="contact" class="mt-2 font-weight-bold">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>

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
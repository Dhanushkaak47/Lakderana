<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catadd</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
@include('include.navbar') 
    <div class="container">
        <div class="row mt-5">
            <div class="col mt-5">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
  Add New Category
</button>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Deleted Successfully</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header text-light">
        <h3 class="modal-title" id="exampleModalLabel">New Category Add</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/Catadd" method="post">
      @csrf
            @foreach($errors->all() as $error)
               <div class="alert alert-danger" role="alert">
                  {{$error}}
               </div>
            @endforeach

      <div class="modal-body">
                <div class="form-group font-weight-bold text-warning">
                    <label for="name">Category ID</label>
                    <input type="text" name="catid" value="" class="form-control" id="id" aria-describedby="name" placeholder="Category ID">
                </div>
                <div class="form-group font-weight-bold text-warning">
                    <label for="name">Category Name</label>
                    <input type="text" name="catname" value="" class="form-control" id="name" aria-describedby="name" placeholder="Category Name">
                </div>
                <div class="form-group font-weight-bold text-warning">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Description">
                </div>
               
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-2">
            <div class="col mt-3">
            <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Description</th>
      <th scope="col">Craeted date</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $datas)
    @if($datas->status)
    <tr>
      <th scope="row">{{$datas->id}}</th>
      <td>{{$datas->catname}}</td>
      <td>{{$datas->description}}</td>
      <td>{{$datas->created_at}}</td>
      <td><a href="/deletecat/{{$datas->id}}"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
    </tr>
    @else
    <tr class="bg-danger">
      <th scope="row">{{$datas->id}}</th>
      <td>{{$datas->catname}}</td>
      <td>{{$datas->description}}</td>
      <td>{{$datas->created_at}}</td>
      <td><a href="/catdataupdate/{{$datas->id}}"><i class="fa fa-arrow-up text-success" aria-hidden="true"></i></a></td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
            </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
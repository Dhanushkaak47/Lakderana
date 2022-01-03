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

    
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfully</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center font-weight-bold">Reservation Rooms</h3>

                <form action="/reservationsave" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mt-3 font-weight-bold" for="">Room type</label>
                            <select name="roomtype" id="roomtype" class="form-control">
                                <option value="">Select</option>
                                @foreach($room as $data)
                                <option value="{{$data->id}}">{{$data->typename}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="mt-3 font-weight-bold" for="">Room No.</label>
                            <select name="roomno" id="roomno" class="form-control roomno" required>
                                <option value="">Select</option>
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-8">
                            <label class="mt-3 font-weight-bold" for="">Customer ID</label>
                            <input type="text" name="cusNo" id="cusNo" class="form-control">
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-4">
                            <input type="submit" value="Confirm" class="btn btn-primary mt-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
                jQuery('select[name="roomtype"]').on('change',function(){
                   var depID = jQuery(this).val();
                   if(depID)
                   {
                      jQuery.ajax({
                         url : 'getrooms/roomsno/' +depID,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            // console.log(data);
                            jQuery('select[name="roomno"]').empty();
                            jQuery.each(data, function(key,value){
                                console.log(key);
                                console.log(value);
                               $('select[name="roomno"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                         }
                      });
                   }
                   else
                   {
                      $('select[name="roomno"]').empty();
                   }
                });
        });
    </script>

</body>
</html>
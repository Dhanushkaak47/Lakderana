<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lak Derana - Rooms reservation</title>
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/card.css">
</head>
<body>
    @include('include.logo')

    @include('include.adminnav')

    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="text-center text-uppercase mt-5 font-weight-bold">Users manage</h3>
                <input type="button" value="New users assign" class="btn btn-success btn-block font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg">
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="post" action="/usersave">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Assigning details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="depname" class="mt-2 font-weight-bold">Assigning for</label>
                                <select name="departmentname" id="departmentname" class="form-control" required>
                                    <option value="">Select Section</option>
                                    @foreach($data as $department)
                                    <option value="{{$department->id}}">{{$department->departmentName}}</option>
                                    @endforeach
                                </select>

                                
                                <label for="employee" class="mt-3 font-weight-bold">Employee</label>
                                <select name="employee" id="employee" class="form-control employee" required>
                                    <option value="">Select</option>
                                    <option value="">Select</option>
                                </select>

                                <label for="contact" class="mt-3 font-weight-bold">Emp. Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">

                                <label for="contact" class="mt-3 font-weight-bold">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">

                                <label for="contact" class="mt-3 font-weight-bold">Hotel chain</label>
                                <select name="hotelname" id="hotelname" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($hotel as $data)
                                    <option value="{{$data->id}}">{{$data->City}}</option>
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


    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
                jQuery('select[name="departmentname"]').on('change',function(){
                   var depID = jQuery(this).val();
                   if(depID)
                   {
                      jQuery.ajax({
                         url : 'getRole/emp/' +depID,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            // console.log(data);
                            jQuery('select[name="employee"]').empty();
                            jQuery.each(data, function(key,value){
                                console.log(key);
                                console.log(value);
                               $('select[name="employee"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                         }
                      });
                   }
                   else
                   {
                      $('select[name="employee"]').empty();
                   }
                });
        });
    </script>

</body>
</html>
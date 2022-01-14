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
<body style="background: rgb(25,69,157);">
    @include('include.logo')

    @include('include.HRnavbar')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center text-light font-weight-bold text-uppercase">Employees Management</h3><hr>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>New Employee added Successfully</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session()->has('remove'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>employee removed Successfully</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session()->has('readd'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>employee active now</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
          </div>
        </div>
      </div>

    <div class="container text-light font-weight-bold mt-3">
        <div class="row">
            <div class="col-12">
                <form action="/empUpdate" method="post" enctype="multipart/form-data"> 
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                      {{$error}}
                    </div>
                    @endforeach
                    @csrf
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Employee Details</h5>
                      
                      <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="firstname" class="mt-2 font-weight-bold">First Name</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" value={{$data->First_name}}>
                                    <input type="hidden" name="id" id="id" class="form-control" value={{$data->id}}>

                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="mt-2 font-weight-bold">Last Name</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" value={{$data->Last_name}}>
                                </div>
                                <div class="col-md-7">
                                    <label for="dob" class="mt-2 font-weight-bold">Date of birthday</label>
                                    <input type="date" name="dob" id="dob" class="form-control" value={{$data->DOB}}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="contact" class="mt-3 font-weight-bold">Contact No</label>
                                    <input type="tel" name="contact" id="contact" class="form-control" placeholder="Contact" value={{$data->contact}}>
                                </div>
                                <div class="col-md-6">
                                    <label for="Email" class="mt-3 font-weight-bold">Email Address</label>
                                    <input type="email" name="Email" id="Email" class="form-control" placeholder="Email Address" value={{$data->email}}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Assign" class="mt-3 font-weight-bold">Assign For</label>
                                    <select name="Assign" id="Assign"class="form-control" required>
                                        <option value="">Select Department</option>
                                        @foreach($hotelchain as $hotelAssign)
                                            <option value="{{$hotelAssign->id}}">{{$hotelAssign->City}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="basicSal" class="mt-3 font-weight-bold">Basic Salary</label>
                                    <input type="text" name="basicSal" id="basicSal" class="form-control" placeholder="Basic Salary" value={{$data->basic_salary}}>
                                </div>
                                <div class="col-md-6">
                                    <label for="travelAloow" class="mt-3 font-weight-bold">Travel Allowance</label>
                                    <input type="text" name="travelAloow" id="travelAloow" class="form-control" placeholder="Travel Allowance" value={{$data->travel_allow}}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="submit" value="Save" class="btn btn-success btn-block mt-3 mb-5">
                                </div>
                            </div>
                        </div>
                  </div>
                </form>
            </div>
        </div>
    </div>

    

    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
                jQuery('select[name="department"]').on('change',function(){
                   var depID = jQuery(this).val();
                   if(depID)
                   {
                      jQuery.ajax({
                         url : 'getRole/getPro/' +depID,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            // console.log(data);
                            jQuery('select[name="jobrole"]').empty();
                            jQuery.each(data, function(key,value){
                                console.log(key);
                                console.log(value);
                               $('select[name="jobrole"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                         }
                      });
                   }
                   else
                   {
                      $('select[name="jobrole"]').empty();
                   }
                });
        });
    </script>
       
</body>
</html>
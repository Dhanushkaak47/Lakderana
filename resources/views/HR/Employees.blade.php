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

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <input type="button" value="Add new employee" class="btn btn-primary btn-block font-weight-bold" data-toggle="modal" data-target=".bd-example-modal-lg">
                <table class="table table-sm table-dark mt-3">
                    <thead>
                      <tr>
                        <th scope="col">#emp No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Hire Date</th>
                        <th scope="col">Department</th>
                        <th scope="col">Role</th>
                        <th scope="col">Working place</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $empdata)
                        <tr>
                            
                            <td>{{$empdata->id}}</td>
                            <td>{{$empdata->First_name}} {{$empdata->Last_name}}</td>
                            <td>{{$empdata->Address}}</td>
                            <td>{{$empdata->contact}}</td>
                            <td>{{$empdata->Hire_date}}</td>
                            <td>{{$empdata->departmentName}}</td>
                            <td>{{$empdata->rolename}}</td>
                            <td>{{$empdata->City}}</td>
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
            <form action="/empSave" method="post" enctype="multipart/form-data"> 
                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                  {{$error}}
                </div>
                @endforeach
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Employee Details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstname" class="mt-2 font-weight-bold">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="lastname" class="mt-2 font-weight-bold">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="col-md-7">
                                <label for="dob" class="mt-2 font-weight-bold">Date of birthday</label>
                                <input type="date" name="dob" id="dob" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label for="address" class="mt-3 font-weight-bold">Address</label>
                                <textarea name="address" id="address" class="form-control" placeholder="Permanent Address" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="contact" class="mt-3 font-weight-bold">Contact No</label>
                                <input type="tel" name="contact" id="contact" class="form-control" placeholder="Contact">
                            </div>
                            <div class="col-md-6">
                                <label for="Email" class="mt-3 font-weight-bold">Email Address</label>
                                <input type="email" name="Email" id="Email" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="hiredate" class="mt-3 font-weight-bold">Hire Date</label>
                                <input type="date" name="hiredate" id="hiredate" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="department" class="mt-3 font-weight-bold">Department</label>
                                <select name="department" id="department" class="form-control" required>
                                    <option value="">Select Department</option>
                                    @foreach($departmentData as $department)
                                        <option value="{{$department->id}}">{{$department->departmentName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="jobrole" class="mt-3 font-weight-bold">Job role</label>
                                <select name="jobrole" id="jobrole" class="form-control jobrole" required>
                                    <option value="">Select</option>
                                    <option value="">Select</option>
                                </select>
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
                            <div class="col-md-6">
                                <label for="profile" class="mt-3 font-weight-bold">Picture</label>
                                <input type="file" name="profilePic" id="profilePic" class="form-control" placeholder="profile">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="basicSal" class="mt-3 font-weight-bold">Basic Salary</label>
                                <input type="text" name="basicSal" id="basicSal" class="form-control" placeholder="Basic Salary">
                            </div>
                            <div class="col-md-6">
                                <label for="travelAloow" class="mt-3 font-weight-bold">Travel Allowance</label>
                                <input type="text" name="travelAloow" id="travelAloow" class="form-control" placeholder="Travel Allowance">
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
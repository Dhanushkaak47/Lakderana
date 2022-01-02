<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lak Derana - Salary Manage</title>
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
                <h3 class="text-center text-light font-weight-bold text-uppercase">Lak Derana Employee Salary</h3><hr>
            </div>
        </div>
    </div>

   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-4">
            @if(session()->has('done'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successfully!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(session()->has('processed'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong>This action is under financial process</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
           </div>
       </div>
   </div>

    <div class="container-fluid bg-light">
        <div class="container mt-3 mb-5">
            <form action="/emp_salary_save" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        @foreach($employees as $employees)
                        <div class="card">
                            
                            <div class="row mt-4 mb-4">
                                <div class="col-md-12">
                                    <h5 class="font-weight-bold ml-3" style="font-size:100%;">Employee Name - <span class="text-uppercase text-primary" style="font-size:70%;">{{$employees->First_name}} {{$employees->Last_name}}</span></h5>
                                    <input type="hidden" name="emp_id" value="{{$employees->id}}">
                                </div>
                                <div class="col-md-12">
                                    <h5 class="font-weight-bold ml-3" style="font-size:100%;">Designation - <span class="text-uppercase text-primary" style="font-size:70%;">{{$employees->rolename}}</span></h5>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="font-weight-bold ml-3" style="font-size:100%;">Department - <span class="text-uppercase text-primary" style="font-size:70%;">{{$employees->departmentName}}</span></h5>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="font-weight-bold ml-3" style="font-size:100%;">Date of joining - <span class="text-uppercase text-primary" style="font-size:70%;">{{$employees->Hire_date}}</span></h5>
                                </div>
                                <div class="col-md-12">
                                    <h5 class="font-weight-bold ml-3" style="font-size:100%;">Period - <span class="text-uppercase text-primary" style="font-size:70%;">{{$lastMonth}}</span></h5>
                                    <input type="hidden" name="period" value="{{$lastMonth}}">
                                </div>
        
                               
                                
                                <div class="col-md-2 mt-4">
                                    <label class="ml-2 font-weight-bold"for="">Basic salary</label>
                                    <input type="number" name="basic" id="basic" class="form-control ml-2 text-center" value="{{$employees->basic_salary}}">
                                </div>
                                
        
                                <div class="col-md-2 mt-4">
                                    <label class="ml-2 font-weight-bold"for="">Travel allowence</label>
                                    <input type="number" name="travel" id="travel" class="form-control ml-2 text-center" value="{{$employees->travel_allow}}">
                                </div>
        
                                
                                <div class="col-md-2 mt-4">
                                    @if ($employees->jobRoleID >= 10)
                                        @foreach($weekend as $weekdays)
                                        @if($time>180)
                                        <label class="ml-2 font-weight-bold"for="">Over Time</label>
                                        <input type="number" name="ot" id="ot" class="form-control ml-2 text-center" value="{{($employees->basic_salary/180)* 1.5 *($time-180)}}">
                                        @else
                                        <label class="ml-2 font-weight-bold"for="">Over Time</label>
                                        <input type="number" name="ot" id="ot" class="form-control ml-2 text-center" value="0">
                                        @endif
                                        @endforeach
                                    @else
                                        <label class="ml-2 font-weight-bold"for="">Over Time</label>
                                        <input type="number" name="ot" id="ot" class="form-control ml-2 text-center" value="0">
                                    @endif
                                </div>
                                
        
                                <div class="col-md-2 mt-4">
                                    @if ($employees->jobRoleID >= 10)
                                        @foreach($weekend as $weekdays)
                                        
                                        <label class="ml-2 font-weight-bold"for="">Weekend bonus</label>
                                        <input type="number" name="weekendbonos" id="weekendbonos" class="form-control ml-2 text-center" value="{{round(($employees->basic_salary/180)*0.5*($weekdays->sumofout-$weekdays->sumofin),2)}}">
                                        
                                        @endforeach
                                    @else
                                    <label class="ml-2 font-weight-bold"for="">Weekend bonus</label>
                                        <input type="number" name="weekendbonos" id="weekendbonos" class="form-control ml-2 text-center" value="0">
                                    @endif
                                </div>
        
                                <div class="col-md-2 mt-4">
                                    <label class="ml-2 font-weight-bold"for="">Other Bonus</label>
                                    <input type="number" name="otherbonus" id="otherbonus" class="form-control ml-2 text-center" value="0">
                                </div>
        
                            </div>
        
                            <div class="row mb-3">
                                @if($time<=180)
                                <div class="col-md-2">
                                    <label class="ml-2 font-weight-bold" for="">No pay leave</label>
                                    <input type="number" name="noPayLeave" class="form-control ml-2 text-center" id="noPayLeave" value="{{round($employees->basic_salary-(($employees->basic_salary/180) * $time),2)}}">
                                </div>
                                @else
                                <div class="col-md-2">
                                    <label class="ml-2 font-weight-bold" for="">No pay leave</label>
                                    <input type="number" name="noPayLeave" class="form-control ml-2 text-center" id="noPayLeave" value="0">
                                </div>
                                @endif
                                <div class="col-md-2">
                                    <label class="ml-2 font-weight-bold" for="">EPF</label>
                                    <input type="text" readonly name="epf" class="form-control ml-2 text-center" id="noPayLeave" value="{{round($employees->basic_salary * (3/100))}}">
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="ml-2 font-weight-bold" for=""></label>
                                    <input type="submit" value="Process" class="btn btn-success btn-block">                        
                                </div>
                            </div>
        
                        </div>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>

    

</body>
</html>
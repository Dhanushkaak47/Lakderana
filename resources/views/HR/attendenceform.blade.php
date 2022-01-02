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

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center text-light font-weight-bold text-uppercase">Attendance Mark</h3><hr>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                   <div class="row">
                       <div class="col-md-6  text-center">
                        <i class="fa fa-clock-o fa-5x mt-2 mb-2 ml-2 mr-2 text-warning"></i>

                            <h4 class="text-center font-weight-bold mt-2">Mark Attendance <i class="fa fa-check text-primary" aria-hidden="true"></i></h4> <hr>
                            
                            <div class="card mt-3" style="background-color:#D2FFFB;">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        
                                            <h3 class="text-left mt-3 mb-3 ml-2 font-weight-bold">{{\Carbon\Carbon::now()->format('d M, Y')}}</h3>
                                        
                                    </div>
                                    <div class="col-md-2">
                                        <i class="text-right mt-3 mb-3 ml-2 font-weight-bold fa-3x text-success fa fa-calendar-check-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <form action="/saveAttendence" method="post">
                                        @csrf
                                        <input type="text" name="empID" id="empID" class="form-control text-center mt-4" placeholder="Employee ID" required>
                                        <input type="submit" value="Confirm" class="btn btn-primary mt-3">
                                    </form>
                                </div>
                            </div>
                       </div>
                       <div class="col-md-6">
                            <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=2&bgcolor=%23EF6C00&ctz=Asia%2FColombo&showTitle=0&showNav=1&showPrint=0&showTabs=0&showCalendars=1&showTz=1&mode=MONTH&src=ZW4ubGsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%230B8043" style="border-width:0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=2&bgcolor=%23EF6C00&ctz=Asia%2FColombo&showTitle=0&showNav=1&showPrint=0&showTabs=0&showCalendars=1&showTz=1&mode=MONTH&src=ZW4ubGsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%230B8043" style="border-width:0" width="100%" height="600" frameborder="0" scrolling="no"></iframe> --}}

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <!-- bootstrap css cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/card.css">
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
          margin-top: 25px;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #828584;
          color: white;
        }
        
        h3{
            text-align: left;
            text-transform: uppercase;
            color: #0065b8;
        }

        p{
            text-align: center;
            text-transform: uppercase;
            color: #000000;
        }
        
    </style>
</head>
<body style="">
    @foreach($employeesdata as $empdata)
    @foreach($salaryData as $saldata)
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 bg-light">
                <div>
                    <h3 class="font-weight-bold text-primary mt-2"><b>Lak Derana Hotel Group</b></h3>
                </div>
                <div>
                    <p class="text-center font-weight-bold">Payment slip for the month of {{$saldata->peiriod}}</p>
                </div>
                <div class="d-flex justify-content-end"> <span>Working Branch: {{$empdata->City}}</span> </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">EMP Code</span> <small class="ms-3">{{$empdata->id}}</small> </div>
                            </div>
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">EMP Name</span> <small class="ms-3">{{$empdata->First_name}} {{$empdata->Last_name}}</small> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">Address</span> <small class="ms-3">{{$empdata->Address}}</small> </div>
                            </div>
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">Contact No.</span> <small class="ms-3">{{$empdata->contact}}</small> </div>
                            </div>
                        </div>
                        <div class="row">
                           
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">Designation</span> <small class="ms-3">{{$empdata->rolename}}</small> </div>
                            </div>
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">Ac No.</span> <small class="ms-3">*******0701</small> </div>
                            </div>
                            <div class="col-md-6">
                                <div> <span class="fw-bolder">Joining date.</span> <small class="ms-3">{{$empdata->Hire_date}}</small> </div>
                            </div>
                        </div>
                    </div>
                   
                    <table class="mt-4 table table-bordered" id="customers">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th scope="col">Earnings</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Deductions</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Basic</td>
                                <td class="text-right" style="text-align: right;">{{$saldata->basic_salary}}.00</td>
                                <td>Extra Leave</td>
                                <td class="text-right" style="text-align: right;">{{$saldata->nopay_leave}}.00</td>
                            </tr>
                            <tr>
                                <td scope="row">Travel allowence</td>
                                <td class="text-right" style="text-align: right;"  style="text-align: right;">{{$saldata->travel_allowence}}.00</td>
                                <td>EPF</td>
                                <td class="text-right"  style="text-align: right;">{{$saldata->epf}}.00</td>
                            </tr>
                            <tr>
                                <td scope="row">Over time</td>
                                <td class="text-right"  style="text-align: right;">{{$saldata->over_time}}.00 </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">Weekend bonus</td>
                                <td class="text-right"  style="text-align: right;">{{$saldata->weekend_bonus}}.00 </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row">Other bonus</td>
                                <td class="text-right"  style="text-align: right;">{{$saldata->other_bonus}}.00 </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="border-top">
                                <td scope="row">Total Earning</td>
                                <td class="text-right"  style="text-align: right;">{{$saldata->basic_salary+$saldata->travel_allowence+$saldata->over_time+$saldata->weekend_bonus+$saldata->other_bonus}}.00</td>
                                <td class="font-weight-bold">Total Deductions</td>
                                <td class="text-right"  style="text-align: right;">{{$saldata->nopay_leave+$saldata->epf}}.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-4 text-right"> <br> <span class="fw-bold font-weight-bold">Net Salary : {{($saldata->basic_salary+$saldata->travel_allowence+$saldata->over_time+$saldata->weekend_bonus+$saldata->other_bonus) - ($saldata->nopay_leave+$saldata->epf)}}.00</span> </div>
                </div>
                <div class="d-flex justify-content-end" style="margin-top:10px;">
                    <div class="d-flex flex-column"><span class="mt-4">Authorised Signatory</span> </div>
                </div>
                <div class="d-flex justify-content-end" style="margin-top:15px;" >
                    <div class="d-flex flex-column"><span class="mt-4">..........................................................</span> </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
       
</body>
</html>
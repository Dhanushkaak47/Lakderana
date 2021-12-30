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

    @include('include.financialNavbar')

    @foreach($employeesdata as $empdata)
    @foreach($salaryData as $saldata)
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center text-light font-weight-bold text-uppercase">Employees Salaries - Pending</h3><hr>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-end">
                    <div class="col-md-3">
                        <button class="btn btn-success btn-block font-weight-bold">Print paysheet <i class="fa fa-print text-light" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-12 bg-light">
                <div>
                    <h3 class="font-weight-bold text-primary mt-2">Lak Derana Hotel Group</h3>
                </div>
                <div class="text-center lh-1 mb-2">
                    <h6 class="fw-bold mt-3">Payslip</h6> <span class="fw-normal"></span>
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
                        </div>
                    </div>
                    <table class="mt-4 table table-bordered">
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
                                <th scope="row">Basic</th>
                                <td class="text-right">{{$saldata->basic_salary}}.00</td>
                                <td>Extra Leave</td>
                                <td class="text-right">{{$saldata->nopay_leave}}.00</td>
                            </tr>
                            <tr>
                                <th scope="row">Travel allowence</th>
                                <td class="text-right">{{$saldata->travel_allowence}}.00</td>
                                <td>EPF</td>
                                <td class="text-right">{{$saldata->epf}}.00</td>
                            </tr>
                            <tr>
                                <th scope="row">Over time</th>
                                <td class="text-right">{{$saldata->over_time}}.00 </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Weekend bonus</th>
                                <td class="text-right">{{$saldata->weekend_bonus}}.00 </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Other bonus</th>
                                <td class="text-right">{{$saldata->other_bonus}}.00 </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="border-top">
                                <th scope="row">Total Earning</th>
                                <td class="text-right">{{$saldata->basic_salary+$saldata->travel_allowence+$saldata->over_time+$saldata->weekend_bonus+$saldata->other_bonus}}.00</td>
                                <td class="font-weight-bold">Total Deductions</td>
                                <td class="text-right">{{$saldata->nopay_leave+$saldata->epf}}.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-4 text-right"> <br> <span class="fw-bold font-weight-bold">Net Salary : {{($saldata->basic_salary+$saldata->travel_allowence+$saldata->over_time+$saldata->weekend_bonus+$saldata->other_bonus) - ($saldata->nopay_leave+$saldata->epf)}}.00</span> </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-column"><span class="mt-4">Authorised Signatory</span> </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="d-flex flex-column"><span class="mt-4">..........................................................</span> </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
       
</body>
</html>
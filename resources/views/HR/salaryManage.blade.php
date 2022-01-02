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
    <style>
        div.material-table {
        padding: 0;
        }

        div.material-table .hiddensearch {
        padding: 0 14px 0 24px;
        border-bottom: solid 1px #DDDDDD;
        display: none;
        }

        div.material-table .hiddensearch input {
        margin: 0;
        border: transparent 0 !important;
        height: 48px;
        color: rgba(0, 0, 0, .84);
        }

        div.material-table .hiddensearch input:active {
        border: transparent 0 !important;
        }

        div.material-table table {
        table-layout: fixed;
        }

        div.material-table .table-header {
        height: 64px;
        padding-left: 24px;
        padding-right: 14px;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        display: flex;
        -webkit-display: flex;
        border-bottom: solid 1px #DDDDDD;
        }

        div.material-table .table-header .actions {
        display: -webkit-flex;
        margin-left: auto;
        }

        div.material-table .table-header .btn-flat {
            min-width: 36px;
            padding: 0 8px;
        }

        div.material-table .table-header input {
        margin: 0;
        height: auto;
        }

        div.material-table .table-header i {
        color: rgba(0, 0, 0, 0.54);
        font-size: 24px;
        }

        div.material-table .table-footer {
        height: 56px;
        padding-left: 24px;
        padding-right: 14px;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: row;
        flex-direction: row;
        -webkit-justify-content: flex-end;
        justify-content: flex-end;
        -webkit-align-items: center;
        align-items: center;
        font-size: 12px !important;
        color: rgba(0, 0, 0, 0.54);
        }

        div.material-table .table-footer .dataTables_length {
        display: -webkit-flex;
        display: flex;
        }

        div.material-table .table-footer label {
        font-size: 12px;
        color: rgba(0, 0, 0, 0.54);
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: row
        /* works with row or column */
        
        flex-direction: row;
        -webkit-align-items: center;
        align-items: center;
        -webkit-justify-content: center;
        justify-content: center;
        }

        div.material-table .table-footer .select-wrapper {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: row
        /* works with row or column */
        
        flex-direction: row;
        -webkit-align-items: center;
        align-items: center;
        -webkit-justify-content: center;
        justify-content: center;
        }

        div.material-table .table-footer .dataTables_info,
        div.material-table .table-footer .dataTables_length {
        margin-right: 32px;
        }

        div.material-table .table-footer .material-pagination {
        display: flex;
        -webkit-display: flex;
        margin: 0;
        }

        div.material-table .table-footer .material-pagination li:first-child {
        margin-right: 24px;
        }

        div.material-table .table-footer .material-pagination li a {
        color: rgba(0, 0, 0, 0.54);
        }

        div.material-table .table-footer .select-wrapper input.select-dropdown {
        margin: 0;
        border-bottom: none;
        height: auto;
        line-height: normal;
        font-size: 12px;
        width: 40px;
        text-align: right;
        }

        div.material-table .table-footer select {
        background-color: transparent;
        width: auto;
        padding: 0;
        border: 0;
        border-radius: 0;
        height: auto;
        margin-left: 20px;
        }

        div.material-table .table-title {
        font-size: 20px;
        color: #000;
        }

        div.material-table table tr td {
        padding: 0 0 0 56px;
        height: 48px;
        font-size: 13px;
        color: rgba(0, 0, 0, 0.87);
        border-bottom: solid 1px #DDDDDD;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        }

        div.material-table table tr td a {
        color: inherit;
        }

        div.material-table table tr td a i {
        font-size: 18px;
        color: rgba(0, 0, 0, 0.54);
        }

        div.material-table table tr {
        font-size: 12px;
        }

        div.material-table table th {
        font-size: 12px;
        font-weight: 500;
        color: #757575;
        cursor: pointer;
        white-space: nowrap;
        padding: 0;
        height: 56px;
        padding-left: 56px;
        vertical-align: middle;
        outline: none !important;
        }

        div.material-table table th.sorting_asc,
        div.material-table table th.sorting_desc {
        color: rgba(0, 0, 0, 0.87);
        }

        div.material-table table th.sorting:after,
        div.material-table table th.sorting_asc:after,
        div.material-table table th.sorting_desc:after {
        font-family: 'Material Icons';
        font-weight: normal;
        font-style: normal;
        font-size: 16px;
        line-height: 1;
        letter-spacing: normal;
        text-transform: none;
        display: inline-block;
        word-wrap: normal;
        -webkit-font-feature-settings: 'liga';
        -webkit-font-smoothing: antialiased;
        content: "arrow_back";
        -webkit-transform: rotate(90deg);
        display: none;
        vertical-align: middle;
        }

        div.material-table table th.sorting:hover:after,
        div.material-table table th.sorting_asc:after,
        div.material-table table th.sorting_desc:after {
        display: inline-block;
        }

        div.material-table table th.sorting_desc:after {
        content: "arrow_forward";
        }

        div.material-table table tbody tr:hover {
        background-color: #EEE;
        }

        div.material-table table th:first-child,
        div.material-table table td:first-child {
        padding: 0 0 0 24px;
        }

        div.material-table table th:last-child,
        div.material-table table td:last-child {
        padding: 0 14px 0 0;
        }
    </style>
    
</head>
<body style="background: rgb(25,69,157);">
    @include('include.logo')

    @include('include.HRnavbar')

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center text-light font-weight-bold text-uppercase">Lak Derana Employee Salary - {{$lastMonth}}</h3><hr>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div id="admin" class="col s12">
                      <div class="card material-table">
                        <div class="table-header">
                          <span class="table-title">Employee working statistics</span>
                        </div>
                        <table id="datatable">
                          <thead>
                            <tr>
                              <th><b>Employee ID</b></th>
                              <th><b>Working Hours</b></th>
                              <th><b>Make salary</b></th>
                              
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($attendence as $data)
                            
                                <tr>
                                    <td>{{$data->empID}}</td>
                                    <td>{{$data->sumofout - $data->sumofin}} </td>
                                    {{-- <td>{{Carbon\Carbon::parse($data['timeSum'])->format('H:i:s') }}</td> --}}
                                    <td><a href="/makesalary/{{$data->empID}}/{{$data->sumofout - $data->sumofin}}"><i class="fa fa-pencil-square-o text-center text-primary fa-3x" aria-hidden="true"></i></a></td>
                                </tr>
                            
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    

</body>
</html>
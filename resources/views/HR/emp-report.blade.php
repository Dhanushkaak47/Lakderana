<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
          border-collapse: collapse;
          width: 100%;
        }
        
        th, td {
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even){background-color: #f2f2f2}
        
        th {
          background-color: #04AA6D;
          color: white;
        }
        </style>
</head>
<body>

    <h2>Employees List</h2>

<table>
  <tr>
    <th>Emp Code</th>
    <th>Name</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Email</th>
    <th>Designation</th>
    <th>Department</th>
  </tr>
  @foreach($employees as $data)
  <tr>
    <td>{{$data->id}}</td>
    <td>{{$data->First_name}} {{$data->Last_name}}</td>
    <td>{{$data->Address}}</td>
    <td>{{$data->contact}}</td>
    <td>{{$data->email}}</td>
    <td>{{$data->rolename}}</td>
    <td>{{$data->departmentName}}</td>
  </tr>
  @endforeach
</table>
</body>
</html>
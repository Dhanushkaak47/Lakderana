<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
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
          background-color: #394943;
          color: white;
        }
        h3 {
            text-align: center;
            text-transform: uppercase;
            color: #4CAF50;
            }
    </style>

     

</head>
<body>
    <h3>Attendance Sheet - {{$date}}</h3>
    <table id="customers">
        <tr>
          <th>#EMP ID</th>
          <th>First name</th>
          <th>Last name</th>
          <th>In time</th>
          <th>Out time</th>
        </tr>
        @foreach ($attendence as $datas)
        <tr>
          <td>{{$datas->empID}}</td>
          <td>{{$datas->First_name}}</td>
          <td>{{$datas->Last_name}}</td>
          <td style="text-align: center;">{{$datas->in_time}}</td>
          <td style="text-align: center;">{{$datas->out_time}}</td>
        </tr>
        @endforeach
      </table>

      
</body>
</html>
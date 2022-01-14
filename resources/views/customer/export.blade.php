<!DOCTYPE html>
<html>
<head>
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
    background-color: #04AA6D;
    color: white;
    }
    </style>
    </head>
    <body>

    <h1>Customers List</h1>

    <table id="customers">
    <tr>
        <th scope="col">#Id</th>
        <th scope="col">Full name</th>
        <th scope="col">Mobile</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Address</th>
        <th scope="col">NIC</th>
    </tr>
    @foreach($data as $datas)
        <tr>
        <th scope="row">{{$datas->cus_id}}</th>
        <td>{{$datas->cus_full_name}}</td>
        <td>{{$datas->mobile}}</td>
        <td>{{$datas->email}}</td>
        <td>{{$datas->gender}}</td>
        <td>{{$datas->address}}</td>
        <td>{{$datas->nic}}</td>
        </tr>
    @endforeach
    </table>

</body>
</html>



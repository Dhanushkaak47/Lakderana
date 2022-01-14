<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Room Reservation</h2>

<table>
  <tr>
    <th>#Room No</th>
    <th>Customer name</th>
    <th>Customer ID</th>
    <th>Contact no</th>
    <th>Date</th>
  </tr>

  @foreach($resdata as $resdatas)
  <tr>
    <td>{{$resdatas->roomNo}}</td>
    <td>{{$resdatas->cus_full_name}}</td>
    <td>{{$resdatas->cus_id}}</td>
    <td>{{$resdatas->mobile}}</td>
    <td>{{$resdatas->created_at}}</td>
  </tr>
  @endforeach
  
</table>

</body>
</html>


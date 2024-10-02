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

<h2>HTML Table</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Ko`rsatkich nomi</th>
    <th>1-chorak</th>
    <th>2-chorak</th>
    <th>3-chorak</th>
    <th>4-chorak</th>
  </tr>
  <tr>
    <td><a href="{{ url('business_trips') }}">Safarlar</a></td>
    <td>Hududlarga kim ekanimni ko`rsatish</td>
    <td>{{ $trips }}</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

</body>
</html>


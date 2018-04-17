<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Existing Restaurants</title>
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
   <br/>
   <h1>Restaurant Details</h1>
     <table border="1">
         <tr>
            <th>Restaurant Name</th>
            <th>Phone</th>
            <th>Address 1</th>
            <th>Address 2</th>
            <th>Suburb</th>
            <th>State</th>
            <th>Number of Seats</th>
         </tr>
         @for ($i = 0; $i < count($restaurants); $i++)
          <tr>
              <td>{{$restaurants[$i]->restname}}</td>
              <td>{{$restaurants[$i]->restphone}}</td>
              <td>{{$restaurants[$i]->restaddress1}}</td>
              <td>{{$restaurants[$i]->restaddress2}}</td>
              <td>{{$restaurants[$i]->suburb}}</td>
              <td>{{$restaurants[$i]->state}}</td>
              <td>{{$restaurants[$i]->numberofseats}}</td>
          </tr>
          @endfor
     </table><br/>
     {{	$restaurants->links('vendor.pagination.bootstrap-4')	}}
   </div>
</body>
</html>

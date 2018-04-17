<!DOCTYPE html>
<html>
<head>
     <title>Show Restaurant</title>
     <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
       <nav class="navbar navbar-inverse">
          <div class="navbar-header">
              <a class="navbar-brand" href="{{ URL::to('restaurants') }}">Restaurant Alert</a>
           </div>
       <ul class="nav navbar-nav">
           <li><a href="{{ URL::to('restaurant') }}">View All Restaurants</a></li>
           <li><a href="{{ URL::to('restaurants/create') }}">Create a Restaurant</a>
       </ul>
      </nav>
      <h1>Showing {{ $restaurant->id }}</h1>
      <div class="jumbotron text-center">
         <p>Restaurant ID: {{ $restaurant->id }}</p>
         <p>Restaurant Name: {{ $restaurant->name }}</p>
         <p>Phone: {{ $restaurant->phone }}</p>
         <p>Address 1: {{ $restaurant->address1 }}</p>
         <p>Address 2: {{ $restaurant->address2 }}</p>
         <p>Suburb: {{ $restaurant->suburb }}</p>
         <p>State: {{ $restaurant->state }}</p>
         <p>Number of Seats: {{ $restaurant->numberofseats }}</p>
         <p>Country ID: {{$restaurant->country_id}}</p>
         <p>Category ID: {{$restaurant->category_id}}</p>
      </div>
    </div>
</body>
</html>

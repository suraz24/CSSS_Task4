<!DOCTYPE html>
<html>
<head>
   <title>Restaurants (Index)</title>
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
      <nav class="navbar navbar-inverse">
         <div class="navbar-header">
           <a class="navbar-brand" href="{{URL::to('restaurants') }}">Restaurants Alert</a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="{{ URL::to('restaurants') }}">View All Restaurants</a></li>
           <li><a href="{{ URL::to('restaurants/create')}}">Create a Restaurant</a></li>
         </ul
      </nav>
      <div>

      <h1>All the restaurants</h1>
      <!-- will be used to show any messages -->
      @if (Session::has('message'))
       <div class="alert alert-info">{{Session::get('message') }}</div>
      @endif
      <table class="table table-striped table-bordered">
         <thead>
           <tr>
               <th>Restaurant Name</th>
               <th>Phone</th>
               <th>Address 1</th>
               <th>Address 2</th>
               <th>Suburb</th>
               <th>State</th>
               <th>Number of Seats</th>
               <th>Country</th>
               <th>Category</th>
           </tr>
         </thead>
         @foreach($restaurants as $key => $value)
           <tr>
             <!-- <td><a href="{{ URL::to('orderwithdetails/' . $value->orderid)}}">{{ $value->regno }}</a></td> -->
             <td>{{ $value->name }}</td>
             <td>{{ $value->phone }}</td>
             <td>{{ $value->address1 }}</td>
             <td>{{ $value->address2 }}</td>
             <td>{{ $value->suburb }}</td>
             <td>{{ $value->state }}</td>
             <td>{{ $value->numberofseats }}</td>
             <td>{{ $value->country_id }}</td>
             <td>{{ $value->category_id }}</td>
           <!-- we will also add show, edit, and delete buttons -->
            <td>
                <!-- delete the order (uses the destroy method DESTROY /restaurants/{id} -->
                 <!-- we will add this later since its a little more complicated than the other two buttons -->
                 <!-- Show the order (uses the show method found at GET /restaurants/{id} -->
               <a class="btn btn-small btn-success" href="{{ URL::to('restaurants/' . $value->id) }}">Show this Restaurant</a>
           <!-- Edit this order (uses the edit method found at GET /restaurants/{id}/edit -->
               <a class="btn btn-small btn-info" href="{{ URL::to('restaurants/' . $value->id . '/edit')}}">Edit this Restaurant</a>
               {{ Form::open(array('url' => 'restaurants/' . $value->id, 'class' => 'pull-right')) }}
               {{ Form::hidden('_method', 'DELETE') }}
               {{ Form::submit('Delete this Restaurant', array('class' => 'btn btn-warning'))}}
               {{ Form::close() }}
           </td>
         </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>

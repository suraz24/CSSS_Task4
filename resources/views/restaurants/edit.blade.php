<!DOCTYPE html>
<html>
<head>
   <title>Edit Restaurant</title>
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-inverse">
       <div class="navbar-header">
         <a class="navbar-brand" href="{{ URL::to('restaurants') }}">Restaurant Alert</a>
       </div>
     <ul class="nav navbar-nav">
         <li><a href="{{ URL::to('restaurants') }}">View All Restaurants</a></li>
         <li><a href="{{ URL::to('restaurants/create') }}">Create a Restaurant</a>
     </ul>
    </nav>
    <h1>Edit {{ $restaurant->id }}</h1>
    <!-- if there are creation errors, they will show here -->
      {{ HTML::ul($errors->all()) }}
      {{ Form::model($restaurant, array('route' => array('restaurants.update', $restaurant->id),'method' => 'PUT')) }}
      <div class="form-group">
          {{ Form::label('name', 'Restaurant Name') }}
          {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
      </div>
      <div class="form-group">
          {{ Form::label('phone', 'Phone') }}
          {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}
      </div>
      <div class="form-group">
          {{ Form::label('address1', 'Address 1') }}
          {{ Form::text('address1', Input::old('address1'), array('class' => 'form-control'))}}
      </div>
      <div class="form-group">
          {{ Form::label('address2', 'Address 2') }}
          {{ Form::text('address2', Input::old('address2'), array('class' => 'form-control'))}}
      </div>
      <div class="form-group">
          {{ Form::label('suburb', 'Suburb') }}
          {{ Form::text('suburb', Input::old('suburb'), array('class' => 'form-control'))}}
      </div>
      <div class="form-group">
          {{ Form::label('state', 'State') }}
          {{ Form::text('state', Input::old('state'), array('class' => 'form-control'))}}
      </div>
      <div class="form-group">
          {{ Form::label('numberofseats', 'Number of Seats') }}
          {{ Form::text('numberofseats', Input::old('numberofseats'), array('class' => 'form-control'))}}
      </div>
      <div class="form-group">
          {{ Form::label('country_id', 'Country ID') }}
          {{ Form::text('country_id', Input::old('country_id'), array('class' => 'form-control')) }}
      </div>
      <div class="form-group">
          {{ Form::label('category_id', 'Category ID') }}
          {{ Form::text('category_id', Input::old('category_id'), array('class' => 'form-control')) }}
      </div>
         {{ Form::submit('Edit the Restaurant!', array('class' => 'btn btn-primary')) }}
         {{ Form::close() }}
    </div>
</body>
</html>

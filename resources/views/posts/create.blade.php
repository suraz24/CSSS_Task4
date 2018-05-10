<!DOCTYPE html>
<html>
<head>
   <title>Create Post</title>
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
      <nav class="navbar navbar-inverse">
         <div class="navbar-header">
             <a class="navbar-brand" href="{{ URL::to('posts') }}">Post Alert</a>
         </div>
         <ul class="nav navbar-nav">
             <li><a href="{{ URL::to('posts') }}">View All Posts</a></li>
             <li><a href="{{ URL::to('posts/create') }}">Create a Post</a>
         </ul>
      </nav>
    <h1>Create a Post</h1>
    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}
    {{ Form::open(array('url' => 'posts')) }}
     <div class="form-group">
         {{ Form::label('content', 'Content') }}
         {{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}
     </div>
     <div class="form-group">
         {{ Form::label('restaurant_id', 'Restaurant ID') }}
         {{ Form::text('restaurant_id', Input::old('restaurant_id'), array('class' => 'form-control')) }}
     </div>
     <div class="form-group">
         {{ Form::label('user_id', 'User ID') }}
         {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
     </div>
     {{ Form::submit('Create the Post!', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
  </div>
</body>
</html>

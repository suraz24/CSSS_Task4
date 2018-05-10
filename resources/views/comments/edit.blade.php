<!DOCTYPE html>
<html>
<head>
   <title>Edit Comment</title>
   <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
      <nav class="navbar navbar-inverse">
         <div class="navbar-header">
             <a class="navbar-brand" href="{{ URL::to('comments') }}">Comment Alert</a>
         </div>
         <ul class="nav navbar-nav">
             <li><a href="{{ URL::to('comments') }}">View All Comments</a></li>
             <li><a href="{{ URL::to('comments/edit') }}">Create a Comment</a>
         </ul>
      </nav>
      <h1>Edit {{ $comment->id }}</h1>
      <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}
        {{ Form::model($comment, array('route' => array('comments.update', $comment->id),'method' => 'PUT')) }}
         <div class="form-group">
             {{ Form::label('content', 'Content') }}
             {{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}
         </div>
         <div class="form-group">
             {{ Form::label('post_id', 'Post ID') }}
             {{ Form::text('post_id', Input::old('post_id'), array('class' => 'form-control')) }}
         </div>
         <div class="form-group">
             {{ Form::label('user_id', 'User ID') }}
             {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
         </div>
         {{ Form::submit('Update the Comment!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
      </div>
    </body>
    </html>

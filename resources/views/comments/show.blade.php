<!DOCTYPE html>
<html>
<head>
     <title>Show Comment</title>
     <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
      <nav class="navbar navbar-inverse">
         <div class="navbar-header">
           <a class="navbar-brand" href="{{URL::to('comments') }}">Comment Alert</a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="{{ URL::to('comments') }}">View All Comments</a></li>
           <li><a href="{{ URL::to('comment/create')}}">Create a Comment</a></li>
         </ul>
      </nav>
      <h1>Showing {{ $comment->id }}</h1>
      <div class="jumbotron text-center">
         <p>Comment ID: {{$comment->id}}</p>
         <p>Content: {{$comment->content}}</p>
         <p>Created At: {{$comment->created_at}}</p>
         <p>Updated At: {{$comment->updated_at}}</p>
         <p>Post ID: {{$comment->post_id}}</p>
         <p>User ID: {{$comment->user_id}}</p>
      </div>
  </div>
</body>
</html>

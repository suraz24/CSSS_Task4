<!DOCTYPE html>
<html>
<head>
     <title>Show Post</title>
     <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
  <div class="container">
      <nav class="navbar navbar-inverse">
         <div class="navbar-header">
           <a class="navbar-brand" href="{{URL::to('posts') }}">Post Alert</a>
         </div>
         <ul class="nav navbar-nav">
           <li><a href="{{ URL::to('posts') }}">View All Posts</a></li>
           <li><a href="{{ URL::to('post/create')}}">Create a Post</a></li>
         </ul>
      </nav>
      <h1>Showing {{ $post->id }}</h1>
      <div class="jumbotron text-center">
         <p>Post ID: {{$post->id}}</p>
         <p>Content: {{$post->content}}</p>
         <p>Created At: {{$post->created_at}}</p>
         <p>Updated At: {{$post->updated_at}}</p>
         <p>Restaurant ID: {{$post->restaurant_id}}</p>
         <p>User ID: {{$post->user_id}}</p>
      </div>
  </div>
</body>
</html>

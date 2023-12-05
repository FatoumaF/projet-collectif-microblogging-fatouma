<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="antialiased">
    <div>


        <h1> Features Post </h1>


        @foreach ($posts as $post)
            <p>Post</p>
            <p>Id: {{ $post->id }}</p>
            <p>Image: {{ $post->image }}</p>
            <p>Content: {{ $post->content }}</p>
            <p>Création: {{ $post->created_at }}</p>
            <p>User Id: {{ $post->user_id }}</p>

            </form>
        @endforeach


        <div style="border: 2px solid red;">
            <p style="text-decoration: underline"> Envoyer un post </p>
            <form method="post" action="{{ route('newPost') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <input type="text" name="postImage" placeholder="Lien de l'image">
                <input type="text" name="postContent" placeholder="Message du post">
                <button>Nouveau post</button>
            </form>
        </div>
    </div>
</body>

</html>

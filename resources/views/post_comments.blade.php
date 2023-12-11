<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="antialiased">
    <div>
        <h1> Features Post </h1>

        <div style="border: 2px solid red;">
            <p style="text-decoration: underline"> Récupérer tous les posts </p>
            <div style="border: 2px solid orange">
                <p>Id: {{ $post->id }}</p>
                <p>Image: {{ $post->image ?? 'N/A' }}</p>
                <p>Content: {{ $post->content ?? 'N/A' }}</p>
                <p>Likes: {{ $post->likes ?? 0 }}</p>
                <p>Création: {{ $post->created_at ?? 'N/A' }}</p>
                <p>User Id: {{ $post->user_id ?? 'N/A' }}</p>
            </div>
                <form method="post" action="{{ route('store') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="postId" value="{{ $post->id }}">
                    <label for="comment">Commentaire :</label>
                    <textarea name="comment" id="comment" rows="3" required></textarea>
                    <button type="submit">Poster un commentaire</button>
                </form>
            {{-- @endif --}}


            <a href="{{ route('fetchComments', ['postId' => $post->id]) }}">Voir les commentaires</a>
        </div>


    </div>
</body>

</html>



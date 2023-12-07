@props(['posts' => $posts])

<div style="border: 2px solid red;">
    <p style="text-decoration: underline"> Récupérer tous les posts </p>
    @foreach ($posts as $post)
        <div style="border: 2px solid orange">
            <p>Id: {{ $post->id }}</p>
            <p>Image: {{ $post->image }}</p>
            <p>Content: {{ $post->content }}</p>
            <p>Likes: {{ $post->likes }}</p>
            <p>Création: {{ $post->created_at }}</p>
            <p>User Id: {{ $post->user_id }}</p>
        </div>
        @if (!app('App\Http\Controllers\LikeController')->checkLike($post->id))
            <form method="post" action="{{ route('like', ['postId' => $post->id]) }}" accept-charset="UTF-8">
                {{-- <form method="post" action="{{ app('App\Http\Controllers\LikeController')->likeIt($post->id) }}" accept-charset="UTF-8"> --}}
                {{ csrf_field() }}
                <input type="submit" value="Liker">
                {{-- <button type="submit">Like</button> --}}
            </form>
        @else
            <form method="post" action="{{ route('dislike', ['postId' => $post->id]) }}" accept-charset="UTF-8">
                {{-- <form method="post" action="{{ app('App\Http\Controllers\LikeController')->dislikeIt($post->id) }}" accept-charset="UTF-8"> --}}
                {{ csrf_field() }}
                <input type="submit" value="Supprimer le like">
                {{-- <button type="submit">Supprimer le like</button> --}}
            </form>
        @endif

        
    @endforeach
</div>
<?php
function setLikeListener($postid)
{
    echo "<script>
    var xmlhttp = new XMLHttpRequest()
    likeIt = document.getElementById('$postid')
    likeIt.addEventListener('click', () => {
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log('like envoyé')
            }
            else {
                console.log('erreur')
            }
        };
        xmlhttp.open('GET', 'sendLike.php?id=' + $postid , true);
        xmlhttp.send();

        location.reload()
        
    })
    </script>";
}
?>
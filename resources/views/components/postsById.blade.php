@props(['postsById' => $postsById])

<div style="border: 2px solid red;">
    <p style="text-decoration: underline"> Récupérer les posts par userID </p>
    @foreach ($postsById as $post)
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
                {{ csrf_field() }}
                <input type="hidden" name="postId" value="{{ $post->id }}">
                <button value>Like</button>
            </form>
        @else
            <form method="post" action="{{ route('dislike', ['postId' => $post->id]) }}"
                accept-charset="UTF-8">
                {{ csrf_field() }}
                <input type="hidden" name="postId" value="{{ $post->id }}">
                <button value>Supprimer le like</button>
            </form>
        @endif

        
    @endforeach
</div>
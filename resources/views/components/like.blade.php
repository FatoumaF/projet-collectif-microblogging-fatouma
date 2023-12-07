@props(['postId' => $postId])

@if (!app('App\Http\Controllers\LikeController')->checkLike($postId))
            <form method="post" action="{{ route('like', ['postId' => $postId]) }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <input type="hidden" name="postId" value="{{ $postId }}">
                <button value>Like</button>
            </form>
        @else
            <form method="post" action="{{ route('dislike', ['postId' => $postId]) }}"
                accept-charset="UTF-8">
                {{ csrf_field() }}
                <input type="hidden" name="postId" value="{{ $postId }}">
                <button value>Supprimer le like</button>
            </form>
        @endif
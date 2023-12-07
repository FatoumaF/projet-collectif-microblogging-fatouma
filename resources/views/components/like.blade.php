@props(['postId' => $postId])

<form method="post" action="{{ route('likeOrDislike', ['postId' => $postId]) }}" accept-charset="UTF-8">
    {{ csrf_field() }}
    <input type="hidden" name="postId" value="{{ $postId }}">
    <button id="{{ $postId }}"></button>
</form>
@if (app('App\Http\Controllers\LikeController')->checkLike($postId))
    <p>Liké</p>
@else
    <p>Nope</p>
@endif

<?php
$liked = app('App\Http\Controllers\LikeController')->checkLike($postId) ? 1 : 0;
echo "
    <script>
        let button$postId = document.getElementById('$postId')
        console.log(button$postId)
        if($liked == 0){
            button$postId.innerText = 'Like'
        }
        else{
            button$postId.innerText = 'Supprimer le like'
        }

    </script>
    ";
?>

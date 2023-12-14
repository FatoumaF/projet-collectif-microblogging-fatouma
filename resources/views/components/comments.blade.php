@props(['comments' => $comments])

<p>Commentaires: </p>
@foreach ($comments as $comment)
    <p style="border: 2px solid green">{{$comment->userName}} a écrit : {{$comment->content}}</p>
@endforeach
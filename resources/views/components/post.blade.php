@props(['post' => $post])

<img src="{{ asset($post->image) }}"></img>
<p> {{ $post->content }}</p>
<p class="likes">{{ $post->likes }}</p>
<x-like :postId="$post->id" :liked="$post->liked" />
<p>Commentaires: </p>
@foreach ($post->comments as $comment)
    <p>{{$comment->userName}} a écrit : {{$comment->content}}</p>
@endforeach
<x-newComment :postId="$post->id"/>


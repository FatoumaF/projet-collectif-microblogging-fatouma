@props(['post' => $post])

    <img src="{{ asset($post->image) }}"></img>
    <p class="likes">{{ $post->likes }}</p>
    <p>{{ $post->content }}</p>
    <x-like :postId="$post->id" :liked="$post->liked" />

@props(['post' => $post])

    <p>{{ $post->image }}</p>
    <p class="likes">{{ $post->likes }}</p>
    <p>{{ $post->content }}</p>
    <x-like :postId="$post->id" :liked="$post->liked" />

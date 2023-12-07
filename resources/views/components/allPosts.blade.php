@props(['posts' => $posts])

<div style="border: 2px solid red;">
    <p style="text-decoration: underline"> Récupérer tous les posts </p>
    @foreach ($posts as $post)
        <div style="border: 2px solid orange">
            <x-post :post="$post" />
        </div>
        <x-like :postId="$post->id" />
    @endforeach
</div>

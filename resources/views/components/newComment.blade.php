@props(['postId' => $postId])

<div style="border: 2px solid red;">
    <p style="text-decoration: underline">Nouveau commentaire</p>
    <form method="POST" action="{{ route('newComment') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="postId" value="{{$postId}}">
        <input type="text" name="postContent" placeholder="Message du post">
        <button>Commenter</button>
    </form>
</div>
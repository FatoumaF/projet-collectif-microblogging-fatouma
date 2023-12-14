@props(['postId' => $postId])

<div>
    <form method="POST" action="{{ route('newComment') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="postId" value="{{$postId}}">
        <input type="text" name="postContent" placeholder="Message du post">
        <button>Commenter</button>
    </form>
</div>
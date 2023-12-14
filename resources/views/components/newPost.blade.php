<div>
    <p style="text-decoration: underline"></p>
    <form method="POST" action="{{ route('newPost') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input class="rounded-sm" type="file" name="postImage" placeholder="Lien de l'image">
        <input class="rounded-sm" type="text" name="postContent" placeholder="Message du post">
        <button>Nouveau post</button>
    </form>
</div>
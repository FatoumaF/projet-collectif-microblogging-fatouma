<div style="border: 2px solid red;">
    <p style="text-decoration: underline"> Envoyer un post </p>
    <form method="POST" action="{{ route('newPost') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="postImage" placeholder="Lien de l'image">
        <input type="text" name="postContent" placeholder="Message du post">
        <button>Nouveau post</button>
    </form>
</div>
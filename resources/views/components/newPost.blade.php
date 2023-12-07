<div style="border: 2px solid red;">
    <p style="text-decoration: underline"> Envoyer un post </p>
    <form method="post" action="{{ route('newPost') }}" accept-charset="UTF-8">
        {{ csrf_field() }}
        <input type="file" name="postImage" placeholder="Lien de l'image">
        <input type="text" name="postContent" placeholder="Message du post">
        <button>Nouveau post</button>
    </form>
</div>
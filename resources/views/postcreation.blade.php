<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creer mon post</title>
    <style>
        .thebdy{
            animation: color 13s infinite linear
        }
        @keyframes color {
            0%   { background: black; }
            20%  { background: rgba(5, 5, 80, 0.735); }
            40%  { background: rgb(7, 7, 164); }
            60%  { background: rgb(20, 20, 245); }
            80%  { background: #040275; }
            100% { background: black; }
        }
        .ipt{
            border: none
        }
    </style>
</head>
<body class="thebdy">
    <h1>Crée un post !</h1>
    <div style="color: white; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh;">
        <div>
            <form method="post" action="{{ route('newPost') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <input class="ipt" type="file" name="postImage" placeholder="Lien de l'image">
                <input class="ipt" type="text" name="postContent" placeholder="Message du post">
                <button class="ipt" >Nouveau post</button>
            </form>
        </div>
    </div>
</body>
</html>
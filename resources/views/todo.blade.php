<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">


        <h1> to do list </h1>


        {{-- @foreach ($listItems as $listItem)
            <p>Item: {{ $listItem->name }}</p>
            <form method="post" action="{{ route('markComplete', $listItem->id) }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <button type="submit" style="max-height: 25px; margin-left: 20px;">Mark Complete</button>
            </form>
        @endforeach --}}

        <form method="post" action="{{ route('newPost') }}" accept-charset="UTF-8">
            {{ csrf_field() }}

            <label for="Post">Nouveau post</label> </br>
            <input type="text" name="postImage" placeholder="Lien de l'image">
            <input type="text" name="postContent" placeholder="Message du post">
            <button>Send Item</button>
        </form>

    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Commenter</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <style>
        .container {
            margin: 0 auto;
            position: relative;
            width: unset;
        }
        #app {
            width: 60%;
            margin: 4rem auto;
        }
        .question-wrapper {
            text-align: center;
        }
    </style>
</head>
<body>


    <div id="app">
        <div class="container">
            <div class="question-wrapper">
                <h5 class="is-size-2" style="color: #220052;">
                    What do you think about <span style="color: #47b784;">Dogs</span>?</h5>
                <br>
                <a href="#Form" class="button is-medium has-shadow has-text-white" style="background-color: #47b784">Comment</a>
            </div>
            <br><br>
            <comments></comments>
            <new-comment></new-comment>
        </div>
    </div>
    <script async src="{{mix('js/app.js')}}"></script>
</body>
</html>
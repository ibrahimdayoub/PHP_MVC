<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisdoms Get All And Add One</title>
    <link rel="stylesheet" href="wisdoms.css">
    
</head>
<body>
    <h1>See Wisdoms And Add New If You Want!</h1>

    <div class="container slider-wisdoms">

        <div class="wisdoms"></div>

        <div class="control">
            <button class="left">&lt;</button>
            <button class="right">&gt;</button>
        </div>

        <form class="form">
            <input id="on" type="text" placeholder="Your Wisdom On ?" >
            <input id="text" type="text" placeholder="Your Wisdom Text ?">
            <input id="from" type="text" placeholder="Your Wisdom From ? ">
            <button id="add" type="button">Add</button>
        </form>

    </div>

    <script src="wisdoms.js"></script>
</body>
</html>
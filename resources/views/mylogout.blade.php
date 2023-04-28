<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    this is my logout
    <button onclick="document.getElementById('form-logout').submit()">LOGOUT</button>

    <form id="form-logout" action="/logout" method="post">
        @csrf
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page not found!</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        b {
            color: red;
        }

    </style>
</head>
<body>
    <h1>Error <b>404</b>, page not found! </h1>
    <h2>Sorry, page <i><?= $errPage ?></i> not found</h2> 
</body>
</html>
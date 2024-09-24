<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="loading">
        <div class="loading1">
        </div>
    </div>
</body>

</html>
<style>
    body{
        margin:0;
        padding: 0;
        background-color:black;
    }
    .loading {
        top: 400px;
        left: 50%;
        position: relative;
        width: 200px;
    }
    
    .loading1 {
        background-color:transparent;
        position: absolute;
        position: fixed;
        width: 9vh;
        height: 9vh;
        border: 9px solid black;
        border-top: 9px solid white;
        border-radius: 50%;
        animation: loading 2s linear infinite;
    }
    
    @keyframes loading {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
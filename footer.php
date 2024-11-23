<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="footer-container">
        <footer>
            <div class="Flogo">
                <h1>Clothino</h1>
                <p>the demo project </p>
                <img src="icon/logo.png" alt="">
            </div>
            <div class="about">
                <h1>About</h1>
                <ul>
                    <li><a href="#">about US</a></li>
                    <li><a href="#">Contact US</a></li>
                    <li><a href="#">Cerriar</a></li>
                    <li><a href="#">about US</a></li>
                    <li><a href="#">about US</a></li>
                </ul>
            </div>
            <div class="emil-add">
                <h1>Email</h1>
                <p>Clothino14@gmail.com</p>
                <h1>Address</h1>
                <p>1 OG Montanusstr. 2, Marlberg, NW 48443 surat india</p>
            </div>
            <div class="social-paymant">
                <h1>sodial media</h1>
                <span>
                 <img src="icon/social-media-5995266_1280.png" alt="" class="socialM">
                </span>
                <h1>payment</h1>
                <span>
                  <img src="icon/paymet_mathod.jpg" alt="" class="pyment">
                </span>
            </div>
        </footer>
        <hr>
        <center><p>CopyRight© Clothio 2024-25
            <br>
            made by Harshal Mahajan
        </p></center>
    </div>
</body>

</html>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: rgba(0, 0, 0, 0.875);
        color: white;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
    }
    
    .footer-container {
        width: 100%;
        margin: auto;
        box-shadow: -10px -10px 20px 5px #181818;
    }
    
    footer {
        padding: 5px;
        display: flex;
        justify-content: space-between;
    }
    @media only screen and (max-width:880px) {
        footer{
            display: block;
        }
    }
    .Flogo img {
        width: 100px;
    }
    
    h1 {
        font-size: 20px;
    }
    
    .about ul {
        margin-left: -20px;
    }
    
    .about ul li {
        list-style: circle;
        color: white;
    }
    
    .about ul li a {
        text-decoration: none;
        color: white;
    }
    
    .about {
        max-width: 200px;
        width: 100%;
    }
    
    .pyment {
        width: 250px;
    }
    
    .socialM {
        width: 200px;
        margin-top: -30px;
        margin-bottom: -20px;
    }
</style>
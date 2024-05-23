<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            margin-bottom: 60px;
        }
        
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #292929; 
            color: white;
            padding: 2px 0;
            text-align: center;
       
        }
        .footer-content {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .footer-image {
            height: 25px;
            margin-right: 5px;
        }
        .footer-text {
            font-size: 23px; 
            margin-right: 5px; 
        }
    </style>
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <footer>
        <div class="container footer-content">
            <span class="footer-text">/Salut</span>
            <img src="{{ asset('img/gencat-salut.png') }}" alt="Generalitat de Catalunya logo" class="footer-image">
        </div>
    </footer>
</body>
</html>

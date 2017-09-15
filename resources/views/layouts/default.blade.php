<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <style>
        .credit_card {
            border: 1px solid #bbb;
        }
    </style>
</head>
<body>
    <header id="header" class="row">
        <nav>
            <div class="nav-wrapper col s12 black">
                <a href="" class="brand-logo">iStore</a>
                <ul class="right">
                    <li><a href="">Minha conta</a></li>
                    <li><a href="">ajuda</a></li>
                    <li><a href="">Sair</a></li>
                </ul>
            </div>
        </nav>
        <div class="parallax-container">
            <div class="parallax">
                <img src="/img/iphone.jpg">
            </div>
        </div>
    </header>

    <main>
        <section class="container">
            @yield('content')
        </section>
    </main>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.parallax').parallax();
        });
    </script>
    @yield('script')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" >
    
    <title>@yield('title')</title>
</head>
<body>


        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">

            <div class="logo">
                <a href="{{url('/')}}"><img src="img/logo.svg" alt="" style="width: 60%; margin-left: 10px;"></a>
            </div>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link px-2 text-white">Главная</a></li>
        <li class="nav-item"><a href="{{ url('order') }}" class="nav-link px-2 text-white">История заявок</a></li>
        </ul>

            <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <a href="{{ url('register') }}"><button type="button" class="btn btn-primary">Регистрация</button></a>
                <a href="{{ url('login') }}"><button type="button" class="btn btn-primary">Авторизация</button></a>
            </div>
        </header>
    

    @yield('content')
    


    <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="{{ url ('/') }}" class="nav-link px-2 text-body-secondary">Главная</a></li>
      <li class="nav-item"><a href="{{ url ('order') }}" class="nav-link px-2 text-body-secondary">История заявок</a></li>
    </ul>
  </footer>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
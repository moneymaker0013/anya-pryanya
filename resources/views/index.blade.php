@extends('layout')

@section('title')
Главная
@endsection

@section('content')

<div class="conatiner">
    <div class="p-3">

    <h2>О нас</h2>
    <p>Мы — команда профессионалов, специализирующаяся на предоставлении высококачественных услуг по садоводству. Наша компания была основана с целью оказания услуг по садоводству, и мы гордимся тем, что можем предложить нашим клиентам надежные и эффективные решения.</p>
    <h2>Пошаговая инструкция "Как пользоваться сайтом":</h2>
    <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <div class="card shadow-sm">
                            <div class="bd-placeholder-img">
                                <img src="img/газон.svg" alt="" width="100%" height="250">
                            </div>
                            <div class="card-body">
                                <p class="card-text" style="text-align:center;">Просмотреть наши виды услуги и выбрать необходимую для вас</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card shadow-sm">
                            <div class="bd-placeholder-img">
                                <img src="img/форма.svg" alt="" width="100%" height="250">
                            </div>
                            <div class="card-body">
                                <p class="card-text" style="text-align:center;">Зарегистрироваться и заполнить зявку для получение услуги</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card shadow-sm">
                            <div class="bd-placeholder-img">
                                <img src="img/готово.svg" alt="" width="100%" height="250">
                            </div>
                            <div class="card-body">
                                <p class="card-text" style="text-align:center;">Насладиться результатом и хвастаться нами в своих соц. сетях</p>
                            </div>
                        </div>
                    </div>
                </div>

     <h2 style="margin: 50px 0 50px;">Наши работы</h2>
     
     @foreach ($orders as $order)
     @if ($order->status == 'completed')
            <div class="text-center mb-4">
                <h4>{{ $order->service->name }}</h4>
                <p>{{ $order->service->description }}</p>
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <div class="card shadow-sm">
                            <div class="bd-placeholder-img">
                                <img src="{{ Storage::url($order->before_photo) }}" alt="" width="100%" height="250">
                            </div>
                            <div class="card-body">
                                <p class="card-text">До</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card shadow-sm">
                            <div class="bd-placeholder-img">
                                <img src="{{ Storage::url($order->after_photo) }}" alt="" width="100%" height="250">
                            </div>
                            <div class="card-body">
                                <p class="card-text">После</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @endforeach  
        </div>   
    
    </div>
@endsection
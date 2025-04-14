@extends('layout')

@section('title')
История заявок
@endsection


@section('content')

<div class="container">
    <h1>Привет, {{Auth::user()->name}}!</h1>
</div>

<div class="container">
    <h2 class="text-center">Мои заявки</h2>
    @if($errors->any())
        @foreach($errors->all() as $er)
            <div class="alert alert-danger">{{$er}}</div>
        @endforeach
    @endif

    @if($orders->isEmpty())
        <p>У вас нет заявок.</p>
        <a href="{{ route('order.create') }}"><button type="submit" class="btn btn-success">Новая заявка</button></a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Выйти</button>
        </form>
    @else

        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>Тип услуги</th>
                <th>Дата получения</th>
                <th>Фотография "до"</th>
                <th>Статус</th>
              </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->service->name }}</td>
                <td>{{ $order->datetime }}</td>
                <td><img src="{{ Storage::url($order->before_photo) }}" alt="Фотография 'до'" width="300px"></td>
                <td>{{ $order->status }}</td>
            </tr>
        @endforeach
            </tbody>
          </table>
        </div>

            <a href="{{ route('order.create') }}"><button type="submit" class="btn btn-success">Новая заявка</button></a>
    
            
<form action="{{route('logout')}}" method="POST" style="display:inline">
    @csrf
    <button type="submit" class="btn btn-danger">Выйти</button>
</form>
</div>
@endif
@endsection
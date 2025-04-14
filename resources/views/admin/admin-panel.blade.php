@extends('layout')

@section('title')
Администратор
@endsection

@section('content')
<div class="p-3"></div>
        <h2>Управление заявками</h2>

        @if($errors->any())
        @foreach($errors->all() as $er)
            <div class="alert alert-danger">{{$er}}</div>
        @endforeach
    @endif

    @if($orders->isEmpty())
        <p>Новых заявок нет</p>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Выйти</button>
        </form>
    @else

        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
              <th class="border">ID</th>
              <th class="border">Пользователь</th>
              <th class="border">Номер телефона</th>
              <th  class="border">Адрес</th>
              <th class="border">Дата</th>
              <th class="border">Тип услуги</th>
              <th class="border">Фото "до"</th>
              <th class="border">Способ оплаты</th>
              <th class="border">Статус</th>
              <th class="border">Фото "после"</th>
              </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
              <tr>
                <td class="border">{{ $order->id }}</td>
                <td class="border">{{ $order->user->name }}</td>
                <td class="border">{{ $order->tel }}</td>
                <td class="border">{{ $order->address }}</td>
                <td class="border">{{ $order->datetime }}</td>
                <td class="border">{{ $order->service->name }}</td>
                <td class="border"><img src="{{ Storage::url($order->before_photo) }}" alt="Фотография 'до'" width="300px"></td>
                <td class="border">{{ $order->payment_method }}</td>
                <td class="border">  
                  <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-control" onchange="toggleReasonField(this, {{ $order->id }})">
                                <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>Новая</option>
                                <option value="in_progress" {{ $order->status == 'in_progress' ? 'selected' : '' }}>В работе</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Одобрено</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Отменено</option>
                            </select>
                            <textarea id="reason{{ $order->id }}" name="cancellation_reason" rows="3" placeholder="Укажите причину отмены..." style="display: {{ $order->status == 'cancelled' ? 'block' : 'none' }};">{{ $order->cancellation_reason }}</textarea>
                            <button type="submit" class="btn btn-primary mt-2">Обновить</button>
                  </form>
                  
                  {{ $order->cancellation_reason }}
                </td>
                    <td class="border">
                        <form action="{{ route('orders.uploadAfterPhoto', $order->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="after_photo" id="before_photo" required>
                            <button type="submit" class="btn btn-success mt-2">Загрузить фото</button>
                        </form>
                    </td>
            </tr>
            @endforeach
            </tbody>
          </table>

    <form action="{{route('logout')}}" method="POST" style="display:inline">
    @csrf
    <button type="submit" class="btn btn-danger">Выйти</button>
</form>
</div>
@endif
@endsection
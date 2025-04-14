@extends('layout')

@section('title')
Новая заявка
@endsection

@section('content')
<div class="container">
    <h2 class="text-center">Новая заявка</h2>
    @if($errors->any())
        @foreach($errors->all() as $er)
            <div class="alert alert-danger">{{$er}}</div>
        @endforeach
    @endif
    <form id="serviceRequestForm" class="postcard" action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    
    @csrf
                    
                    <div class="form-row">
                        <label for="address">Адрес*:</label>
                        <input type="text" id="address" name="address" required>
                        <span class="error" id="addressError"></span>
                    </div>
                    <div class="form-row">
                        <label for="tel">Номер телефона*:</label>
                        <input type="tel" id="tel" name="tel" required>
                        <span class="error" id="telError"></span>
                    </div>
                    <div class="form-row">
                        <label for="datetime">Дата и время получения услуги*:</label>
                        <input type="date" id="datetime" name="datetime" required>
                        <span class="error" id="datetimeError"></span>
                    </div>
                    <div class="form-row">
                        <label for="service_id">Выберите вид услуги*:</label>
                        <select name="service_id" required>
                        @foreach($service as $service)
                         <option value="{{ $service->id }}">{{ $service->name }}</option>
                         @endforeach
                        </select>
                        <span class="error" id="serviceError"></span>
                    </div>
                    <div class="form-row">
                        <label for="before_photo">Загрузить фотографию "до"*:</label>
                        <input type="file" class="form-control" name="before_photo" id="before_photo">
                    </div>
                    
                    <div class="form-row">
                        <label for="payment_method">Способ оплаты*:</label>
                        <div>
                            <label><input type="radio" name="payment_method" value="cash" required> Наличные</label>
                            <label><input type="radio" name="payment_method" value="card"> Банковская карта</label>
                        </div>
                        <span class="error" id="paymentError"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить запрос</button>
                </form>
</div>
@endsection
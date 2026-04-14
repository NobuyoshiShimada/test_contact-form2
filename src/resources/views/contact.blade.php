@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset( 'css/contact.css' )}}">
@endsection

@section('content')
    <div class="contact">
        <h2 class="contact__title">Contact</h2>
        <form action="/contact/confirm" method="post" class="contact__form">
            @csrf
            <!-- お名前 -->
            <div class="contact__form--group">
                <div class="contact__form--title">
                    <label class="contact__form--label" for="name">
                        お名前<span class="contact__form--required">※</span>
                    </label>
                    <div class="contact__form--name">
                        <input class="contact__form--name--input" type="text" name="first_name" id="name" value="{{ old('first_name')}}" placeholder="例：山田">
                        <input class="contact__form--name--input" type="text" name="last_name" id="name" value="{{ old('last_name')}}" placeholder="例：太郎">
                    </div>
                </div>
            </div>
            <div class="contact__form__error--message">
                @if ($errors->has('first_name'))
                <p class="">contact__form__error--message__first>{{$errors->first('first_name')}}</p>
                
            </div>

            <!-- 性別 -->
            <div class="contact__form--group">
                <div class="contact__form--title">
                    <label class="contact__form--label" for="name">
                        性別<span class="contact__form--required">※</span>
                    </label>
                    <div class="contact__form--name">
                        <select class="contact__form--name--input" type="text" name="first_name" id="name" value="{{ old('first_name')}}" placeholder="例：山田">
                        <input class="contact__form--name--input" type="text" name="last_name" id="name" value="{{ old('last_name')}}" placeholder="例：太郎">
        </form>
    </div>

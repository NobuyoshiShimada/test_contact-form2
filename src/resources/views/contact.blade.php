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
                @endif
                @if ($errors->has('last_name'))
                <p class="">contact__form__error--message__last>{{$errors->last('last_name')}}</p>
                @endif
            </div>

            <!-- 性別 -->
            <div class="contact__form--group">
                <div class="contact__form--title">
                    <label class="contact__form--label" for="name">
                        性別<span class="contact__form--required">※</span>
                    </label>
                    <div class="contact__form--gender">
                        <input class="contact__form--gender--input" type="radio" name="gender" id="male" value="1" {{ old('gender')==1 || old('gender')==null ? 'checked' : ''}} >
                        <span class="contact__form--gender--text">男性</span>
                        <input class="contact__form--gender--input" type="radio" name="gender" id="female" value="2" {{ old('gender')==2 || old('gender')==null ? 'checked' : ''}} >
                        <span class="contact__form--gender--text">女性</span>
                        <input class="contact__form--gender--input" type="radio" name="gender" id="other" value="3" {{ old('gender')==3 || old('gender')==null ? 'checked' : ''}} >
                        <span class="contact__form--gender--text">その他</span>
                    </div>
                </div>
            </div>
            <p class="contact__form--error--message">
                @error('gender')
                {{ 'message' }}
                @enderror
            </p>

            <!-- メールアドレス -->
            <div class="contact__form--group">
                <div class="contact__form--title">
                    <label class="contact__form--label" for="email">
                        メールアドレス<span class="contact__form--required">※</span>
                    </label>
                    <input class="contact__form--email--input" type="text" name="email" id="email" value="{{'email'}}" placeholder="例:test@exanple.com">
                    <p class="contact__form--error--message">
                        @error('email')
                        {{ 'message' }}
                        @enderror
                    </p>


            </form>
    </div>

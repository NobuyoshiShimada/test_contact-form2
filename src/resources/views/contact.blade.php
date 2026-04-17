@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
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
                        <input class="contact__form--name--input" type="text" name="first_name" id="name"
                            value="{{ old('first_name') }}" placeholder="例：山田">
                        <input class="contact__form--name--input" type="text" name="last_name" id="name"
                            value="{{ old('last_name') }}" placeholder="例：太郎">
                    </div>
                </div>
            </div>
            <div class="contact__form__error--message">
                @if ($errors->has('first_name'))
                    <p class="">contact__form__error--message__first>{{ $errors->first('first_name') }}</p>
                @endif
                @if ($errors->has('last_name'))
                    <p class="">contact__form__error--message__last>{{ $errors->last('last_name') }}</p>
                @endif
            </div>

            <!-- 性別 -->
            <div class="contact__form--group">
                <div class="contact__form--title">
                    <label class="contact__form--label" for="name">
                        性別<span class="contact__form--required">※</span>
                    </label>
                    <div class="contact__form--gender">
                        <input class="contact__form--gender--input" type="radio" name="gender" id="male"
                            value="1" {{ old('gender') == 1 || old('gender') == null ? 'checked' : '' }}>
                        <span class="contact__form--gender--text">男性</span>
                        <input class="contact__form--gender--input" type="radio" name="gender" id="female"
                            value="2" {{ old('gender') == 2 || old('gender') == null ? 'checked' : '' }}>
                        <span class="contact__form--gender--text">女性</span>
                        <input class="contact__form--gender--input" type="radio" name="gender" id="other"
                            value="3" {{ old('gender') == 3 || old('gender') == null ? 'checked' : '' }}>
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
                    <input class="contact__form--email--input" type="text" name="email" id="email"
                        placeholder="例:test@exanple.com">
                    <p class="contact__form--error--message">
                        @error('email')
                            {{ 'message' }}
                        @enderror
                    </p>

                    <!-- 電話番号 -->
                    <div class="contact__form--group">
                        <div class="contact__form--title">
                            <label class="contact__form--label" for="tel">
                                電話番号<span class="contact__form--required">※</span>
                            </label>
                            <input class="contact__form--tel--input" type="text" name="tel_1" id="tel"
                                placeholder="080" value="{{ old('tel_1') }}">
                            <span>-</span>
                            <input class="contact__form--tel--input" type="text" name="tel_2" id="tel"
                                placeholder="1234" value="{{ old('tel_2') }}">
                            <span>-</span>
                            <input class="contact__form--tel--input" type="text" name="tel_3" id="tel"
                                placeholder="5678" value="{{ old('tel_3') }}">
                        </div>
                    </div>
                    <p class=""contact__form--error--message>
                        @if ($errors->has('tel_1'))
                            {{ $errors->first('tel_1') }}
                        @elseif ($errors->has('tel_2'))
                            {{ $errors->first('tel_2') }}
                        @else
                            {{ $errors->first('tel_3') }}
                        @endif
                    </p>

                    <!-- 住所 -->
                    <div class="contact__form--group">
                        <div class="contact__form--title">
                            <label class="contact__form--label" for="adress">
                                住所<span class="contact__form--required">※</span>
                                <input class="contact__form--address--input" type="text" name="address" id="address"
                                    placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                            </label>
                        </div>
                    </div>

                    <p class="contact__form--address--error--message">
                        @error('address')
                            {{ '$message' }}
                        @enderror
                    </p>

                    <!-- 建物名 -->
                    <div class="contact__form--group">
                        <div class="contact__form--title">
                            <label class="contact__form--label" for="building">
                                建物名
                            </label>
                            <input class="contact__form--address--input" type="text" name="address" id="address"
                                placeholder="例:千駄ヶ谷マンション101" value="{{ old('address') }}">
                        </div>
                    </div>

                    <!-- お問い合わせの種類 -->
                    <div class="contact__form--group">
                        <div class="contact__form--title">
                            <label class="contact__form--label" for="">
                                お問い合わせの種類<span class="contact__form--required">※</span>
                            </label>
                            <div class="contact__form--select--inner">
                                <select class="contact__form--select" name="category_id" id=""
                                    placeholder="選択してください">
                                    <option disabled selected>選択してください</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->content }}</option>
                                    @endforeach
                                </select>
                                <p class="contact__form--error--message">
                                    @error('category_id')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- お問い合わせ内容 -->
                    <div class="contact__form--group">
                        <div class="contact__form--title">
                            <label class="contact__form--label" for="">
                                お問い合わせ内容<span class="contact__form--required">※</span>
                            </label>
                            <textarea class="textarea" name="detail" id="" cols="30" rows="10"
                                placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                            <p class="contact__form--error--message">
                                @error('detail')
                                    {{ $message }}
                                @enderror
                            </p>





                        </div>
                    </div>
        </form>
    </div>
    c

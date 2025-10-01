@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('logo', '登録画面')

@section('content')
    <div class="main">
        <form class="create-form" action="{{ route('dictionaries.store') }}" method="post">
            @csrf
            <div class="create-form__group">
                <div class="create-form__input--text">
                    <input type="text" name="keyword" value="{{ old('keyword') }}" placeholder="キーワード">
                    @error('keyword')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="create-form__group">
                <div class="create-form__input--textarea">
                    <textarea name="description" placeholder="説明">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="create-form__button">
                <button class="create-form__button-submit">登録</button>
            </div>
        </form>
    </div>
@endsection

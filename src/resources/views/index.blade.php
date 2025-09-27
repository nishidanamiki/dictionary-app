@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('logo', '検索画面')

@section('nav')
    <a href="{{ route('dictionaries.create') }}" class="header__nav-button">登録画面へ</a>
@endsection

@section('content')
    <div class="main">
        <form class="search-form" action="" method="">
            <input class="search-form__input" type="text" name="search" value="">
            <button class="search-form__button-submit">検索</button>
        </form>
    </div>
    <table class="table">
        @foreach ($dictionaries as $dictionary)
            <tr>
                <td>{{ $dictionary->created_at->format('Y/n/j') }}</td>
                <td>{{ $dictionary->keyword }}</td>
                <td>{{ $dictionary->description }}</td>
            </tr>
        @endforeach
    </table>
@endsection

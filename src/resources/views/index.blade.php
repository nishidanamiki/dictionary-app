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
        <form class="search-form" action="{{ route('dictionaries.index') }}" method="get">
            @csrf
            <input class="search-form__input" type="text" name="keyword" value="{{ request('keyword') }}">
            <button class="search-form__button-submit">検索</button>
        </form>
    </div>
    <table class="table">
        @foreach ($dictionaries as $dictionary)
            <tr>
                <td>{{ $dictionary->created_at->format('Y/n/j') }}</td>
                <td>
                    <form action="{{ route('dictionaries.update', $dictionary->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <input class="update-form__input" type="text" name="keyword" value="{{ $dictionary->keyword }}">
                </td>
                <td>
                    <input class="update-form__input" type="text" name="description"
                        value="{{ $dictionary->description }}">
                </td>
                <td>
                    <button class="update-form__button-submit">更新</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('dictionaries.destroy', $dictionary->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="delete-form__button-submit">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $dictionaries->links() }}
@endsection

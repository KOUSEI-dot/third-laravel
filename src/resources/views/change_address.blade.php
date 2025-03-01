@extends('layouts.app')

@section('title', '住所変更')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
    <style>
        body {
            background-color: #fff;
        }
        .header {
            margin-bottom: 120px;
            background-color: black;
            padding: 10px 20px;
        }
        .header__container {
            display: flex;
            align-items: center;
            height: 60px;
        }
        .header__logo {
            width: 300px;
            height: 120px;
        }
        .header__search-bar {
            flex-grow: 1;
            max-width: 40vw;
            margin-right: 200px;
            margin-left: 250px;
            height: 30px;
            font-size: 14px;
            padding: 5px 10px;
            text-align: center;
        }
        .header__buttons {
            display: flex;
            gap: 10px;
        }
        .header__buttons button {
            padding: 8px 15px;
            font-size: 14px;
            background-color: #555;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .header_button_logout {
            margin-left: 200px;
            margin-right: 15px;
        }
        .header_button_mypage {
            margin-right: 15px;
        }
        .header_button_listing {
            margin-right: 15px;
        }
        .header__buttons button:hover {
            background-color: #777;
        }
    </style>
@endsection


@section('content')
    <h2>住所変更</h2>
    <form action="{{ route('update_address') }}" method="POST">
        @csrf
        <label for="new_address">新しい住所:</label>
        <input type="text" name="new_address" id="new_address" required>
        <button type="submit">変更を保存</button>
    </form>
@endsection

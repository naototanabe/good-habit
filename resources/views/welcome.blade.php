@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
        <div class="col-sm-8">
                {{-- 投稿フォーム --}}
                @include('habits.form')
                {{-- 投稿一覧 --}}
                @include('habits.habits')
        </div>

    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>ようこそ Good Habitへ</h1>
                <p>Good Habitはif thenクエスチョンを使った新しい習慣支援アプリです。</p>
                <br>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'アカウント新規作成', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection

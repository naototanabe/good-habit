@extends('layouts.app')

@section('content')
    <h1 class="show-heading">{{ $user->name }}さんのページ</h1>
    <p class="habits-clear">達成した習慣<span class="badge badge-primary">{{ $user->clears_count }}</span></p>
    @include('habits.habits')
@endsection


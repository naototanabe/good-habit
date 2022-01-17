@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1 class="habit-heading"> 習慣編集</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($habit, ['route' => ['habits.update', $habit->id], 'method' => 'put']) !!}
                
                <div class='form-group'>
                    {!! Form::label('content', '編集したい習慣',['class' => 'form-content']) !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control habit-text', 'rows' => '2']) !!}
                </div>
                
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
        </div>
                
        <div class="col-6">
            <h3 class="form-content">作成例</h3>
            <p class="section-content">Ifthen プランニングの基本は具体的な状況設定と何を習慣にしたいかが大事です。<br>
            運動を習慣にしたければもし家に帰ったら{{ $user->name }}さんは運動するか？<br>
            のように設定してみてください。<br>
            状況設定は自分が覚えている時間帯や行動に設定するとうまくいくでしょう。<br>
            習慣にしたい内容は続けたいことはもちろんですが、やめたいことを設定してもよいでしょう。<br>
            </p>
        </div>
    </div>
@endsection
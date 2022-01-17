@extends('layouts.app')

@section('content')

    <h1 class="habit-heading">習慣新規作成</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($habit, ['route' => 'habits.store']) !!}
            
                
                <div class="form-group">
                    {!! Form::label('content', '新規習慣', ['class' => 'form-content']) !!}
                    {!! Form::textarea('content', "もし〇〇ならば $user->name は△△するか?", ['class' => 'form-control habit-text', 'rows' => '2']) !!}
                </div>

                {!! Form::submit('習慣を作成する！', ['class' => 'btn btn-primary create-btn']) !!}

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
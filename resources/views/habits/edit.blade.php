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
    </div>
@endsection
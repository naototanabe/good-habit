@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1> 習慣編集ページ</h1>

    
    <div class="row">
        <div class="col-6">
            {!! Form::model($habit, ['route' => ['habits.update', $habit->id], 'method' => 'put']) !!}
                
                
                <div class='form-group'>
                    {!! Form::label('content', '編集したい習慣') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
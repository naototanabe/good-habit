@extends('layouts.app')

@section('content')

    <h1>習慣新規作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($habit, ['route' => 'habits.store']) !!}
            
                
                <div class="form-group">
                    {!! Form::label('content', '習慣:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('習慣を作成する！', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection
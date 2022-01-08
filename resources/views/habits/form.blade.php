{!! Form::open(['route' => 'habits.store']) !!}
    <div class="form-group">
        {!! Form::textarea('content', "もし〇〇ならば $user->name は△△するか？", ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::submit('習慣新規作成', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}

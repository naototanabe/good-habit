
    @if (Auth::user()->is_clears($habit->id))
        {{-- 達成を解除ボタンのフォーム --}}
        {!! Form::open(['route' => ['clears.unclear', $habit->id], 'method' => 'delete']) !!}
            {!! Form::submit('達成を解除', ['class' => "btn btn-sm btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {{-- 習慣を達成ボタンのフォーム --}}
        {!! Form::open(['route' => ['clears.clear', $habit->id]]) !!}
            {!! Form::submit('習慣を達成', ['class' => "btn btn-sm btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif


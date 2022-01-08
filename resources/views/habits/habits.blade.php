@if (count($habits) > 0)
    <ul class="list-unstyled">
        @foreach ($habits as $habit)
            <li class="media mb-3">
                
                <div class="media-body">

                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($habit->content)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $habit->user_id)
                        <div class="btn-group">
                            @include('user_clear.clear_button')
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['habits.destroy', $habit->id], 'method' => 'delete']) !!}
                                {!! Form::submit('習慣削除', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </div>
                        @endif
                    </div>

                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $habits->links() }}
@endif

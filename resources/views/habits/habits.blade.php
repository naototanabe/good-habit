@if (count($habits) > 0)
    <ul class="list-unstyled row">
        @foreach ($habits as $habit)
            <li class="media mb-3 col-sm-4">
                <div class="media-body">
                    <span class="box-title">習慣</span>

                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0 ">{!! nl2br(e($habit->content)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $habit->user_id)
                        <div class="d-flex flex-wrap">
                            
                                @include('user_clear.clear_button')
                                {{-- 投稿削除ボタンのフォーム --}}
                                {!! Form::open(['route' => ['habits.destroy', $habit->id], 'method' => 'delete']) !!}
                                {!! Form::submit('習慣削除', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                                
                                {!! link_to_route('habits.edit', '習慣を編集', ['habit' => $habit->id], ['class' => 'btn btn-success btn-sm']) !!}
                            
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

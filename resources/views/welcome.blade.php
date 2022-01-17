@extends('layouts.app')

@section('content')

        

    @if (Auth::check())
            <h1><img src="image/Good-Habit1.png" alt"GoodHabit main-visual"></h1>
        <main>
                <div>

                    {{-- 投稿一覧 --}}
                    @include('habits.habits')
                </div> 
                
                <h2 class="heading">続かなかった習慣が続く習慣に</h2>
            
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3 class="heading-content">目標が続けられないあなたに</h3>
                            <p class="text-content">習慣にしたい目標を決めたがやりたかったけどできなかった、、<br>続けたかったけど続けることができなかった、、<br>そんな辛い体験したことはありませんか？<br>
                             Good Habitは科学的に効果があると言われている簡単な方法で、習慣化を促進するアプリです。<br>
                             使い方は非常にシンプルです。自分で決めた習慣を毎日行うだけです。このアプリでは簡単に習慣を管理することができます。</p>
                        </div>
                        <div class="col-sm-4">
                            <h3 class="heading-content">Good Habitの習慣化の仕組み</h3>
                            <p class="text-content">Good Habitは習慣化の代表と言われているif then プランニングを更に効果的な自分に対しての疑問文で終わるようにした新しいタイプの習慣化アプリです。<br>
                            なぜ疑問文で終わらせるかというと「問いかけ行動効果」と呼ばれる心理現象に基づいています。宣言文よりも質問文のほうが行動を変える力を持ち、その効果は６ヶ月がすぎても続くとの報告が出ている強力な心理現象です。<br>
                            この「問いかけ行動効果」と次で説明するif then プランニングを組み合わせることにより、強力な実践効果を得ることができます。</p>
                        </div>
                        <div class="col-sm-4">
                            <h3 class="heading-content">If then プランニングとは？</h3>
                            <p class="text-content">if thenプランニングは習慣化するために一番役に立つツールです。<br>
                            その効果は多くの研究で認められています。<br>
                            やり方は非常に簡単！例えば毎日スクワットを２０回やるとしましょう。そのときに<br>もし家に帰ったらスクワットを２０回するとifthenプランニングを設定します。<br>
                            もし〇〇が起きたら△△をやるといった形式で実行のタイミングをルール化すると、自分がいつ何をすべきかをはっきり覚えることができ、実践率が上がります。
                            その強力なihthenプランニングをこのアプリでは採用して、みなさんの習慣化を助けます！</p>
                        </div>
                    </div>
                </div>
        </main>

    @else
        <h1><img src="image/Good-Habit1.png" alt"GoodHabit main-visual"></h1>
            <div class="text-center">
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'アカウント新規作成', [], ['class' => 'btn btn-lg btn-primary']) !!}
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>  
        </div>
    @endif
@endsection

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
                             Good Habitは習慣化を促進するアプリです。使えば今日からそんな辛い経験が変わります！</p>
                        </div>
                        <div class="col-sm-4">
                            <h3 class="heading-content">Good Habitの習慣化の仕組み</h3>
                            <p class="text-content">Good Habitは習慣化の代表と言われているif then プランニングを更に効果的な自分に対しての疑問文で終わるようにした新しいタイプの習慣化アプリです。<br>
                            「問いかけ行動効果」と呼ばれる心理現象に基づいています。宣言文よりも質問文のほうが行動を変える力を持ち、その効果は６ヶ月がすぎても続くとの報告が出ている強力な心理現象です。</p>
                        </div>
                        <div class="col-sm-4">
                            <h3 class="heading-content">If then プランニングとは？</h3>
                            <p class="text-content">if thenプランニングは習慣化するために一番役に立つツールです。その効果料は0.5以上とも言われています。
                            やり方は非常に簡単！例えば毎日スクワットを２０回やるとしましょう。そのときにもし家に帰ったらスクワットを２０回するとifthenプランニングを設定します。
                            科学的な指標の効果料では0.3でも効果があると言われているので、圧倒的な効果料を持っています。
                            その強力なihthenプランニングをこのアプリでは採用して、みなさんの習慣化を助けます！</p>
                        </div>
                    </div>
                </div>
        </main>

    @else
        <div class="cover-image" style="background:url(image/Good-Habit1.png); background-size:cover;">
            <div class="text-center signin-button">
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'アカウント新規作成', [], ['class' => 'btn btn-lg btn-primary']) !!}
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>  
        </div>
    @endif
@endsection

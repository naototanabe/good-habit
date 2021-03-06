<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark navbar-top "style="background-color:#68a9cf;">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">Good Habit</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
    @if (Auth::check())
            <ul class="navbar-nav mr-auto">
                    {{-- ユーザページのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.show', 'ユーザページ', ['user' => Auth::id()], ['class' => 'nav-link']) !!}</li>
                    {{-- 習慣新規作成ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('habits.create', '習慣新規作成', [], ['class' => 'nav-link']) !!}</li>
            </ul>   
            <ul class="navbar-nav ml-auto">
                    {{-- ログアウトへのリンク --}}
                    <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [],  ['class' => 'nav-link']) !!}</li>
            </ul>
            
                
    @else
                    <ul class="navbar-nav ml-auto">
                        {{-- ログインページへのリンク --}}
                        <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                        {{-- ユーザ登録ページへのリンク --}}
                        <li class="nav-item">{!! link_to_route('signup.get', 'アカウント新規作成', [], ['class' => 'nav-link']) !!}</li>
                    </ul>
    
    @endif        
        </div>
      
    </nav>
</header>
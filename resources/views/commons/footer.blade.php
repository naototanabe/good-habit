<footer>
        <a class="footer-link" href="/">Good Habit</a>
        @if (Auth::check())
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="本日の習慣を達成しました！" data-url="https://good-habit-jp.herokuapp.com/" data-hashtags="goodhabit" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        @endif
</footer>
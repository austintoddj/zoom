<div class="text-center">
    <hr>

    <p class="small text-muted">Connect with one of your other accounts:</p>

    @if(env('FACEBOOK_CLIENT_ID') && env('FACEBOOK_CLIENT_SECRET') && env('FACEBOOK_REDIRECT'))
        <a href="{{ url('login/facebook') }}" aria-label="Login with Facebook"><i
                    class="fab fa-fw fa-facebook fa-2x facebook"></i></a>
    @endif

    @if(env('TWITTER_CLIENT_ID') && env('TWITTER_CLIENT_SECRET') && env('TWITTER_REDIRECT'))
        <a href="{{ url('login/twitter') }}" aria-label="Login with Twitter"><i
                    class="fab fa-fw fa-twitter-square fa-2x twitter"></i></a>
    @endif

    @if(env('GOOGLE_CLIENT_ID') && env('GOOGLE_CLIENT_SECRET') && env('GOOGLE_REDIRECT'))
        <a href="{{ url('login/google') }}" aria-label="Login with Google"><i
                    class="fab fa-fw fa-google-plus-square fa-2x google-plus"></i></a>
    @endif

    @if(env('GITHUB_CLIENT_ID') && env('GITHUB_CLIENT_SECRET') && env('GITHUB_REDIRECT'))
        <a href="{{ url('login/github') }}" aria-label="Login with Github"><i
                    class="fab fa-fw fa-github-square fa-2x github"></i></a>
    @endif
</div>

@push('scripts')
    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
@endpush
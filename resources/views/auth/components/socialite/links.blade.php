<label class="col-sm-4 col-form-label text-md-right">Connect With</label>

<div class="col-md-6">
    @if(config('socialite.facebook.client_id') && config('socialite.facebook.client_secret') && config('socialite.facebook.redirect'))
        <a href="{{ url('login/facebook') }}" aria-label="Login with Facebook"><i
                    class="fab fa-fw fa-facebook fa-2x"></i></a>
    @endif

    @if(config('socialite.twitter.client_id') && config('socialite.twitter.client_secret') && config('socialite.twitter.redirect'))
        <a href="{{ url('login/twitter') }}" aria-label="Login with Twitter"><i
                    class="fab fa-fw fa-twitter-square fa-2x"></i></a>
    @endif

    @if(config('socialite.google.client_id') && config('socialite.google.client_secret') && config('socialite.google.redirect'))
        <a href="{{ url('login/google') }}" aria-label="Login with Google"><i
                    class="fab fa-fw fa-google-plus-square fa-2x"></i></a>
    @endif

    @if(config('socialite.github.client_id') && config('socialite.github.client_secret') && config('socialite.github.redirect'))
        <a href="{{ url('login/github') }}" aria-label="Login with Github"><i
                    class="fab fa-fw fa-github-square fa-2x"></i></a>
    @endif

    @push('scripts')
        <script defer src="{{ url('https://use.fontawesome.com/releases/v5.0.6/js/all.js') }}"></script>
    @endpush
</div>
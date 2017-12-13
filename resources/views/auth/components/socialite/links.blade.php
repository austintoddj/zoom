<div class="form-group row">
    <div class="col-lg-4"></div>
    <div class="col-lg-6" align="center">
        <hr>
        <p class="text-muted small">Or connect with one of your other accounts</p>

        @if(env('FACEBOOK_CLIENT_ID') && env('FACEBOOK_CLIENT_SECRET') && env('FACEBOOK_REDIRECT'))
            <a href="{{ url('login/facebook') }}"><i class="fab fa-fw fa-facebook fa-2x facebook"></i></a>
        @endif

        @if(env('TWITTER_CLIENT_ID') && env('TWITTER_CLIENT_SECRET') && env('TWITTER_REDIRECT'))
            <a href="{{ url('login/twitter') }}"><i class="fab fa-fw fa-twitter-square fa-2x twitter"></i></a>
        @endif

        @if(env('GOOGLE_CLIENT_ID') && env('GOOGLE_CLIENT_SECRET') && env('GOOGLE_REDIRECT'))
            <a href="{{ url('login/google') }}"><i class="fab fa-fw fa-google-plus-square fa-2x google-plus"></i></a>
        @endif

        @if(env('GITHUB_CLIENT_ID') && env('GITHUB_CLIENT_SECRET') && env('GITHUB_REDIRECT'))
            <a href="{{ url('login/github') }}"><i class="fab fa-fw fa-github-square fa-2x github"></i></a>
        @endif
    </div>
</div>

@push('scripts')
    <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>
@endpush
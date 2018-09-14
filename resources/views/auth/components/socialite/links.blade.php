@if(config('socialite.facebook.client_id') && config('socialite.facebook.client_secret') && config('socialite.facebook.redirect'))
    <div class="col-md-12 mb-2">
        <a href="{{ url('login/facebook') }}" class="btn btn-outline-primary btn-block">
            <i class="fab fa-fw fa-facebook"></i> Connect with Facebook
        </a>
    </div>
@endif

@if(config('socialite.twitter.client_id') && config('socialite.twitter.client_secret') && config('socialite.twitter.redirect'))
    <div class="col-md-12 mb-2">
        <a href="{{ url('login/twitter') }}" class="btn btn-outline-primary btn-block">
            <i class="fab fa-fw fa-twitter-square"></i> Connect with Twitter
        </a>
    </div>
@endif

@if(config('socialite.google.client_id') && config('socialite.google.client_secret') && config('socialite.google.redirect'))
    <div class="col-md-12 mb-2">
        <a href="{{ url('login/google') }}" class="btn btn-outline-primary btn-block">
            <i class="fab fa-fw fa-google-plus-square"></i> Connect with Google
        </a>
    </div>
@endif

@if(config('socialite.github.client_id') && config('socialite.github.client_secret') && config('socialite.github.redirect'))
    <div class="col-md-12 mb-2">
        <a href="{{ url('login/github') }}" class="btn btn-outline-primary btn-block">
            <i class="fab fa-fw fa-github-square"></i> Connect with Github
        </a>
    </div>
@endif

@push('scripts')
    <script defer src="{{ url('https://use.fontawesome.com/releases/v5.3.1/js/all.js') }}"
            integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB"
            crossorigin="anonymous"></script>
@endpush
<html>
<head>
    @include('partials._head')
</head>
<body>
<div id="wrap">
    @include('partials._nav')
<div id="main" class="row">
    <div class="col s6 offset-s3">
        @include('partials._messages')
    </div>
    <div class="col s6 offset-s3 card-panel indigo lighten-5">
        @yield('content')
    </div>
    <div class="col s8 offset-s2 card-panel indigo lighten-5">
        @yield('content_post')
    </div>
</div>
    <div class="push"></div>
</div>
@include('partials._footer')
@yield('scripts')
@include('partials._javascript')
</body>
</html>
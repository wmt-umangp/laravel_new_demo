<h1>{{"Welcome",}}
    @if(Auth::guard('student')->check())
        {{Auth::guard('student')->user()->name}}
    @endif
</h1>

<a href="{{route('slogout')}}">Logout</a>

@extends('app')

@section('content')
    <div class="container">
        <div class="well">
            @if(Auth::guest())
                Please sign in to the account
            @else
                You are logged in successfully! Now you can create a new stadium or book a place.
                {{--<p><a href="{{ route('store') }}"> Lets go to the store!</a></p>--}}
            @endif
        </div>
    </div>
@endsection
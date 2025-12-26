{{--
//while practicing routes
 <div>
    <h2>Contact Us</h2>

    <h2>Name: {{ request()->name }}</h2>
    <h2>ID: {{ request()->id }}</h2>

    @include('SubViews.Input', [
            'myName' => request()->name,
        ])
</div> --}}


{{-- while practicing layouts --}}
@extends('layouts.app')

@section('content')
<div>
    <h2>Contact Us</h2>
</div>
@endsection

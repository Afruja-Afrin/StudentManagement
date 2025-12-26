@extends('layouts.app')


@section('scripts')
<script>
    alert('hi')
</script>
@endsection


@section('content')
    <section>
        <h2>About Us</h2>
        <h4>Hello {{ $name }}</h4>
        <h4>Your ID is {{ $id }}</h4>
        <p>This is a simple HTML and CSS template to start your project</p>
    </section>
@endsection





    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            background: #005bb5;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            padding: 14px 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        .container {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background: #f4f4f4;
            padding: 15px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        footer {
            background: #004080;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
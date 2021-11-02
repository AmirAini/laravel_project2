@extends('layout.default')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5">
    <form method="post">
        @csrf
        <br>
        <p>email</p>
        <input type="text" name="email" id="email" />
    <br>
    <br>

    <p>password</p>
        <input type="password" name="password" id="password" />
    <br>
    <br>
        <input type="submit">
    </form>
</div>
@extends('layout.default')
@section('content')

@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif

<form method="post">
    @csrf
    <input type="text" name="id" id="id" value="{{$company->id}}"/>
    <input type="text" name="name" id="name" value="{{$company->name}}"/>
    <input type="submit">
</form>

{{-- {{$company->id}}
{{$company->name}} --}}
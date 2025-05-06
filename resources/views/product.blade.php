@extends('layouts.main')

@section('title', 'Pg Produtos')

@section('content')

    @if($id != null) 
    <p>Id do produto: {{ $id }}</p>
    @endif


@endsection

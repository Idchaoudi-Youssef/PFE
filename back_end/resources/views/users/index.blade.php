@extends('layouts.base')
@section('content')
    <h1>User Dashboard</h1>
    <p>Bienvenue, {{ Auth::user()->name }}!</p>

    <a href="{{route('admin.users')}}" class="btn btn-warning mt-5">Users</a>
    <a href="{{ route('user.listproducts', ['id' =>  Auth::id()]) }}" class="btn btn-warning mt-5">Products</a>
    @endsection
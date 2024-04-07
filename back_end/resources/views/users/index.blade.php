@extends('layouts.base')
@section('content')
    <h1>User Dashboard</h1>
    <p>Bienvenue, {{ Auth::user()->name }}!</p>

    <a href="{{route('user.profile', ['id' =>  Auth::id()])}}" class="btn btn-warning mt-5">Users</a>
    <a href="{{ route('user.listproducts', ['id' =>  Auth::id()]) }}" class="btn btn-warning mt-5">Your Products</a>
    <a href="{{ route('user.waitinglist', ['id' =>  Auth::id()]) }}" class="btn btn-warning mt-5">Waiting Products</a>
    <a href="{{ route('user.approvedlist', ['id' =>  Auth::id()]) }}" class="btn btn-warning mt-5">Products Approved</a>
    <a href="{{ route('user.rejectedlist', ['id' =>  Auth::id()]) }}" class="btn btn-warning mt-5">Products Rejected</a>

    @endsection
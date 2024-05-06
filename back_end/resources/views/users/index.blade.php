@extends('layouts.base')
@section('content')
    <h1>User Dashboard</h1>
    @if(Auth::user()->email_verified_at !== null)
    <a href="{{ route('user.profile', ['id' => Auth::id()]) }}" class="btn btn-warning mt-5">Users</a>
    <a href="{{ route('user.listproducts', ['id' => Auth::id()]) }}" class="btn btn-warning mt-5">Your Products</a>
    <a href="{{ route('user.waitinglist', ['id' => Auth::id()]) }}" class="btn btn-warning mt-5">Waiting Products</a>
    <a href="{{ route('user.approvedlist', ['id' => Auth::id()]) }}" class="btn btn-warning mt-5">Products Approved</a>
    <a href="{{ route('user.rejectedlist', ['id' => Auth::id()]) }}" class="btn btn-warning mt-5">Products Rejected</a>
    <a href="{{ route('user.reset', ['id' => Auth::id()]) }}" class="btn btn-warning mt-5">Password Reset</a>
    <a href="{{ route('user.CreateProducts', ['id' => Auth::id()]) }}" class="btn btn-warning mt-5">Add product</a>



    @else
        <p>Please confirm your email address to access these features.</p>
    @endif
    @endsection
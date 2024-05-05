@extends('layouts.base')
@section('content')
    <h1>Admin Dashboard</h1>

    
     
    <a href="{{route('admin.users')}}" class="btn btn-warning mt-5">Users</a>
    <a href="{{route('admin.products')}}" class="btn btn-warning mt-5">Products</a>
    <a href="{{route('admin.Verifiedproducts')}}" class="btn btn-warning mt-5">Verified Products</a>

    {{-- <a href="{{route('admin.brands')}}" class="btn btn-warning mt-5">Brands</a> --}}
    <a href="{{route('admin.categories')}}" class="btn btn-warning mt-5">Categories</a>
@endsection
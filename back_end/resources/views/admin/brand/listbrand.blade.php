@extends('layouts.base')
@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>brandss</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">brandss</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Cart Section Start -->

<div class="col-sm-5 col-7">
    <div class="left-side-button float-start">
        <a href="{{route('brands.create')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
            <i class="fas fa-arrow-left"></i> Add New brands</a>
    </div>
</div>



<section class="cart-section section-b-space">
    <div class="container">
        @if($brands->Count() > 0)
        <div class="row">
            <div class="col-md-12 text-center">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">ID</th>
                            <th scope="col">name</th>
                            <th scope="col">slug</th>
                            <th scope="col">image</th>
                            <th scope="col">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brands)
                        <tr>
                            <td> {{ $brands->id }}</td>
                            <td>
                                <a href="#" class="font-light">{{ $brands->name }}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <p>{{ $brands->slug }}</p>
                                    </div>
                                    <div class="col">
                                        <p class="fw-bold">{{ $brands->image }}</p>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            <a href="javascript:void(0)" class="icon">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </h2>
                                        <h2 class="td-color">
                                            <a href="javascript:void(0)" class="icon">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-bold">{{ $brands->name }}</p>
                            </td>
                            <td>
                                <a href="#">
                                    <img src="{{ asset('storage/'.$brands->image) }}" class="blur-up lazyloaded" alt="{{$brands->name}}">
                                </a>                            
                            </td>
                            <td>
                                <a href="{{ route('admin.editBrand', ['id' => $brands->id]) }}" class="icon">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" class="icon" onclick="confirm('Are you sure?') && document.getElementById('delete-form-{{ $brands->id }}').submit();">
                                    <i class="fas fa-times"></i>
                                </a>
                                {{-- <!-- Assurez-vous d'ajouter le formulaire de suppression ici, par exemple: --}}
                                <form id="delete-form-{{ $brands->id }}" action="{{route('admin.deleteBrand' , ['id' => $brands->id])}}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Your Table is empty !</h2>
                    <h5 class="mt-3">Add brands now.</h5>
                    <a href="#" class="btn btn-warning mt-5">Add Now</a>
                </div>
            </div>
        @endif
    </div>
</section>


@endsection





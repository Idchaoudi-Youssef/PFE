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
                <h3>Brands</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Brands</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Cart Section Start -->


<!-- Cart Section Start -->
<section class="section-b-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <form class="needs-validation" method="POST" action="{{ route('admin.UpdateBrand', $brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">Formulaire Brands</h3>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Full Name" value="{{$brand->name}}">
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                placeholder="Enter Email" value="{{$brand->slug}}">
                        </div>
                    
                        <!-- Modification ici pour l'ajout de photos -->
                        <div class="col-md-6">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{$brand->image}}" placeholder="image" required accept="image/png, image/jpeg">
                        </div>
                        
                        
                        <button class="btn btn-solid-default mt-4" type="submit">Update</button>
                        
                    </div>
                
                </form>
            </div>

            
            </div>
        </div>
    </div>
</section>
@endsection


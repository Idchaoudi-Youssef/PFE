@extends('layouts.base')
@section('content')

<section class="section-b-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <form class="needs-validation" method="POST" id="contactForm" action="{{route('admin.UpdateProduct' , $product->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">Billing address</h3>

                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Full Name" value="{{ old('name', $product->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Enter Phone Number" value="{{ old('slug', $product->slug) }}">
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label for="short_description" class="form-label">Short Description</label>
                            <input type="text" class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" placeholder="Locality" value="{{ old('short_description', $product->short_description) }}">
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="regular_price" class="form-label">Regular Price</label>
                            <input type="number" class="form-control  @error('regular_price') is-invalid @enderror" id="regular_price" name="regular_price" placeholder="Locality" value="{{(old('regular_price', $product->regular_price))}}">
                            @error('regular_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        

                        

                        <div class="col-md-3">
                            <label for="stock_status" class="form-label">Stock Status</label>
                            <select class="form-select custome-form-select @error('stock_status') is-invalid @enderror" id="stock_status" name="stock_status">
                                <option selected="" disabled=""  value="{{old('stock_status', $product->stock_status)}}"></option>
                                <option value="instock">In Stock</option>
                                <option value="outofstock">Out of Stock</option>
                            </select>
                            @error('stock_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
{{-- 
                        <div class="col-md-6">
                            <label for="featured" class="form-label">Featured</label>
                            <input type="number" class="form-control @error('description') is-invalid @enderror" id="featured" name="featured"
                                placeholder="Locality" value="{{old('featured', $product->featured)}}">
                            @error('featured')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div> --}}

                        


                        <div class="col-md-6">
                            <label for="imagess" class="form-label">Photo</label>
                            <input type="file" class="form-control @error('description') is-invalid @enderror" id="imagess" name="imagess[]" placeholder="imagess"  multiple accept="image/png, image/jpeg, image/webp">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="category_id" class="form-label">Categories</label>
                            <select class="form-select custome-form-select" id="category_id" name="category_id">
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                        </div>

                       

                        <div class="col-md-3">
                            <label for="categorie_product" class="form-label">categorie_product</label>
                            <select class="form-select custome-form-select" id="categorie_product" name="categorie_product">
                                <option value="VET">Vetement</option>
                                <option value="INF">Materiel Informatique</option>
                            </select>
                        </div>

                       

                        

                    
                    <button class="btn btn-solid-default mt-4" type="submit" onclick="submitForm(event)">Upgrade</button>
                </form>

                <script>
                    function submitForm(event) {
                        event.preventDefault(); 
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, send it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.getElementById('contactForm').submit(); 
                            }
                        });
                    }
                </script>
            </div>

            
        </div>
    </div>
</section>
</section>
@endsection


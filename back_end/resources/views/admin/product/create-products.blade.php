@extends('layouts.base')
@section('content')

<section class="section-b-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <form class="needs-validation" method="POST" action="{{route('admin.StoreProduct')}}" enctype="multipart/form-data" id="contactForm">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">Billing address</h3>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Full Name">
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6">
                            <label for="short_description" class="form-label">Short Description</label>
                            <input type="text" class="form-control" id="short_description" name="short_description"
                                placeholder="Short Description">
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>

                        </div>

                        <div class="col-md-6">
                            <label for="regular_price" class="form-label">Regular Price</label>
                            <input type="number" class="form-control" id="regular_price" name="regular_price"
                                placeholder="Regular Price">
                        </div>

                        <div class="col-md-6">
                            <label for="sale_price" class="form-label">Sale Price</label>
                            <input type="number" class="form-control" id="sale_price" name="sale_price"
                                placeholder="Sale Price">
                        </div>

                        <div class="col-md-6">
                            <label for="SKU" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="SKU" name="SKU"
                                placeholder="SKU">
                        </div>

                        <div class="col-md-3">
                            <label for="stock_status" class="form-label">Stock Status</label>
                            <select class="form-select custome-form-select" id="stock_status" name="stock_status">
                                <option selected="" disabled="" value="">Choose...</option>
                                <option value="instock">In Stock</option>
                                <option value="outofstock">Out of Stock</option>
                            </select>
                        </div>

                        {{-- <div class="col-md-6" style="display:none">
                            <input type="number" class="form-control" id="featured" name="featured"
                                placeholder="Featured" value="null">
                        </div> --}}

                        <div class="col-md-6">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder="Quantity">
                        </div>


                        <div class="col-md-6">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="image" required accept="image/png, image/jpeg">
                        </div>

                        <div class="col-md-6">
                            <label for="imagess" class="form-label">Photos Supplémentaires</label>
                            <input type="file" class="form-control" id="imagess" name="imagess[]" multiple accept="image/png, image/jpeg, image/webp">
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
                            <label for="brand_id" class="form-label">Brands</label>
                            <select class="form-select custome-form-select" id="brand_id" name="brand_id">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                        
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button class="btn btn-solid-default mt-4" onclick="submitForm(event)" type="submit">Ajouter Produit</button>
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


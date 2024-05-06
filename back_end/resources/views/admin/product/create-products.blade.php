    @extends('layouts.base')

    @section('content')
    <section class="section-b-space">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <form class="needs-validation" method="POST" action="{{ route('admin.StoreProduct') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div id="billingAddress" class="row g-4">
                            <h3 class="mb-3 theme-color">Billing address</h3>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name">
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                            </div>
                            <div class="col-md-6">
                                <label for="short_description" class="form-label">Short Description</label>
                                <input type="text" class="form-control" id="short_description" name="short_description" placeholder="Short Description">
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="regular_price" class="form-label">Regular Price</label>
                                <input type="number" class="form-control" id="regular_price" name="regular_price" placeholder="Regular Price">
                            </div>
                            <div class="col-md-3">
                                <label for="stock_status" class="form-label">Stock Status</label>
                                <select class="form-select custome-form-select" id="stock_status" name="stock_status">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="instock">In Stock</option>
                                    <option value="outofstock">Out of Stock</option>
                                </select>
                            </div>
                            <div class="col-md-6" style="display:none">
                                <input type="number" class="form-control" id="featured" name="featured" placeholder="Featured" value="null">
                            </div>
                            <div class="col-md-6">
                                <label for="imagess" class="form-label">Photo</label>
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
                                <label for="categorie_product" class="form-label">Category Product</label>
                                <select class="form-select custome-form-select" id="categorie_product" name="categorie_product">
                                    <option value="VET">Vetement</option>
                                    <option value="INF">Materiel Informatique</option>
                                </select>
                            </div>
                            <h4 class="mb-3 mt-4">Specifications</h4>
                            <div id="input-group-container">
                                <!-- First Input Group -->
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="split_input[0][attribute]" placeholder="Attribute">
                                    <input type="text" class="form-control" name="split_input[0][value]" placeholder="Value">
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mt-3" onclick="addInputGroup()">Add More</button>
                        </div>
                        <button class="btn btn-solid-default mt-4" type="submit">Ajouter Produit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
    function addInputGroup() {
        // Get the container to add input groups dynamically
        const container = document.getElementById('input-group-container');
        const index = container.children.length; // Determine the current number of input groups

        // Create a new div for the input group
        const inputGroupDiv = document.createElement('div');
        inputGroupDiv.className = 'input-group mb-3';

        // Create the attribute input field
        const attributeInput = document.createElement('input');
        attributeInput.type = 'text';
        attributeInput.className = 'form-control';
        attributeInput.name = `split_input[${index}][attribute]`;
        attributeInput.placeholder = 'Attribute';

        // Create the value input field
        const valueInput = document.createElement('input');
        valueInput.type = 'text';
        valueInput.className = 'form-control';
        valueInput.name = `split_input[${index}][value]`;
        valueInput.placeholder = 'Value';

        // Append both input fields to the input group div
        inputGroupDiv.appendChild(attributeInput);
        inputGroupDiv.appendChild(valueInput);

        // Add the new input group to the container
        container.appendChild(inputGroupDiv);
    }
    </script>
    @endsection

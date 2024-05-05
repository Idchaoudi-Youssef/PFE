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
                <h3>Categorie</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Categorie</li>
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
                <form class="needs-validation" method="POST" action="{{route('admin.StoreCategorie')}}" id="contactForm" enctype="multipart/form-data">
                    @csrf
                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">Formulaire Categories</h3>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Full Name">
                        </div>
                        <div class="col-md-6">
                            <label for="parentCategory" class="form-label">ParentCategory</label>
                            <input type="text" class="form-control" id="parentCategory" name="parentCategory"
                                placeholder="Enter your parent category">
                        </div>

                     <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="state" name="state">
                            <label class="form-check-label" for="state">Active</label>
                        </div>
                    </div>
                        
                        
                        <button class="btn btn-solid-default mt-4" type="submit" onclick="submitForm(event)">Ajouter</button>
                        
                    </div>
                
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
    </div>
</section>
@endsection


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
                <h3>Users</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section-b-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                

                
                <form class="needs-validation" method="POST" action="{{ route('User.ResetPassword', $user->id) }}" id="contactForm">
                    @csrf
                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">Formulaire Users</h3>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="old_password" class="form-label">Ancien mot de passe</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Ancien mot de passe">
                            </div>
                        
                            <div class="col-md-6">
                                <label for="password" class="form-label">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="password" name="new_password" placeholder="Nouveau mot de passe">
                            </div>
                
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirmez le nouveau mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="new_password_confirmation" placeholder="Confirmez le nouveau mot de passe">
                            </div>
                        
                        </div>
                        <button type="submit" class="btn btn-solid-default mt-4">Réinitialiser le mot de passe</button>
                    </div>
                </form>
                
            </div>

            </div>
        </div>
    </div>
</section>
@endsection
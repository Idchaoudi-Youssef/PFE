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
                



                <form class="needs-validation" method="POST" action="{{ route('admin.UpdateUser', $user->id) }}">
                    @csrf
                    @method('PUT') 
                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">Formulaire Users</h3>
                        
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $user->name }}" placeholder="Enter Full Name" required>
                        </div>
                
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ $user->email }}" placeholder="Enter Email" required>
                        </div>
                
                        <div class="col-md-6">
                            <label for="password" class="form-label">New Password </label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                        </div>
                
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   value="{{ $user->phone }}" placeholder="Phone">
                        </div>
                
                        
                        <div class="col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address">{{ $user->address }}</textarea>
                        </div>
                
                        <div class="col-md-3">
                            <label for="utype" class="form-label">Type</label>
                            <select class="form-select custome-form-select" id="utype" name="utype" required>
                                <option value="USR" @if($user->utype == 'USR') selected @endif>User</option>
                                <option value="ADM" @if($user->utype == 'ADM') selected @endif>Admin</option>
                            </select>
                        </div>
                
                        <div class="col-md-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}">

                        </div>

                        <div class="col-md-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select custome-form-select" id="country" name="country">
                                <option>India</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select custome-form-select" id="state" name="state">
                                <option selected="" disabled="" value="">{{$user->state}}</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="123456" placeholder="{{$user->zip}}">
                        </div>


                        
                        <button class="btn btn-solid-default mt-4" type="submit">Mettre à jour</button>
                    </div>
                </form>




            </div>

            
            </div>
        </div>
    </div>
</section>
@endsection
@extends('timeline.master')
@section('content')
<!-- Top Banner -->
<section id="banner">
    <div class="container">
        <!-- Sign Up Form -->
        <div class="sign-up-form" style="width: 700px;">
            <h2 class="text-white">Find My Friends</h2>
            <div class="line-divider"></div>
            <div class="form-wrapper">
                <p class="signup-text">Fill your personal informations</p>
                <form action="/profile" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter name" required>
                        </fieldset>
                        <fieldset class="form-group">
                            <input type="text" class="form-control" id="age" name="age" placeholder="Enter age" required>
                        </fieldset>
                        <fieldset class="form-group">
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="" disabled="true" selected="true">Select Gender</option>
                                <option value="Laki-laki">Male</option>
                                <option value="Perempuan">Female</option>
                            </select>
                        </fieldset>  
                    </div>
                    
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <input type="number" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter a mobile number" required>
                        </fieldset>
                        <fieldset class="form-group">
                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required>
                        </fieldset>
                        <fieldset class="form-group">
                            <textarea class="form-control" name="address" id="address" rows="4" placeholder="Enter an address" required></textarea>
                        </fieldset>
                    </div>
                    <p>By fill your information you can find new friend here</p>
                    <button class="btn btn-secondary" type="submit">Submit</button>
                </form>
            </div>
        </div><!-- Sign Up Form End -->
    </div>
</section>
@endsection
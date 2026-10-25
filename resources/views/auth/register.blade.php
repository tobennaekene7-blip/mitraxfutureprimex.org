@extends('layouts.guest')

@section('title', 'Creaet Account')

@section('styles')
@parent

@endsection

@section('content')
<section class=" auth">

        <div class="container">
            <div class="pb-3 row justify-content-center">

                <div class="col-12 col-md-6 col-lg-6 col-sm-10 col-xl-6">
                    <a href="/"><img src="{{ $settings->logo_url }}" alt="" class="mb-3 img-fluid auth__logo"></a>
                    
                            @if(Session::has('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        
                    
                     <div class=" shadow  login-page roundedd border-1 ">
                        <div class="card-body">
                            <h4 class="text-center card-title" style="color:#69e2b0">Create an Account</h4>
                             <p class="text-{{$text}}" style="color:#fff">{{ date('l jS \of F Y h:i:s A') }}</p>
                            <form method="POST" action="{{ route('register') }}"  class="mt-4 login-form">
                                 @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label  style="color:#69e2b0 !important">UserName <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input type="text" id="input1" class="pl-5 form-control"  name="username" id="input1" placeholder="Enter Unique Username" required>
                                                
                                                @if ($errors->has('username'))
                                                <small class="text-danger">{{ $errors->first('username') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color:#69e2b0 !important">FullName <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="user-check" class="fea icon-sm icons"></i>
                                                <input type="text" class="pl-5 form-control"  name="name" value="{{ old('name') }}" id="f_name" placeholder="Enter FullName" required>
                                                
                                                @if ($errors->has('name'))
                                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color:#69e2b0 !important">Your Email <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input type="email" class="pl-5 form-control" name ="email" value="{{ old('email') }}" id="email" placeholder="name@example.com" required>
                                                @if ($errors->has('email'))
                                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color:#69e2b0 !important">Phone Number <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="phone" class="fea icon-sm icons"></i>
                                                <input type="phone" class="pl-5 form-control" name="phone" value="{{ old('phone') }}" id="phone" placeholder="Enter Phone number" required>
                                                @if ($errors->has('phone'))
                                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color:#69e2b0 !important">Password <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                <input type="password" class="pl-5 form-control" name="password" id="password" placeholder="Enter Password" required>
                                                @if ($errors->has('password'))
                                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color:#69e2b0 !important">Confirm Password <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                <input type="password" class="pl-5 form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" id="confirm-password" placeholder="Confirm Password" required>
                                                @if ($errors->has('password'))
                                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label style="color:#69e2b0 !important">Country <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="map-pin" class="fea icon-sm icons"></i>
                                                <select class="pl-5 form-control" name="country" id="country" required>
                                                    <option selected disabled>Choose Country</option>
                                                        @include('auth.countries')
                                                </select>
                                            </div>
                                            @if ($errors->has('country'))
                                            <small class="text-danger">{{ $errors->first('country') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    @if(Session::has('ref_by'))
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color:#69e2b0 !important">Referral ID <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input type="text" class="pl-5 form-control"  value="{{session('ref_by')}}" name="ref_by" placeholder="optional referral id" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color:#69e2b0 !important">Referral ID <span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input type="text" class="pl-5 form-control"  name="ref_by" placeholder="optional referral id">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    @if($settings->captcha == "true")
                                    <div class="col-lg-12">
                                        <div class="form-group  {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                            <label>Captcha<span class="text-danger">*</span></label>
                                            <div class="position-relative">
                                                {!! NoCaptcha::display() !!}
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($terms->useterms =='yes')
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                                    <label class="custom-control-label" for="customCheck1">I Accept the <a
                                                            href="{{route('privacy')}}" class="text-primary"style="color:#69e2b0 !important">Terms And Privacy Policy</a></label>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <!--end col-->

                                    <div class="mb-0 col-lg-12">
                                        <button class="btn btn-primary btn-block pad" style="background-color:#05803a !important"type="submit">Register</button>
                                    </div>
                                    <!--end col-->

                                    <div class="mt-4 text-center col-lg-12">
                                        @if($settings->enable_social_login == "yes")
                                        <h6>Or Login With</h6>
                                        <div class="row">
                                            <!--end col-->
                                            <div class="mt-3 col-12">
                                                <a href="{{route('social.redirect', ['social' => 'google'])}}" class="btn btn-block btn-light"><i
                                                        class="mdi mdi-google text-danger"></i> Google</a>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        @endif
                                    </div>
                                    <!--end col-->
                                    <!--end col-->

                                    <div class="text-center col-12">
                                        <p class="mt-3 mb-0"><small class="mr-2 text-white">Already have an account
                                                </small> <a href="{{ route('login') }}"
                                                class="text-white font-weight-bold">Login</a></p>
                                    </div>
                                    <!--end col-->
                                    
                                    <div class="text-center col-12">
                                        <p class="mt-4 mb-0"><small class="mr-2 text-dark" style="color:#05803a !important">&copy; Copyright  {{date('Y')}} &nbsp; {{$settings->site_name}} &nbsp; All Rights Reserved.</small>
                                        </p>
                                    </div>
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                    <!---->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->



@endsection

@section('scripts')
@parent
<script>
    $('#input1').on('keypress', function(e) {
        return e.which !== 32;
    });
</script>
@endsection
@include('auth.layouts.header')

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
                                    <img src="../../../app-assets/images/pages/forgot-password.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2 py-1">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Recover your password</h4>
                                            </div>
                                        </div>

                                        @if($token !== NULL && $email !== NULL)
                                            <p class="px-2 mb-0">Please enter your new password with confirmation to reset your lost password.</p>
                                            @else
                                            <p class="px-2 mb-0">Please enter your email address and we'll send you password reset option to your email.</p>
                                        @endif
                                        <div class="card-content">
                                            <div class="card-body">
                                                @include('msg.msg')

                                                <!-- get reset link to email -->
                                                @if($token !== NULL && $email !== NULL)
                                                <form action="{{ route('passwordReset.post') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="token" value="{{ $token }}">
                                                    <input type="hidden" name="email" value="{{ $email }}">
                                                    <div class="form-label-group">
                                                        <input type="password" class="form-control" placeholder="New Password"
                                                            name="password">
                                                        <label for="inputEmail">New Password</label>
                                                    </div>

                                                    <div class="form-label-group">
                                                        <input type="password" class="form-control" placeholder="Confirm Password"
                                                            name="password_confirmation">
                                                        <label for="inputEmail">Confirm Password</label>
                                                    </div>

                                                    <div class="float-md-left d-block mb-1">
                                                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-block px-75">Back to Login</a>
                                                    </div>
                                                    <div class="float-md-right d-block mb-1">
                                                        <button type="submit" class="btn btn-primary btn-block px-75">Reset Password</button>
                                                    </div>
                                                </form>

                                                @else
                                                <!-- reset the password -->
                                                <form action="{{ route('sendPassResetLink.post') }}" method="POST">
                                                    @csrf
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email"
                                                            name="email" value="{{ old('email') }}">
                                                        <label for="inputEmail">Email</label>
                                                    </div>

                                                    <div class="float-md-left d-block mb-1">
                                                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-block px-75">Back to Login</a>
                                                    </div>
                                                    <div class="float-md-right d-block mb-1">
                                                        <button type="submit" class="btn btn-primary btn-block px-75">Recover Password</button>
                                                    </div>
                                                </form>

                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>

        </div>
    </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
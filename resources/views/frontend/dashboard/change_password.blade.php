@extends('frontend.main_master')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Inner Banner -->
<div class="inner-banner inner-bg6">
    <div class="container">
        <div class="inner-title">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>User Dashboard </li>
            </ul>
            <h3>User Dashboard</h3>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<!-- Service Details Area -->
<div class="service-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.dashboard.user_menu')
            </div>


            <div class="col-lg-9">
                <div class="service-article">


                    <section class="checkout-area pb-70">
                        <div class="container">
                            <form action="{{ route('user.password.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-details">
                                            <h3 class="title">Change Password </h3>

                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-sm-6">
                                                        <label>Old Password <span class="required">*</span></label>
                                                    </div>
                                                    <div class="text-secondary input-group" id="show_hide_password">
                                                        <input type="password" name="old_password"
                                                            class="form-control @error('old_password') is-invalid @enderror"
                                                            id="old_password" required /> <a href="javascript:;"
                                                            class="input-group-text bg-transparent"><i
                                                                class="bx bx-hide"></i></a>
                                                    </div>
                                                    @error('old_password')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="col-sm-6">
                                                            <label>New Password<span class="required">*</span></label>
                                                        </div>
                                                        <div class="col-sm-6 text-secondary input-group"
                                                        id="show_hide_password1">
                                                        <input type="password" name="new_password"
                                                            class="form-control @error('new_password') is-invalid @enderror"
                                                            id="new_password" required /> <a href="javascript:;"
                                                            class="input-group-text bg-transparent"><i
                                                                class="bx bx-hide"></i></a>
                                                        </div>
                                                        @error('new_password')
                                                        <span class="text-danger"> {{ $message }} </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="col-sm-6">
                                                            <label>Confirm New Password <span class="required">*</span></label>
                                                        </div>
                                                        <div class="col-sm-6 text-secondary input-group"
                                                        id="show_hide_password2">
                                                        <input type="password" name="new_password_confirmation"
                                                            class="form-control" id="new_password_confirmation"
                                                            required /> <a href="javascript:;"
                                                            class="input-group-text bg-transparent"><i
                                                                class="bx bx-hide"></i></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-4 text-secondary">
                                                        <input type="submit" class="btn btn-primary px-4"
                                                            value="Save Changes" />
                                                    </div>
                                                    <div class="col-sm-4"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </section>

                </div>
            </div>


        </div>
    </div>
</div>
<!-- Service Details Area End -->
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });

        $("#show_hide_password1 a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password1 input').attr("type") == "text") {
                $('#show_hide_password1 input').attr('type', 'password');
                $('#show_hide_password1 i').addClass("bx-hide");
                $('#show_hide_password1 i').removeClass("bx-show");
            } else if ($('#show_hide_password1 input').attr("type") == "password") {
                $('#show_hide_password1 input').attr('type', 'text');
                $('#show_hide_password1 i').removeClass("bx-hide");
                $('#show_hide_password1 i').addClass("bx-show");
            }
        })

        ;$("#show_hide_password2 a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password2 input').attr("type") == "text") {
                $('#show_hide_password2 input').attr('type', 'password');
                $('#show_hide_password2 i').addClass("bx-hide");
                $('#show_hide_password2 i').removeClass("bx-show");
            } else if ($('#show_hide_password2 input').attr("type") == "password") {
                $('#show_hide_password2 input').attr('type', 'text');
                $('#show_hide_password2 i').removeClass("bx-hide");
                $('#show_hide_password2 i').addClass("bx-show");
            }
        });
    });
</script>


@endsection

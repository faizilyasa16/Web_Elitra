@extends('frontend.layout')

@section('content')

<style>
     .nav-link {
            transition: 0.3s;
        }

        .active-border {
            border: 2px solid white;
        }

        .nav-link:hover {
            background-color: #343a40;
        }

        .bg-primary-dark {
            background-color: #1C2655;
        }

        .bg-primary-dark-bit {
            background-color: #222C65;
        }
        .hide-footer {
            display: none;
        }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-auto bg-primary-dark" style="min-height: 100vh; width: 100px; overflow: hidden; padding-top: 95px;">
            <hr class="text-white">
            <ul class="nav nav-pills flex-column mb-auto ">
                <li class="nav-item text-center mt-3">
                    <a href="{{ route('profile') }}" class="text-white text-center">
                        <span class="nav-link icon-wrapper bg-primary-dark-bit rounded-2 d-flex justify-content-center align-items-center mx-auto" style="width: 50px; height: 50px;">
                            <i class="fs-4 text-white fa-solid bi-person-fill"></i>
                        </span>
                        <span class="fs-6 mt-2 mb-3 d-inline-block link-underline link-underline-opacity-0">Profile</span>
                    </a>
                </li>
                <!-- Additional sidebar items -->
                <li class="nav-item text-center mt-3">
                    <a href="{{ route('history') }}" class="text-white text-center">
                        <span class="nav-link icon-wrapper bg-primary-dark-bit rounded-2 d-flex justify-content-center align-items-center mx-auto" style="width: 50px; height: 50px;">
                            <i class="fs-4 text-white fa-solid bi-envelope-fill"></i>
                        </span>
                        <span class="fs-6 mt-2 mb-3 d-inline-block link-underline link-underline-opacity-0">Feedback</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="col"> <!-- Main Content now using col-12 -->
            @yield('profile_dashboard') <!-- This will render the main content -->
        </div>
    </div>
</div>

@endsection
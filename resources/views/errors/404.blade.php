@extends('frount.index')

@section('content')
<div class="error-404-area section-space-y-axis-100" data-bg-image="{{ asset('public/assets/images/error-404/bg/1-1920x886.png')}}">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12 align-self-center">
                <div class="error-404-content">
                    <div class="error-404-img">
                        <img src="{{ asset('public/assets/images/error-404/404.png')}}" alt="Error Image">
                    </div>
                    <h2 class="title"><span>Oops,</span> page not found!</h2>
                    <div class="button-wrap">
                        <a class="btn btn-error" href="{{route('home.index')}}">Back to home
                            <i class="pe-7s-home"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
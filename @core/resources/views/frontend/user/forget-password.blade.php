@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Forget Password')}}
@endsection
@section('content')
    <section class="login-page-wrapper padding-top-120 padding-bottom-120">
        <div class="container">
            <div class="row justify-content-center my-4">
                <div class="col-lg-6">
                    <div class="login-form-wrapper">
                        <h3 class="title">{{__('Forget Password ?')}}</h3>
                        @include('backend.partials.message')
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('user.forget.password')}}" method="post" enctype="multipart/form-data" class="account-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="{{__('Username')}}">
                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" class="submit-btn width-220">{{__('Send Reset Mail')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('client.master')
@section('content')
<div class="hero-box pb-0 hero-bg-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-content pb-5">
                <div class="section-heading "></div>
                    <p class="sec__desc pb-2" style="color: white">Hotel stays, Dream getaways</p>
                    <h2 class="sec__title" style="color: white">
                        Find the Perfect Place to Stay <br />
                        for Your Next Trip
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-body without-side" >
        <div class="form-holder" >
            <div class="form-content">
                <div class="form-items">
                    @if($errors ->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                    <h3>Login to account</h3>
                    <p>Access to the most powerfull tool in the entire design and web industry.</p>
                    <form action="" method="post">
                        @csrf
                        <input class="form-control" type="text" name="email" placeholder="E-mail Address" >
                        <input class="form-control" type="password" name="password" placeholder="Password" >
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Login</button> <a href="{{route('user.create')}}">Register new account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

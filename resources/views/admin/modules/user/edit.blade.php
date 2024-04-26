@extends('client.master')
@section('module','Edit')
@section('action','Users')
@section('content')
<section class="breadcrumb-area bread-bg-7">
    <div class="breadcrumb-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="breadcrumb-content">
                        <div class="section-heading">
                            <h2 class="sec__title text-white">Edit your profile</h2>
                        </div>
                    </div><!-- end breadcrumb-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="breadcrumb-list text-right">
                        <ul class="list-items">
                            <li><a href="{{route('client.index')}}">Home</a></li>
                            <li>Edit your profile</li>
                        </ul>
                    </div><!-- end breadcrumb-list -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end breadcrumb-wrap -->

</section>
<div class="form-box">
    <div class="form-title-wrap form-content">
        <h3 class="title"><i class="la la-user mr-2 text-gray"></i>Your information</h3>
    </div><!-- form-title-wrap -->

    <div class="form-content contact-form-action">
    @if($errors ->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
    @endif
        <form class="row" action="{{route('user.update',['id'=>$id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-6 responsive-column">
                <div class="input-box">
                    <label class="label-text">Your Name</label>
                    <div class="form-group">
                        <input class="form-control" type="text" name="full_name" placeholder="Your name" value="{{old('full_name',$user->full_name)}}">
                    </div>
                </div>
                    <div class="input-box">
                    <label class="label-text">Your Email</label>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Your email" value="{{old('email',$user->email)}}">
                    </div>
                </div>
                <div class="input-box">
                    <label class="label-text">Phone</label>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Your Phone number" name="phone" value="{{old('phone',$user->phone)}}">
                    </div>
                </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{old('status',$user->status)== 1 ? 'selected' : ''}}>Show</option>
                            <option value="2" {{old('status',$user->status)== 2 ? 'selected' : ''}}>Hidden</option>
                        </select>
                    </div>
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6 responsive-column">
                <div class="input-box">
                    <label class="label-text">Your New Password</label>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Your Password" >
                    </div>
                </div>
                <div class="input-box">
                    <label class="label-text">Confirm Your New Password</label>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Your New Password">
                    </div>
                </div>
                @if (Auth::user()->level ==1 || Auth::user()->level ==3)
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" name="level">
                        <option value="1" {{old('level',$user->level)== 1 ? 'selected' : ''}}>Admin</option>
                        <option value="2" {{old('level',$user->level)== 2 ? 'selected' : ''}}>Owner</option>
                        <option value="3" {{old('level',$user->level)== 3 ? 'selected' : ''}}>Staff</option>
                        <option value="4" {{old('level',$user->level)== 4 ? 'selected' : ''}}>User</option>
                    </select>
                </div>
                @elseif(Auth::user()->level ==2 || Auth::user()->level ==4)
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" name="level" >
                        <option value="1" {{old('level',$user->level)== 1 ? 'selected' : ''}} disabled>Admin</option>
                        <option value="2" {{old('level',$user->level)== 2 ? 'selected' : ''}}>Owner</option>
                        <option value="3" {{old('level',$user->level)== 3 ? 'selected' : ''}} disabled>Staff</option>
                        <option value="4" {{old('level',$user->level)== 4 ? 'selected' : ''}}>User</option>
                    </select>
                </div>
                @endif
            </div><!-- end col-lg-6 -->
            <div class="form-box">
                <div class="form-title-wrap">
                    <h3 class="title"><i class="la la-photo mr-2 text-gray"></i>Choose a photo to represent this listing</h3>
                </div>
                <!-- form-title-wrap -->
                <div class="form-content1 contact-form-action">
                    <div class="col-lg-12">
                        <div class="file-upload-wrap">
                        <input type="file" name="image" class="multi file-upload-input with-preview" multiple maxlength="3" style="width: 850px">
                        <span class="file-upload-text"><i class="la la-upload mr-2"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="btn-box pt-3">
                    <button type="submit" class="theme-btn">Update Listing <i class="la la-arrow-right ml-1"></i></button>
                </div>
            </div><!-- end col-lg-6 -->
        </form>
    </div><!-- end form-content -->
</div><!-- end form-box -->


@endsection

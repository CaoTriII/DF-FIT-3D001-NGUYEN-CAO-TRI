@extends('admin.master')
@section('content')

<section class="listing-form section--padding">
   <div class="container">
   <div class="row">
      <div class="col-lg-9 mx-auto ">
         <div class="listing-header pb-4">
            <h3 class="title font-size-28 pb-2">Edit your Hotel here</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
         </div>
         <div class="form-box">
            <div class="col-lg-12">
                  <div class="form-title-wrap">
                     <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Editting information for your Hotel</h3>
                  </div>
                  <!-- form-title-wrap -->
            </div>
            <!-- end col-lg-12 -->
        <form action="{{route('admin.hotel.update',['id'=>$id])}}" method="POST" class="row" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <div class="form-content1 contact-form-action">
                        <div class="col-lg-12 responsive-column">
                            <label class="label-text">Hotel name</label>
                            <div class="form-group">
                                <span class="la la-briefcase form-icon"></span>
                                <input class="form-control" type="text" name="name" placeholder="Hotel name" value="{{old('name',$hotel->name)}}">
                            </div>
                        </div>
                        <div class="col-lg-12 responsive-column" style="margin-bottom: 20px">
                            <select class="form-control" name="star_number">
                                <option value="0">---Hotel rating---</option>
                                @foreach ($hotelrating as $item)
                                <option value="{{$item->id}}" {{ old('star_number',$hotel->star_number) == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- end col-lg-6 -->
                        <div class="col-lg-12 responsive-column">
                            <div class="form-group">
                                    <select class="form-control" name="district_id">
                                        <option value="0">---District---</option>
                                        @foreach ($district as $item)
                                        <option value="{{$item->id}}" {{ old('district_id',$hotel->district_id) == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-12 responsive-column">
                            <div class="form-group">
                                    <select class="form-control" name="status">
                                        <option value="0">---status---</option>
                                        <option value="1" {{ old('status',$hotel->status) == 1 ? 'selected' : ''}}>Show</option>
                                        <option value="2" {{ old('status',$hotel->status) == 2 ? 'selected' : ''}}>Hidden</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label class="label-text">Street address</label>
                            <div class="form-group">
                                <span class="la la-map-marker form-icon"></span>
                                <input class="form-control" type="text" name="address" placeholder="Building number and street name, example: 123 Main Street" value="{{old('address',$hotel->address)}}">
                            </div>
                            <label class="label-text"> Room Quantity</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="room_quantity" placeholder="your hotel room quantity" value="{{old('room_quantity',$hotel->room_quantity)}}">
                            </div>
                        <!-- end col-lg-8 -->
                </div>

                <div class="col-lg-12">
                        <label class="label-text mb-0 line-height-20">Description of your Hotel</label>
                        <p class="font-size-13 mb-3 line-height-20">400 character limit</p>
                        <div class="form-group">
                            <span class="la la-pencil form-icon"></span>
                            <input class="message-control form-control" name="description" value="{{old('description',$hotel->description)}}">
                        </div>
                        <label class="label-text mb-0 line-height-20">service of your Hotel</label>
                        <p class="font-size-13 mb-3 line-height-20">400 character limit</p>
                        <div class="form-group">
                            <span class="la la-pencil form-icon"></span>
                            <input class="message-control form-control" name="service" value="{{old('service')}}">
                        </div>
                    <div class="form-title-wrap">
                        <h3 class="title"><i class="la la-photo mr-2 text-gray"></i>Choose a photo to represent this listing</h3>
                     </div>
                     <!-- form-title-wrap -->
                     <div class="form-content1 contact-form-action">
                           <div class="col-lg-12" >
                            <label >Current image</label>
                            <img src="{{asset('uploads/'.$hotel->image) }}" alt="" width="100px">
                              <div class="file-upload-wrap">
                                 <input type="file" name="image" class="multi file-upload-input with-preview" multiple maxlength="3" >

                                 <span class="file-upload-text"><i class="la la-upload mr-2"></i></span>
                              </div>
                           </div>
                           <!-- end col-lg-12 -->
                     </div>
                </div>
                <div class="submit-box">
                    <div class="btn-box pt-3">
                       <button type="submit" class="theme-btn m-3">Update Listing <i class="la la-arrow-right ml-1"></i></button>
                    </div>
                 </div>
            </div>
        </form>
         </div>
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- end listing-form -->
@endsection

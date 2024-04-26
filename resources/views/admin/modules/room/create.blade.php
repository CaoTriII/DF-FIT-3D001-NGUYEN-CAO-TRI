@extends('admin.master')
@push('handlejs')
<script>
    $(document).ready(function () {
        var imageCount = 0;
        $("#add-image").click(function () {
            imageCount++;
            var newRow = `
            <div class="row d-flex align-items-center" style="padding: 5px">
                            <div class="col-md-2">
                                <img src="{{asset('administrator/4974686-200.png')}}" width="100px" id="image-${imageCount}">
                            </div>
                            <div class="col-md-8" >
                                <input type="file" name="images[]"  multiple maxlength="3" style="width: 850px" data-image="${imageCount}">
                            </div>
                            <div class="col-md-2" >
                                <button type="button" class="btn btn-danger delete-image"  style="width: 100%" data-image="${imageCount}">
                                    <i class="la la-minus ml-1"></i>
                                </button>
                            </div>
                        </div>`;
            $(".group-image-detail").append(newRow);
        });
        $(".group-image-detail").on('click','.delete-image',function(){
            var imageNumber = $(this).data("image")
            $("#image-" +imageNumber).closest(".row").remove();
        });
        $(".group-image-detail").on('change','input[name="images[]"]',function(){
            var imageNumber = $(this).data("image")
            var file = this.files[0];
            if (file){
                var reader = new FileReader();
                reader.onload = function(e) {
                $("#image-" + imageNumber).attr("src",e.target.result)
                }
                reader.readAsDataURL(file)
            }
        });
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
    });
</script>

@endpush
@section('content')
<section class="listing-form section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto ">
                <div class="listing-header pb-4">
                    <h3 class="title font-size-28 pb-2">List a Room here</h3>
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
                <form action="{{route('admin.room.store')}}" method="POST" enctype="multipart/form-data" class="row">
                    @csrf
                    <div class="form-box">
                        <div class="col-lg-12">
                            <div class="form-title-wrap">
                                <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Listing information for your Room</h3>
                            </div>
                            <!-- form-title-wrap -->
                        </div>
                        <!-- end col-lg-12 -->
                        <div class="col-lg-12">
                        <div class="form-content1 contact-form-action">
                            <div class="col-lg-12 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Room name</label>
                                    <div class="form-group">
                                        <span class="la la-briefcase form-icon"></span>
                                        <input class="form-control" type="text" name="name" placeholder="Room name" value="{{old('name')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Hotel </label>
                                    <div class="form-group">
                                        <select class="form-control" name="hotel_id">
                                            <option value="0">---Hotel Name---</option>
                                            @foreach ($hotel as $item)
                                                    <option value="{{$item->id}}" {{ old('hotel_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Room Quantity Status </label>
                                    <div class="form-group">
                                        <select class="form-control" name="room_quantity_status">
                                            <option value="0">---Room Quantity Status---</option>
                                                    <option value="1" {{ old('room_quantity_status') == 1 ? 'selected' : ''}}>Available</option>
                                                    <option value="2" {{ old('room_quantity_status') == 2 ? 'selected' : ''}}>Unavailable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Status </label>
                                    <div class="form-group">
                                        <select class="form-control" name="status">
                                            <option value="0">---status---</option>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : ''}}>Show</option>
                                            <option value="2" {{ old('status') == 2 ? 'selected' : ''}}>Hidden</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 responsive-column">
                                <div class="input-box">
                                    <label class="label-text">Featured</label>
                                    <div class="form-group">
                                        <select class="form-control" name="featured">
                                            <option value="0">---Featured---</option>
                                                    <option value="1" {{ old('featured') == 1 ? 'selected' : ''}}>1</option>
                                                    <option value="2" {{ old('featured') == 2 ? 'selected' : ''}}>2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-box">
                                <label class="label-text">Room quantity</label>
                                <div class="form-group d-flex align-items-center">
                                    <input class="form-control pl-3" type="text" name="room_quantity" placeholder="enter your room quantity" value="{{old('room_quantity')}}">
                                </div>
                            </div>
                            <div class="input-box">
                                <label class="label-text">Price</label>
                                <div class="form-group d-flex align-items-center">
                                    <input class="form-control pl-3" type="text" name="price" placeholder="enter your room price" value="{{old('price')}}">
                                </div>
                            </div>
                            <div class="input-box">
                                <label class="label-text mb-0 line-height-20">Description of your Room</label>
                                <p class="font-size-13 mb-3 line-height-20">400 character limit</p>
                                <div class="form-group">
                                    <span class="la la-pencil form-icon"></span>
                                    <input class="message-control form-control" name="description" id="description"  value="{{old('description')}}">
                                </div>
                            </div>
                            <div class="input-box">
                                <label class="label-text mb-0 line-height-20">Content of your Room</label>
                                <p class="font-size-13 mb-3 line-height-20">400 character limit</p>
                                <div class="form-group">
                                    <span class="la la-pencil form-icon"></span>
                                    <input class="message-control form-control" name="content" id="content" value="{{old('content')}}">
                                </div>
                            </div>
                        </div>
                        </div><!-- end col-lg-12 -->
                        <!-- end form-box -->
                        <div class="form-box">
                        <div class="form-title-wrap">
                            <h3 class="title"><i class="la la-photo mr-2 text-gray"></i>Choose a photo to represent this listing</h3>
                        </div>
                        <!-- form-title-wrap -->
                        <div class="form-content1 contact-form-action">
                            <div class="col-lg-12">
                                <div class="file-upload-wrap">
                                    <input type="file" name="image"  multiple maxlength="3" style="width: 850px">
                                    <span class="file-upload-text"></span>
                                </div>
                            </div>
                        </div>
                        <div class="submit-box group-image-detail">
                            <div class="btn-box pt-3" style="padding: 5px">
                                <button type="button" class="theme-btn " id="add-image" style="width: 100%"> Add image detail<i class="la la-plus ml-1"></i></button>
                            </div>
                        </div>
                        <div class="submit-box">
                            <div class="btn-box pt-3">
                                <button type="submit" class="theme-btn m-3">Submit Listing <i class="la la-arrow-right ml-1"></i></button>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
</section>
@endsection

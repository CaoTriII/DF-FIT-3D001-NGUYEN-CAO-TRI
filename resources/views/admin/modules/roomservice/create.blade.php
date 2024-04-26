@extends('admin.master')
@section('content')
<!-- Default box -->

<!-- end breadcrumb-area -->
<section class="listing-form section--padding">
   <div class="container">
   <div class="row">
      <div class="col-lg-9 mx-auto ">
         <div class="listing-header pb-4">
            <h3 class="title font-size-28 pb-2">List a Room here</h3>
            <p class="font-size-14">If you are listing a vacation rental, please <a href="#" class="text-color">click here.</a></p>
            <p class="font-size-14"><a href="#" class="text-color">Read the complete Trizen policy for Room.</a></p>
         </div>
         <div class="form-box">
            <div class="form-title-wrap">
                <h3 class="title"><i class="la la-gear mr-2 text-gray"></i>Amenities</h3>
            </div><!-- form-title-wrap -->
            <div class="form-content1 contact-form-action">
                <form method="post" class="row">
                    <div class="col-lg-6">
                        <div class="custom-checkbox">
                            <input type="checkbox" id="AirportTransportation">
                            <label for="AirportTransportation">Airport Transportation</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="BarLounge">
                            <label for="BarLounge">Bar / Lounge</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="Beach">
                            <label for="Beach">Beach</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="BeverageSelection">
                            <label for="BeverageSelection">Beverage Selection</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="SwimmingPool">
                            <label for="SwimmingPool">Swimming Pool</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="WIFI">
                            <label for="WIFI">WI-FI</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="Coffee">
                            <label for="Coffee">Coffee</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="AirConditioning">
                            <label for="AirConditioning">Air Conditioning</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="Entertainment">
                            <label for="Entertainment">Entertainment</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="ElevatorInBuilding">
                            <label for="ElevatorInBuilding">Elevator In Building</label>
                        </div>
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="custom-checkbox">
                            <input type="checkbox" id="WheelchairAccess">
                            <label for="WheelchairAccess">Wheelchair access</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="FitnessFacility">
                            <label for="FitnessFacility">Fitness Facility</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="Breakfast">
                            <label for="Breakfast">Breakfast</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="HandicapAccessible">
                            <label for="HandicapAccessible">Handicap Accessible</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="PetsAllowed">
                            <label for="PetsAllowed">Pets Allowed</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="SuitableForEvents">
                            <label for="SuitableForEvents">Suitable For Events</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="Restaurant">
                            <label for="Restaurant">Restaurant</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="Doorman">
                            <label for="Doorman">Doorman</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="FreeParking">
                            <label for="FreeParking">Free Parking</label>
                        </div>
                        <div class="custom-checkbox">
                            <input type="checkbox" id="WineBar">
                            <label for="WineBar">Wine Bar</label>
                        </div>
                    </div><!-- end col-lg-6 -->
                </form>
            </div><!-- end form-content -->
        </div><!-- end form-box -->
        <div class="col-lg-6">
            <div class="input-box">
                <label class="label-text text-color-6">Minimum stay* (not including holidays)</label>
                <div class="form-group d-flex align-items-center">
                    <label for="radio-1" class="radio-trigger mb-0 font-size-14 mr-3">
                        <input type="radio" id="radio-1" name="radio">
                        <span class="checkmark"></span>
                        <span>3 nights or less</span>
                    </label>
                    <label for="radio-2" class="radio-trigger mb-0 font-size-14">
                        <input type="radio" id="radio-2" name="radio">
                        <span class="checkmark"></span>
                        <span>More than 3 nights</span>
                    </label>
                </div>
            </div>
        </div><!-- end col-lg-6 -->
        <div class="col-lg-6">
            <div class="input-box">
                <label class="label-text text-color-6">Security *</label>
                <div class="form-group d-flex align-items-center">
                    <label for="radio-3" class="radio-trigger mb-0 font-size-14 mr-3">
                        <input type="radio" id="radio-3" name="radio">
                        <span class="checkmark"></span>
                        <span>On site</span>
                    </label>
                    <label for="radio-4" class="radio-trigger mb-0 font-size-14">
                        <input type="radio" id="radio-4" name="radio">
                        <span class="checkmark"></span>
                        <span>None</span>
                    </label>
                </div>
            </div>
        </div><!-- end col-lg-6 -->
        <div class="col-lg-6">
            <div class="input-box">
                <label class="label-text text-color-6">On site staff *</label>
                <div class="form-group d-flex align-items-center">
                    <label for="radio-5" class="radio-trigger mb-0 font-size-14 mr-3">
                        <input type="radio" id="radio-5" name="radio">
                        <span class="checkmark"></span>
                        <span>Yes</span>
                    </label>
                    <label for="radio-6" class="radio-trigger mb-0 font-size-14">
                        <input type="radio" id="radio-6" name="radio">
                        <span class="checkmark"></span>
                        <span>No</span>
                    </label>
                </div>
            </div>
        </div><!-- end col-lg-6 -->
        <div class="col-lg-6">
            <div class="input-box">
                <label class="label-text text-color-6">Housekeeping *</label>
                <div class="form-group d-flex align-items-center">
                    <label for="radio-7" class="radio-trigger mb-0 font-size-14 mr-3">
                        <input type="radio" id="radio-7" name="radio">
                        <span class="checkmark"></span>
                        <span>Included in room rate</span>
                    </label>
                    <label for="radio-8" class="radio-trigger mb-0 font-size-14">
                        <input type="radio" id="radio-8" name="radio">
                        <span class="checkmark"></span>
                        <span>Additional Fee</span>
                    </label>
                </div>
            </div>
        </div><!-- end col-lg-6 -->
        <div class="col-lg-6">
            <div class="input-box">
                <label class="label-text text-color-6">Housekeeping frequency *</label>
                <div class="form-group d-flex align-items-center">
                    <label for="radio-9" class="radio-trigger mb-0 font-size-14 mr-3">
                        <input type="radio" id="radio-9" name="radio">
                        <span class="checkmark"></span>
                        <span>Daily</span>
                    </label>
                    <label for="radio-10" class="radio-trigger mb-0 font-size-14 mr-3">
                        <input type="radio" id="radio-10" name="radio">
                        <span class="checkmark"></span>
                        <span>Weekly</span>
                    </label>
                    <label for="radio-11" class="radio-trigger mb-0 font-size-14 mr-3">
                        <input type="radio" id="radio-11" name="radio">
                        <span class="checkmark"></span>
                        <span>Bi-weekly</span>
                    </label>
                    <label for="radio-12" class="radio-trigger mb-0 font-size-14">
                        <input type="radio" id="radio-12" name="radio">
                        <span class="checkmark"></span>
                        <span>None</span>
                    </label>
                </div>
            </div>
        </div><!-- end col-lg-6 -->
        <div class="col-lg-6">
            <div class="input-box">
                <label class="label-text text-color-6">Front desk *</label>
                <div class="form-group d-flex align-items-center">
                    <label for="radio-13" class="radio-trigger mb-0 font-size-14 mr-3">
                        <input type="radio" id="radio-13" name="radio">
                        <span class="checkmark"></span>
                        <span>24-hour staffing</span>
                    </label>
                    <label for="radio-14" class="radio-trigger mb-0 font-size-14 mr-3">
                        <input type="radio" id="radio-14" name="radio">
                        <span class="checkmark"></span>
                        <span>Limited hours staffing</span>
                    </label>
                    <label for="radio-15" class="radio-trigger mb-0 font-size-14">
                        <input type="radio" id="radio-15" name="radio">
                        <span class="checkmark"></span>
                        <span>None</span>
                    </label>
                </div>
            </div>
        </div><!-- end col-lg-6 -->
        <div class="col-lg-6">
            <div class="input-box">
                <label class="label-text text-color-6">Bathroom *</label>
                <div class="form-group d-flex align-items-center">
                    <label for="radio-16" class="radio-trigger mb-0 font-size-14 mr-3">
                        <input type="radio" id="radio-16" name="radio">
                        <span class="checkmark"></span>
                        <span>All en suite</span>
                    </label>
                    <label for="radio-17" class="radio-trigger mb-0 font-size-14 mr-3">
                        <input type="radio" id="radio-17" name="radio">
                        <span class="checkmark"></span>
                        <span>Some en suite</span>
                    </label>
                    <label for="radio-18" class="radio-trigger mb-0 font-size-14">
                        <input type="radio" id="radio-18" name="radio">
                        <span class="checkmark"></span>
                        <span>Shared</span>
                    </label>
                </div>
            </div>
        </div><!-- end col-lg-6 -->
        <div class="form-box">
            <div class="form-title-wrap">
                <h3 class="title"><i class="la la-photo mr-2 text-gray"></i>Choose a photo to represent this listing</h3>
            </div><!-- form-title-wrap -->
            <div class="form-content1 contact-form-action">
                <form method="post" class="row">
                    <div class="col-lg-12">
                        <div class="file-upload-wrap">
                            <input type="file" name="files[]" class="multi file-upload-input with-preview" multiple maxlength="3">
                            <span class="file-upload-text"><i class="la la-upload mr-2"></i>Click or drag images here to upload</span>
                        </div>
                    </div><!-- end col-lg-12 -->
                </form>
            </div><!-- end form-content -->
        </div><!-- end form-box -->
        <div class="submit-box">
            <h3 class="title pb-3">Submit this listing</h3>
            <div class="custom-checkbox">
                <input type="checkbox" id="agreeChb">
                <label for="agreeChb">Check this box to certify that you are an official representative of the property for which you are submitting this listing and that the information you have submitted is correct. In submitting a photo, you also certify that you have the right to use the photo on the web and agree to hold Trizen harmless for any and all copyright issues arising from your use of the image.</label>
            </div>
            <div class="btn-box pt-3">
                <button type="submit" class="theme-btn">Submit Listing <i class="la la-arrow-right ml-1"></i></button>
            </div>
        </div><!-- end submit-box -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- end listing-form -->
@endsection

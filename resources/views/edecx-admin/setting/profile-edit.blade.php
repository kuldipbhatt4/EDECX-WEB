@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        @include('edecx-admin.flash-message')
       <div class="row">
          <div class="col-lg-12">
             <div class="iq-edit-list-data">
                <div class="tab-content">
                   <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                       <div class="iq-card">
                         <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                               <h4 class="card-title">Personal Information</h4>
                            </div>
                         </div>
                         <div class="iq-card-body">
                               <form action="{{ action('Admin\Auth\ProfileController@updateprofile') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row align-items-center">
                                     <?php
                                     $profile_image = Auth::guard('admins')->user()->profile_image;
                                     if ($profile_image == '' || $profile_image == NULL) { ?>
                                            <div class="form-group row align-items-center">
                                                <div class="change-avatar">
                                                    <div class="profile-img">
                                                        <img class="profile-pic" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                                                        <div class="">
                                                        <i class="ri-pencil-line upload-button"></i>
                                                        <input class="file-upload" type="file" accept="image/*" name="profile_image"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php  } else { ?>
                                           <div class="form-group row align-items-center">
                                             <div class="change-avatar">
                                                <div class="profile-img">
                                                    @if(file_exists(public_path('edecx/admin/admin-profile/'.$profile_image)))
                                                        <img  class="profile-pic" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/admin-profile/'.$profile_image)))) }}" height="50" width="50">
                                                    @else
                                                        <img class="profile-pic" src="data:image;base64,{{ (base64_encode(file_get_contents(public_path('edecx/admin/default/default.jpg')))) }}" alt="profile-pic">
                                                    @endif
                                                   <div class="">
                                                     <i class="ri-pencil-line upload-button"></i>
                                                      <input type="file" class="file-upload" name="profile_image"
                                                          aria-describedby="profile_image" value="{{ $profile_image }}">
                                                     </div>
                                                </div>
                                             </div>
                                          </div>
                                          <?php } ?>
                                </div>
                               <div class=" row align-items-center">
                                  <div class="form-group col-sm-6">
                                     <label for="fname">First Name:</label>
                                     <input type="text" class="form-control" name="fname" id="fname" value="{{ Auth::guard('admins')->user()->fname }}">
                                  </div>
                                  <div class="form-group col-sm-6">
                                     <label for="lname">Last Name:</label>
                                     <input type="text" class="form-control" name="lname" id="lname" value="{{ Auth::guard('admins')->user()->lname }}">
                                  </div>
                                  <div class="form-group col-sm-6">
                                     <label for="uname">User Name:</label>
                                     <input type="email" class="form-control" name="email" id="uname" value="{{ Auth::guard('admins')->user()->email }}" disabled>
                                  </div>
                                    <div class="form-group col-sm-6">
                                        <div class="form-group">
                                        <label for="dob">Date Of Birth</label>
                                        <input type="text" class="form-control datetimepicker" id="admin_dob" name="admin_dob" value="{{ Carbon\Carbon::parse(Auth::guard('admins')->user()->admin_dob)->format('d-m-Y') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label for="login_logo">Choose Logo for Login Screen</label>
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="login_logo" name="login_logo" aria-describedby="login_logo">
                                        <label class="custom-file-label" for="login_logo"></label>
                                        </div>
                                    </div>
                                        {{--  @if($errors->has('login_logo'))
                                             <span class="error">{{ $errors->first('login_logo') }}</span>
                                         @endif  --}}
                                        <div class="form-group col-sm-6">
                                            <label for="login_sideimage">Choose Image for Login Screen</label>
                                            <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="login_sideimage" name="login_sideimage" aria-describedby="login_sideimage">
                                            <label class="custom-file-label" for="login_sideimage"></label>
                                            </div>
                                        </div>
                                        {{--  @if($errors->has('login_sideimage'))
                                             <span class="error">{{ $errors->first('login_sideimage') }}</span>
                                         @endif  --}}
                                    </div>

                               <button type="submit" class="btn btn-primary mr-2">Submit</button>
                               <button type="button" class="btn iq-bg-danger" onclick="window.location='{{ url('edecx-admin/dashboard') }}'">Cancel</button>
                            </form>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection



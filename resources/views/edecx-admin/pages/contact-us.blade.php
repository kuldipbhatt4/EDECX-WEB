@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        @include('edecx-admin.flash-message')
       <div class="row">
          <div class="col-sm-12 col-lg-12">
             <div class="iq-card">
                <div class="iq-card-body">
                    <?php $id = 1; ?>
                   <form method="POST" action="{{ action('Admin\Auth\StaticpagesController@contactstore',$id ) }}">
                    {{ csrf_field() }}
                      <div class="row">
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                               <label for="exampleInputText1">Enter Contact No </label>
                               <input type="number" class="form-control" id="exampleInputText1" name="contactno" value="{{ $contactus->contactno }}" placeholder="Enter Phone Number">
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                               <label for="exampleInputText1">Enter Email ID</label>
                               <input type="Email" class="form-control" id="exampleInputText1" name="emailid" value="{{ $contactus->emailid }}" placeholder="Enter Email">
                            </div>
                         </div>
                         <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                               <label for="exampleInputText1">Enter Address </label>
                               <input type="text" class="form-control" id="exampleInputText1" name="address" value="{{ $contactus->address }}" placeholder="address">
                            </div>
                         </div>
                         <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                               <label for="exampleInputText1">Enter Location(Link) </label>
                               <input type="text" class="form-control" id="exampleInputText1" name="maplink" value="{{ $contactus->maplink }}" placeholder="Location">
                            </div>
                         </div>
                         <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                               <label for="exampleInputText1">Enter About Us Footer</label>
                               <input type="text" class="form-control" id="exampleInputText1" name="fabout" value="{{ $contactus->fabout }}" placeholder="About Us Footer">
                            </div>
                         </div>
                         <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary" >Submit</button>
                            <button type="button" class="btn iq-bg-danger" onclick="window.location='{{ url('edecx-admin/dashboard') }}'">Cancel</button>
                         </div>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection

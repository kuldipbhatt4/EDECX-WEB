@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-12">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Edit Location</h4>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-body">
                   <form method="post" action="{{ action('Admin\Auth\LocationController@update', $id)}}">
                    {{ csrf_field() }}
                      <div class="row">
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                               <label for="exampleInputText1">Area Name </label>
                               <input type="text" class="form-control" value="{{$location->location}}" name="location" >
                                  @if($errors->has('location'))
                                        <span class="error">{{ $errors->first('location') }}</span>
                                    @endif
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                               <label for="exampleInputText1">Area Code</label>
                               <input type="text" class="form-control" value="{{$location->area_code}}" name="area_code">
                                   @if($errors->has('area_code'))
                                        <span class="error">{{ $errors->first('area_code') }}</span>
                                    @endif
                            </div>
                         </div>
                         <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn iq-bg-danger" onclick="window.location='{{ url('edecx-admin/location/index') }}'">Cancel</button>
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

@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-12">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Add Level</h4>
                </div>
             </div>

             <div class="iq-card">
                <div class="iq-card-body">
                   <form method="POST" action="{{ action('Admin\Auth\LevelController@store') }}" name="create-list">
                     {{ csrf_field() }}
                      <div class="row">
                         <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                               <label for="exampleInputText1">Level Name </label>
                               <input type="text" class="form-control" id="exampleInputText1" name="level" placeholder="Enter level">
                                   @if($errors->has('level'))
                                        <span class="error">{{ $errors->first('level') }}</span>
                                    @endif
                            </div>
                         </div>
                         <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn iq-bg-danger" onclick="window.location='{{ url('edecx-admin/level/index') }}'">Cancel</button>
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

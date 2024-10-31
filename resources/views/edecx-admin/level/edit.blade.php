@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                    <h4 class="card-title">Edit Level</h4>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-body">
                    <form method="post" action="{{action('Admin\Auth\LevelController@update', $id)}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="level">Student Level:</label>
                                <input type="text" class="form-control" name="level" value="{{$level->level}}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn iq-bg-danger" onclick="window.location='{{ url('edecx-admin/level/index') }}'">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>
@endsection

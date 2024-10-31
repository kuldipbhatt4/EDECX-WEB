@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-12">

            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Add Subject</h4>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-body">
                   <form method="post" action="{{ action('Admin\Auth\SubjectController@store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="row">
                         <div class="col-lg12 col-md-12">
                            <div class="form-group">
                               <label for="exampleInputText1">Subject Name </label>
                               <input type="text" class="form-control" id="exampleInputText1" name="subject_name" placeholder="Enter Subject Name">
                               @if($errors->has('subject_name'))
                                        <span class="error">{{ $errors->first('subject_name') }}</span>
                               @endif
                            </div>
                         </div>
                         <div class="col-lg-6 col-md-6">

                               <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="subject_app_icon" name="subject_app_icon"
                                  aria-describedby="subject_app_icon">
                                 <label class="custom-file-label" for="subject_app_icon">Choose icon for Mobile APP</label>
                               </div>

                                   @if($errors->has('subject_app_icon'))
                                        <span class="error">{{ $errors->first('subject_app_icon') }}</span>
                                    @endif
                         </div>
                         <div class="col-lg-6 col-md-6">

                               <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="subject_web_icon" name="subject_web_icon"
                                  aria-describedby="subject_web_icon">
                                 <label class="custom-file-label" for="subject_web_icon">Choose icon for Website</label>
                               </div>
                            </div>
                                   @if($errors->has('subject_web_icon'))
                                        <span class="error">{{ $errors->first('subject_web_icon') }}</span>
                                    @endif
                         </div>
                      <div class="col-lg-12 col-md-12">
                           <div class="input-group">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="button" class="btn iq-bg-danger" onclick="window.location='{{ url('edecx-admin/subject/index') }}'">Cancel</button>
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

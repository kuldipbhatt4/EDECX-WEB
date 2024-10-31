@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-12">
             <div class="iq-card">
                <div class="iq-card-body">
                   <form method="post" action="{{ action('Admin\Auth\TermsConditionController@store')}}">
                      {{ csrf_field() }}
                    <div class="row">
                         <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                               <label for="version">Create version</label>
                               <input type="text" class="form-control" id="version" name="version" placeholder="Enter Version">
                               @if($errors->has('version'))
                                <span class="error">{{ $errors->first('version') }}</span>
                               @endif
                            </div>
                         </div>
                         <div class="col-lg-12 col-md-12">
                            <label for="condition">Terms And Conditions</label>
                            <textarea id="default" name="condition" placeholder="Enter Content"></textarea>
                            @if($errors->has('condition'))
                               <span class="error">{{ $errors->first('condition') }}</span>
                               @endif
                        </div>
                         <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn iq-bg-danger" onclick="window.location='{{ url('edecx-admin/pages/term/term-index') }}'">Cancel</button>
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
@section('page-js-script')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
  selector: 'textarea#default'
});
</script>
@endsection






@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-12">
             <div class="iq-card">
                <div class="iq-card-body">
                   <form method="POST" action="{{ action('Admin\Auth\FaqController@store')}}">
                      {{ csrf_field() }}
                    <div class="row">
                         <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                               <label for="version">Select FAQ Type</label>
                               <select name="student_tutor" name="select[]">
                                    <option value="" disabled>---Selection---</option>
                                    <option value="0">Student</option>
                                    <option value="1">Tutor</option>
                               </select>
                            </div>
                         </div>
                         <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                               <label for="faq_question">FAQ Question</label>
                               <input type="text" class="form-control" id="faq_question" name="faq_question" placeholder="FAQ Question">
                               @if($errors->has('faq_question'))
                                <span class="error">{{ $errors->first('faq_question') }}</span>
                               @endif
                            </div>
                         </div>
                         <div class="col-lg-12 col-md-12">
                            <label for="faq_answer">FAQ Answer</label>
                            <textarea id="default" name="faq_answer" placeholder="Enter Answer"></textarea>
                            @if($errors->has('faq_answer'))
                               <span class="error">{{ $errors->first('faq_answer') }}</span>
                               @endif
                        </div>
                         <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn iq-bg-danger" onclick="window.location='{{ url('edecx-admin/pages/faq/faq-index') }}'">Cancel</button>
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








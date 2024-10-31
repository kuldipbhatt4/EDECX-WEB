@extends('edecx-admin.layouts.app')
@section('edecx')
<div id="content-page" class="content-page">
    <div class="container-fluid">
        @include('edecx-admin.flash-message')
       <div class="row">
          <div class="col-lg-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex flex-row">
                   <div class="iq-header-title">
                    <h4 class="card-title">Social Media</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                    <form action="{{ action('Admin\Auth\SettingController@adminsetting') }}" method="post">
                        {{ csrf_field() }}
                    <div class="acc-edit">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Admin commission (%):</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{ Auth::guard('admins')->user()->price }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Minimum student amount deposit ({{env('CURRENCY_SIGN')}}):</label>
                                    <input type="text" class="form-control" id="minimum_wallet_amount_deposit" name="minimum_wallet_amount_deposit" value="{{ Auth::guard('admins')->user()->minimum_wallet_amount_deposit }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook:</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ Auth::guard('admins')->user()->facebook }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter">Twitter:</label>
                                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ Auth::guard('admins')->user()->twitter }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram">Instagram:</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ Auth::guard('admins')->user()->instagram }}">
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="youtube">You Tube:</label>
                                    <input type="text" class="form-control" id="youtube" name="youtube" value="{{ Auth::guard('admins')->user()->youtube }}">
                                 </div>
                            </div>
                        </div>
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
@endsection

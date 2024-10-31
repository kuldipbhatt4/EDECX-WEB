@extends('tutor.layouts.app')
@section('edecx')
    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
        <!-- Sidebar -->
           <div class="profile-sidebar">
               @include('tutor.partials.sidebar')
           </div>
        <!-- /Sidebar -->
    <!-- /Sidebar -->
    </div>
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-10 text-center m-auto">
                <h4 class="mb-4">My Wallet</h4>
                @include('flash-message')              
                <div class="wallet-box">
                    <img src="{{asset('edecx/website/assets/img/w-1.png')}}" alt="wallet" class="image-wallet">
                    <div class="wallet-box-text">
                        <h4>Available Fund</h4>
                        <h2>{{env('CURRENCY_SIGN')}}{{$wallet_amount}}</h2>

                        <h4>Hold Fund</h4>
                        <h2>{{env('CURRENCY_SIGN')}}{{$wallet_hold_amount}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js-script')
<script>
    $(document).ready(function(){
        $(document).on('click','.nav-link',function(){
            let id = $(this).attr('data-id');
            $('#id').val(id);
        });         
    }); 
</script>
@endsection
</body>
</html>

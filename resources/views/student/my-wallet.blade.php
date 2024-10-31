@extends('student.layouts.app')
@section('edecx')
    <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
        <!-- Sidebar -->
           <div class="profile-sidebar">
               @include('student.partials.sidebar')
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
                <form method="POST" action="{{url('/student/my-wallet/add-money')}}" enctype="multipart/form-data" name="frm_add_money" id="frm_add_money"> 
                    {{ csrf_field() }} 
                    <input type="text" name="txt_amount" id="txt_amount" placeholder="Add fund" />
                    <div class="fund">
                        <input type="submit" id="submit_frm_add_money" name="submit_frm_add_money" class="btn add-fund ">
                    </div>
                </form>
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

    $('#frm_add_money').validate({ 
        rules: {
            txt_amount: {required: true,min:1}
        },
        messages:{
            txt_amount: {required: "Please enter amount.",min:"Please enter valid amount"}
        }
    });    

    $("#submit_frm_add_money").click(function(event){        
        if($("#frm_add_money").valid()){
            $("#frm_add_money").submit();
        }
        else{
            return false;
        }
    });
  
</script>
@endsection
</body>
</html>

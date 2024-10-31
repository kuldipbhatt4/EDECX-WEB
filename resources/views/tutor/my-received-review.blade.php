@extends('tutor.layouts.app')
@section('edecx')
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
       <div class="profile-sidebar">
           @include('tutor.partials.sidebar')
       </div>
</div>
<div class="col-md-7 col-lg-8 col-xl-9">
    <h3 class="pb-3">My Received review</h3>
    @include('flash-message')
    <!-- Mentee List Tab -->
    <div class="tab-pane show active" id="mentee-list">
        <div class="card card-table">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Student Name</th>                                
                                <th class="text-center">GIVE RATINGS</th>                                                                
                                <th class="text-center">description</th>                                                                                                
                            </tr>
                        </thead>
                        <tbody class="show_listings">
                            <tr>
                                <td>Please wait....Your page content load here</td>
                            </tr>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
        <div class="load-more text-center show_load_more">
            <a class="btn btn-primary btn-sm"  href="javascript:void(0);" id="clk_load_more"  onclick="loadMore()" data-page="1">Load More</a>
        </div>
    </div>
</div> 

@endsection
<link href="{{asset('edecx/website/assets/plugins/ratings/rateit.css')}}" rel="stylesheet" type="text/css">
@section('page-js-script')
<script src="{{asset('edecx/website/assets/plugins/ratings/jquery.rateit.js')}}"></script>
<script>
    $(document).ready(function(){
        $(document).on('click','.nav-link',function(){
                let id = $(this).attr('data-id');
                $('#id').val(id);
        });          
        loadMore();
    });
    function loadMore(){
        var pageNumber=parseInt($("#clk_load_more").attr('data-page'));
        pageNumber = pageNumber > 0 ? pageNumber : 1;
        $.ajax({
            type : 'GET',
            url: "{{url('/tutor/my-recevied-review-page')}}"+'?page='+pageNumber,
            dataType:'json',                
            success : function(data){
                if(pageNumber == 1){
                    $('.show_listings').html(data.html);   
                }
                else{
                    $('.show_listings').append(data.html);   
                }
                $("#clk_load_more").attr('data-page',parseInt(pageNumber+1));                                                                                            
                
                if(data.nextPage == false){
                    $("#clk_load_more").hide();
                }
                else{
                    $("#clk_load_more").show();
                }
                $('div.rateit, div.click_give_ratting').rateit();
            },error: function(data){
                alert("Sorry! Something went Wrong, Please try after some time.");
            },
        });
    }
 </script>
@endsection
</body>
</html>

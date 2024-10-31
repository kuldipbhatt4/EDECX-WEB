@extends('student.layouts.app')
@section('edecx')
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
       <div class="profile-sidebar">
           @include('student.partials.sidebar')
       </div>
</div>
<div class="col-md-7 col-lg-8 col-xl-9">
    <h3 class="pb-3">Order History Summary</h3>
    @include('flash-message')
    <!-- Mentee List Tab -->
    <div class="tab-pane show active" id="mentee-list">
        <div class="card card-table">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Tutor Name</th>
                                <th>Order DATE</th>
                                <th>Order TIME</th>       
                                <th class="text-center">GIVE RATINGS</th>                                                                
                                <th class="text-center">STATUS</th>                                                                
                                <th class="text-center">ACTION</th>
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

<!-- Order Detail Modal -->
<div class="modal fade" id="view_order_details" tabindex="-1" role="dialog" aria-labelledby="view_order_details" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="view_order_details">View order details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="detail_content_html"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
        </div>
        </div>
    </div>
</div>


<!-- give Review popup -->
<div class="modal fade" id="give_review_popup" tabindex="-1" role="dialog" aria-labelledby="give_review_popup" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="give_review_popup">Give Review to tutor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="{{url('/student/order-history-submit-review')}}" enctype="multipart/form-data" name="frm_give_review" id="frm_give_review"> 
             {{ csrf_field() }} 
            <div class="modal-body">
                <div class="col-md-6">
                    <div class="rateit rating" id="click_give_ratting"  data-rateit-value="1" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5" data-rateit-resetable="false" data-rateit-readonly="false"></div>        
                </div>
                <div class="col-md-12">
                    <textarea rows="6" cols="20" name="txt_review_desc" id="txt_review_desc" placeholder="Please enter description"></textarea>
                </div>
                <input type="hidden" name="h_b_id" id="h_b_id" class="hide" value="0"/>     
                <input type="hidden" name="h_given_ratings" id="h_given_ratings" class="hide" value="1"/>    
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-ftutor" value="Submit" id="submit_frm_give_review">           
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
            </div>
        </form>
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
            url: "{{url('/student/order-history-page')}}"+'?page='+pageNumber,
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

    function viewDetails(id){
        if(!id){
            var id = 0;
        }
        $.ajax({
            type : 'GET',
            url: "{{url('/student/order-history-details')}}"+'?id='+id,
            dataType:'json',                
            success : function(data){                
                $('.detail_content_html').html(data.html);   
                $("#view_order_details").modal('show');
            },error: function(data){
                alert("Sorry! Something went Wrong, Please try after some time.");
            },
        });
    }
    function clickReschedule(getlink){
        if(!getlink){
            var getlink = '';
        }
        if(getlink != ''){
            if(confirm("If you reschedule this booking then existing booking will be canceled. Are you sure to continue?")){
                window.location.href=getlink;
            }
        }
        else{
            alert("Sorry! Something went wrong, Please reload the page.")
        }
    }
    function giveReview(getBookingId){
        if(!getBookingId){
            var getBookingId = 0;
        }
        if(getBookingId > 0){
            $("#h_b_id").val(getBookingId);
            $("#give_review_popup").modal('show')
        }
        else{
            alert("Sorry! Invalid booking details.");
        }
    }
    $("#click_give_ratting").bind('rated', function (event, value) {                    
        $("#h_given_ratings").val(value);        
    });

    $('#frm_give_review').validate({ 
        rules: {
            txt_review_desc: {required: true}
        },
        messages:{
            txt_review_desc: {required: "Please enter description."}
        }
    });    

    $("#submit_frm_give_review").click(function(event){        
        if($("#frm_give_review").valid()){
            $("#frm_give_review").submit();
        }
        else{
            return false;
        }
    });
 </script>
@endsection
</body>
</html>

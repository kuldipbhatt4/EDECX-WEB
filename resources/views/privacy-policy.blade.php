@extends('website.layouts.app')
@section('edecx')
<section class="t-c">
    <div class="container">
        <h3>Privacy Policy</h3>
            @foreach($pc as $policy)
                {!! $policy->policy !!}
            @endforeach
    </div>
</section>
@endsection

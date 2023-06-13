@extends('layouts.admin-master')

@section('title')
Testing Blogs
@endsection

@section('content')
<section class="section">
    
  <div class="section-body">
    <div class="card-body">
        @foreach ($bills as $key => $bill)
                        <div class="row">
                        <div class="col-12 col-lg-8">
                            <h3>{{ $bill->bill_name }}</h3>
                        </div>
                        </div>

                        @if (($key + 1) % 5 == 0 && isset($photos[$key/5]))
                        <!-- Display the advertisement content -->
                        <h3> {{ $photos[$key/5]->photo_title }}</h3>
                    @endif
        @endforeach
    </div>
  </div>
</section>
@endsection

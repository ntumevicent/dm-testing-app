@extends('layouts.admin-master')

@section('title')
PayBills
@endsection

@section('content')
<section class="section">
    <h1>{{ $pageTitle }}</h1>
    
  <div class="section-body">
  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-lg-8">
                        <div class="wizard-steps">
                        @foreach($bill_categories as $categories)
                        <a href="{{ route('bill_category.detail', $categories->id) }}">
                            <div class="wizard-step">
                              <div class="wizard-step-icon">
                                <i class="fas {{ $categories->bill_category_icon }} text-warning"></i>
                              </div>
                              <div class="wizard-step-label"> {{ $categories->bill_category_name }}</div>
                            </div>
                          </a>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
  </div>
</section>
@endsection

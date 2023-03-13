@extends('layouts.admin-master')

@section('title')
{{ $pageTitle }}
@endsection

@section('content')
<section class="section">
    <h2>{{ $pageTitle }}</h2>


  <div class="section-body">
  <div class="row mt-4">
              <div class="col-12 col-md-6 col-lg-6">
                
                <div class="card">
                    <div class="tab-container">
                        <div class="tabs">
                          <div class="tab active">Tab 1</div>
                          <div class="tab">Tab 2</div>
                          <div class="tab">Tab 3</div>
                          <div class="tab">Tab 4</div>
                          <div class="tab">Tab 5</div>
                          <div class="tab">Tab 6</div>
                          <div class="tab">Tab 7</div>
                        </div>
                        <div class="tab-content-container">
                          <div class="tab-content active">Content for Tab 1</div>
                          <div class="tab-content">Content for Tab 2</div>
                          <div class="tab-content">Content for Tab 3</div>
                          <div class="tab-content">Content for Tab 4</div>
                          <div class="tab-content">Content for Tab 5</div>
                          <div class="tab-content">Content for Tab 6</div>
                          <div class="tab-content">Content for Tab 7</div>
                        </div>
                      </div>
                      
                </div>
              </div>
            </div>      
</div>

  </div>
</section>
@endsection

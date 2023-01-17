@extends('layouts.admin-master')

@section('title')
Simplex Payments
@endsection

@section('content')
<section class="section">
    <h1>{{ $pageTitle }}</h1>


  <div class="section-body">
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
              <form id="simplex-form">
                <div id="checkout-element">
                </div>
            </form>
            <script src='https://iframe.sandbox.test-simplexcc.com/form-sdk.js' type="text/javascript"></script>
            <script>
                window.simplex.createForm();
            </script>









                </div>
              </div>
        </div>
    </div>
  </div>
</section>
@endsection

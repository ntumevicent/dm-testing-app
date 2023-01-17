@extends('layouts.admin-master')

@section('title')
View Bill Category
@endsection

@section('content')
<section class="section">
    <h1>{{ $pageTitle }}</h1>


  <div class="section-body">
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                  <div class="alert alert-success alert-block" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong class="success-msg"></strong>
                </div>
                  <form  action="{{ route('ajax.request.store') }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        <span class="text-danger error-text email_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        <span class="text-danger error-text password_err"></span>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Address"></textarea>
                        <span class="text-danger error-text address_err"></span>
                    </div>
              
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block btn-submit">
                        Submit Now
                      </button>
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
  </div>
</section>
@endsection

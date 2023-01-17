@extends('layouts.admin-master')

@section('title')
View Bill Category
@endsection

@section('content')
<section class="section">
    <h2>{{ $pageTitle }}</h2>


  <div class="section-body">
  <div class="row mt-4">
              <div class="col-12 col-md-6 col-lg-6">
                
                <div class="card">
                  <form method="POST" action="{{ route('testingsubmit') }}">
                  @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label>Bill Category</label>
                        <input type="text" name="bill_category_name" class="form-control{{ $errors->has('bill_category_name') ? ' is-invalid' : '' }}" value="{{ old('bill_category_name') }}">
                        @if ($errors->has('bill_category_name'))
                        <span class="invalid-feedback"> {{ $errors->first('bill_category_name') }} </span>
                        @endif

                      </div>
                      <div class="form-group">
                        <label>Bill Icon</label>
                        <input type="text" name="bill_category_icon" class="form-control{{ $errors->has('bill_category_icon') ? ' is-invalid' : '' }}" value="{{ old('bill_category_icon') }}">
                        @if ($errors->has('bill_category_icon'))
                        <span class="invalid-feedback"> {{ $errors->first('bill_category_icon') }} </span>
                        @endif
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary">Add Bill</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>      
</div>

  </div>
</section>
@endsection

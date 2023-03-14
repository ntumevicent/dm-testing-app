@extends('layouts.admin-master')

@section('title')
View Bill Category
@endsection

@section('content')
<section class="section">
   <!-- <h1></h1>-->


  <div class="section-body">
    <div class="row mt-4">
        <div class="col-12 col-sm-6 col-lg-6">
            <div class="card">
              <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                 @foreach ($tabs as $id => $tab)
                  <li class="nav-item">
                    <a class="nav-link {{ $tab['bill_category_status'] }}" id="{{ $id }}-tab" data-toggle="tab" href="#{{ $id }}" role="tab" aria-controls="{{ $tab['bill_category_name'] }}" aria-selected="true">{{ $tab['bill_category_name'] }}</a>
                  </li>
                  @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach ($tabs as $id => $tab)
                  <div class="tab-pane fade {{ $tab['bill_category_show'] }} {{ $tab['bill_category_status'] }}" id="{{ $tab['bill_category_name'] }}" role="tabpanel" aria-labelledby="{{ $id }}-tab">
                    <form  action="{{ route('tabs-submit') }}" method="POST">
                      @csrf
                    <div class="form-group">
                        <label class="form-label">{{ $tab['bill_category_name'] }}</label>
                        <div class="selectgroup selectgroup-pills">
                            @foreach ($tab['bills']  as $bill)
                          <label class="selectgroup-item">
                            <input type="radio" name="bill_id" value="{{ $bill->id }}" class="selectgroup-input">
                            <span class="selectgroup-button selectgroup-button-icon"> {{ $bill->bill_name }}</span>
                          </label>
                          @endforeach
                        </div>
                    </div>
                    <h5>Selected: <span id="result"></span></h5>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block btn-submit">
                        Submit Now
                      </button>
                    </div>
                  </form>
                  </div>
                  @endforeach
                </div>
                
              </div>
            </div>
          </div>
    </div>
  </div>
</section>
@endsection
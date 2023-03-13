@extends('layouts.admin-master')

@section('title')
View Bill Category
@endsection

@section('content')
<section class="section">
    <h1>{{ $pageTitle }}</h1>


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
                    <div class="form-group">
                        <label class="form-label">{{ $tab['bill_category_name'] }}</label>
                        <div class="selectgroup selectgroup-pills">
                            @foreach ($tab['bills']  as $bill)
                          <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="{{ $bill->id }}" class="selectgroup-input">
                            <span class="selectgroup-button selectgroup-button-icon"> {{ $bill->bill_name }}</span>
                          </label>
                          @endforeach
                        </div>
                      </div>
                  </div>
                  @endforeach                

                </div>
                
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Default Tab</h4>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    Home tab Lorem ipsum dolor sit amet, 
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    Profile  Tab Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec hendrerit venenatis justo, eget scelerisque tellus pharetra a.
                  </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                   Contact tab Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum bibendum augue ut luctus.
                  </div>
                </div>
              </div>
            </div>
          </div>
          
    </div>
  </div>
</section>
@endsection

@extends('layouts.admin-master')

@section('title')
View Bill Category
@endsection

@section('content')
<section class="section">

  <div class="section-body">
  <div class="row mt-4">
              <div class="col-12 col-md-6 col-lg-6">
                
                <div class="card">
                  <form action="{{ route('store.photo') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label>Photo Title</label>
                        <input type="text" name="photo_title" class="form-control" value="{{ $photo->photo_title}}">
                      </div>
                      <div class="form-group">
                        <label>Upload Photo</label>
                        <input type="file" name="photo" class="form-control">
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary">Upload Photo</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>      
</div>

  </div>
</section>
@endsection

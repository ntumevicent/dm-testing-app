@extends('layouts.admin-master')

@section('title')
Testing Blogs
@endsection

@section('content')
<section class="section">
    <div class="section-body">
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
          <div class="card profile-widget">

            <div class="profile-widget-header text-center">                     
              <img alt="image"
                   id="image_preview"
                   src="assets/img/avatar/avatar-1.png" 
                   class="rounded-circle" 
                   width="200">
            </div>

            <div class="card-body">
                <div class="form-group custom-file">
                    <input type="file" name="picture" class="custom-file-input" id="picture">
                    <label class="custom-file-label" for="picture">upload photo</label>
                </div>

                <input type="hidden" name="id" id="user_id" value="4">
                <form action="#" method="POST" id="profile_form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update Profile" class="btn btn-primary" id="profile_btn">
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
<script>
    $(function() {
        $("#picture").change(function(e) {
            const file = e.target.files[0];
            let url = window.URL.createObjectURL(file);
            $("#image_preview").attr('src', url);
            let fd = new FormData();
            fd.append('picture', file);
            fd.append('id', $("#user_id").val());
            fd.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: '{{ route('profile.image') }}',
                method: 'post',
                data: fd,
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                }
            });
        });
    });
</script>
@endsection

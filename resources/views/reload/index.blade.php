<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Stisla Laravel') &mdash; {{ env('APP_NAME') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
</head>
<body>
  <div class="container" id="app">
    <ul class="nav">
        <li class="nave-item">
            <a class="nav-link active" href="#" onclick="routeToHome()"> Home</a>
        </li>
        <li class="nave-item">
            <a class="nav-link" href="#" onclick="routeToUsers()"> Users</a>
        </li>

        <li class="nave-item">
          <a class="nav-link" href="#" onclick="routeToPeople()"> People</a>
        </li>
    </ul>

    <div id="nav">
       
    </div>


  </div>

  <script src="{{ asset('js/app.js') }}?{{ uniqid() }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.js') }}"></script>

  <script>
    function routeToUsers(){
      event.preventDefault();
      const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: "{{ route('reload.getusers') }}",
        type: 'get',
        //data: { CSRF_TOKEN },
        beforeSend: function() {
            var displayProduct = 5;
           //$('#nav').html(createSkeleton(displayProduct));
           $('#nav').html(make_skeleton());
         // $('#nav').html('<div class="spinner-border text-warning spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>');
        },
        success: function(response){
            setTimeout(function(){
                $("#nav").html(response)
            }, 5000);
        }
      })
    }

    function routeToHome(){
      event.preventDefault();
      const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: "{{ route('reload.gethome') }}",
        type: 'get',
        data: { CSRF_TOKEN },
        beforeSend: function() {
         $('#nav').html('<div class="spinner-border text-warning spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>');
    },
        success: function(response){
            setTimeout(function(){
                $("#nav").html(response)
            }, 1000);
        }
      })
    }

    function routeToPeople(){
      event.preventDefault();
      const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: "{{ route('reload.getpeople') }}",
        type: 'get',
        data: { CSRF_TOKEN },
        beforeSend: function() {
         $('#nav').html('<div class="spinner-border text-warning spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>');
    },
        success: function(response){
            setTimeout(function(){
                $("#nav").html(response)
            }, 1000);
        }
      })
    }

    function make_skeleton() {
      var output = '';
      for(var count = 0; count < 5; count++)
      {
        output += '<div class="ph-item">';
        output += '<div class="ph-col-4">';
        output += '<div class="ph-picture"></div>';
        output += '</div>';
        output += '<div>';
        output += '<div class="ph-row">';
        output += '<div class="ph-col-12 big"></div>';
        output += '<div class="ph-col-12"></div>';
        output += '<div class="ph-col-12"></div>';
        output += '<div class="ph-col-12"></div>';
        output += '<div class="ph-col-12"></div>';
        output += '</div>';
        output += '</div>';
        output += '</div>';
      }
      return output;
    }
    

    function createSkeleton(limit){
        var skeletonHTML = '';
        for(var i = 0; i < limit; i++){
            skeletonHTML += '<div class="ph-item">';
            skeletonHTML += '<div class="ph-col-4">';
            skeletonHTML += '<div class="ph-picture"></div>';
            skeletonHTML += '</div>';
            skeletonHTML += '<div>';
            skeletonHTML += '<div class="ph-row">';
            skeletonHTML += '<div class="ph-col-12 big"></div>';
            skeletonHTML += '<div class="ph-col-12"></div>';
            skeletonHTML += '<div class="ph-col-12"></div>';
            skeletonHTML += '<div class="ph-col-12"></div>';
            skeletonHTML += '<div class="ph-col-12"></div>';
            skeletonHTML += '</div>';
            skeletonHTML += '</div>';
            skeletonHTML += '</div>';
        }
        return skeletonHTML;
    }

function loadProducts(limit){
  $.ajax({
	url:"load_action.php",
	method:"POST",
	data:{action: 'load_products', limit:limit},
	success:function(data) {
	  $('#results').html(data);
	}
  });
}

  </script>
</body>
</html>

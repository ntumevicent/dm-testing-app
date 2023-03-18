<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Survey Form</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      
        <!-- CSS Libraries -->
      
        <!-- Template CSS -->
        <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/style.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/components.css">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <style>
          .nav-tabs .nav-item .nav-link {
    padding: 0;
    border: none;
}

.nav-tabs .nav-item .nav-link img {
    max-width: 100%;
}

.nav-tabs .nav-item.disabled .nav-link {
    opacity: 0.5;
    pointer-events: none;
}

        </style>
	</head>
	<body>
		<ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#tab1">
                    <img src="path/to/image1.jpg" alt="Tab 1">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab2" disabled>
                    <img src="path/to/image2.jpg" alt="Tab 2">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tab3" disabled>
                    <img src="path/to/image3.jpg" alt="Tab 3">
                </a>
            </li>
        </ul>
        
        <div class="tab-content">
            <div id="tab1" class="tab-pane fade show active">
                <h3>Tab 1 Content</h3>
                <p>This is the content for Tab 1</p>
            </div>
            <div id="tab2" class="tab-pane fade">
                <h3>Tab 2 Content</h3>
                <p>This is the content for Tab 2</p>
            </div>
            <div id="tab3" class="tab-pane fade">
                <h3>Tab 3 Content</h3>
                <p>This is the content for Tab 3</p>
            </div>
        </div>
        
        <script src="http://127.0.0.1:8000/js/app.js?641479fd17365"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/stisla.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/scripts.js"></script>
        <script src="http://127.0.0.1:8000/assets/modules/sweetalert/sweetalert.min.js"></script>
        <script src="http://127.0.0.1:8000/assets/js/page/modules-sweetalert.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        <script>
            $('a.nav-link').on('click', function() {
    $('a.nav-link').not(this).addClass('disabled');
    $(this).removeClass('disabled');
});

            </script>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
  <title>Pencatatan Barang</title>
  <link href="{{ asset('img/logo.png') }}" rel="icon">
  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
    }
    .sidebar {
      height: 100%;
    }
    .nav-link.active {
      background-color: darkblue;
      color: white;
    }

    .nav-link.active i {
      color: white;
    }
  </style>
</head>
<body>
  <x-side></x-side>
  <div class="content bg-light">
    <div class="container mt-5 bg-white isi">
      {{ $slot }}
    </div>
  </div>
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script type="text/javascript"> 
    function preventBack() { 
        window.history.forward();  
    } 
      
    setTimeout("preventBack()", 0); 
      
    window.onunload = function () { null }; 

    CKEDITOR.replace( 'content' );
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (tooltipNode) {
      new bootstrap.Tooltip(tooltipNode)
    })

    window.history.forward(); 
        function noBack() { 
            window.history.forward(); 
        } 
  </script>
</body>
</html>

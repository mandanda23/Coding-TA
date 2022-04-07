<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('/assets/img/logo1.png')}}" rel="icon">
  
  
    <!-- Google Fonts -->
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com')}}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com')}}" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600&family=Poppins&family=Yatra+One&display=swap" rel="stylesheet">
    
   <!----===== Boxicons CSS ===== -->
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

    <title>pura kahyangan | {{ $title }} </title>
 
   
  </head>
  <body id="page-top">
    @include('partials.navbar')
      <div >
        @yield("container")
      </div>


  

   <!-- Page level custom scripts -->
   <script src="js/demo/chart-area-demo.js"></script>
   <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>
  </body>
</html> 
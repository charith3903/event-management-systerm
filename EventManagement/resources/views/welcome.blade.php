<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: white;
            background: linear-gradient(270deg, #f0ddec, #3eabeef7);
            background-size: 400% 400%;
            animation: gradientBG 7s ease infinite;
        }

        .nav-link {
            color: #ffffff !important;
        }

        .nav-link.active {
            color: #0d6efd !important;
        }

        .bg-dark .text-gray-800, .bg-dark .dark\:text-gray-200 {
            color: #ffffff !important;
        }

        .bg-dark .text-primary-emphasis {
            color: #0d6efd !important;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Optional: to make content more readable */
            pointer-events: none; /* Ensures overlay doesn't block interactions */
            z-index: -1; /* Ensure it doesn't block any content */
        }
    </style>
</head>
<body class="p-3 mb-2">
    <div class="overlay"></div>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Log in</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
    </ul>

    <div class="container">
        <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end bg-dark text-gray-800 dark:text-gray-200">
            <h1>Welcome to Event Management System</h1>
        </div><br>

        <div class="row">
            <div class="col-md-12">
                <p>Event Management System is a web application that allows users to create, read, update, and delete events. It is built with Laravel, Livewire, and Tailwind CSS.</p>
            </div>
        </div>
    </div>

    <section class="p-3 mb-2 text-primary-emphasis animated-bg">
        <div class="container px-6 py-10 mx-auto position-relative">
            <h1 class="text-3xl font-semibold capitalize lg:text-4xl text-white">Latest Events</h1>

            <div class="row mt-8">
                @foreach ($events as $event)
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 18rem; height: 24rem;"> <!-- Fixed card size -->
                        <img src="{{ asset('/storage/' . $event->image) }}" class="card-img-top" alt="{{ $event->title }}" style="height: 12rem; object-fit: cover;"> <!-- Fixed image size -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <div>
                                @foreach ($event->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            <a href="{{ route('eventShow', $event->id) }}" class="btn btn-primary mt-2">More info</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container my-5">

    <footer class="bg-dark text-center text-lg-start text-white">
      <!-- Grid container -->
      <div class="container p-4">
        <!--Grid row-->
        <div class="row mt-4">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">See other books</h5>

            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white"><i class="fas fa-book fa-fw fa-sm me-2"></i>Bestsellers</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-book fa-fw fa-sm me-2"></i>All books</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-user-edit fa-fw fa-sm me-2"></i>Our authors</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Execution of the contract</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!" class="text-white"><i class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>Supply</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-backspace fa-fw fa-sm me-2"></i>Returns</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="far fa-file-alt fa-fw fa-sm me-2"></i>Regulations</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="far fa-file-alt fa-fw fa-sm me-2"></i>Privacy policy</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Publishing house</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!" class="text-white">The BookStore</a>
              </li>
              <li>
                <a href="#!" class="text-white">123 Street</a>
              </li>
              <li>
                <a href="#!" class="text-white">05765 NY</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-briefcase fa-fw fa-sm me-2"></i>Send us a book</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Write to us</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!" class="text-white"><i class="fas fa-at fa-fw fa-sm me-2"></i>Help in purchasing</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>Check the order status</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="fas fa-envelope fa-fw fa-sm me-2"></i>Join the newsletter</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2021 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
    </footer>

  </div>
  <!-- End of .container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

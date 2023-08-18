<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Perpusku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app/content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app/footer.css') }}">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</head>
<body style="height: 100%">
<section class="h-100 w-100 bg-white" style="box-sizing: border-box">
    <nav class="navbar-1-1 navbar navbar-expand-lg navbar-light p-4 px-md-4 mb-3 bg-body"
         style="font-family: Poppins, sans-serif">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M3.5 15.75C3.5 8.98451 8.98451 3.5 15.75 3.5H29.75C30.7165 3.5 31.5 4.2835 31.5 5.25C31.5 6.2165 30.7165 7 29.75 7H15.75C10.9175 7 7 10.9175 7 15.75V29.75C7 30.7165 6.2165 31.5 5.25 31.5C4.2835 31.5 3.5 30.7165 3.5 29.75V15.75Z"
                          fill="#0EC8F8"/>
                    <path
                        d="M10.5 17.5C10.5 13.634 13.634 10.5 17.5 10.5H31.5C35.366 10.5 38.5 13.634 38.5 17.5V31.5C38.5 35.366 35.366 38.5 31.5 38.5H17.5C13.634 38.5 10.5 35.366 10.5 31.5V17.5Z"
                        fill="#0EC8F8"/>
                </svg>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-md-4 active" aria-current="page" href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-md-4" href="{{ route('perpusku.book.index') }}">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-md-4" href="{{ route('perpusku.borrow.index') }}">Borrow</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-md-4" href="{{ route('perpusku.profil.index') }}">Profil</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <form action="{{ route('auth.logout') }}"
                          onsubmit="return confirm('Apakah Anda yakin ingin logout?')" method="post">
                        @csrf
                        <button type="submit" class="btn btn-get-started">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</section>

<section class="h-100 w-100 bg-white" style="box-sizing: border-box ">
    <div class="content-2-2 container-xxl mx-auto p-0  position-relative p-4 m-4"
         style="font-family: 'Poppins', sans-serif">
        @if (session()->get('success'))
            <div class="container">
                <div class="text-center">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('success') }}!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </div>
</section>

<section class="h-100 w-100 bg-white" style="box-sizing: border-box">
    <div class="footer-2-2 container-xxl mx-auto position-relative p-0" style="font-family: 'Poppins', sans-serif">
        <div class="border-color info-footer">
            <div class="">
                <hr class="hr"/>
            </div>
            <div class="mx-auto d-flex flex-column flex-lg-row align-items-center footer-info-space gap-4">
                <nav class="mx-auto d-flex flex-wrap align-items-center justify-content-center gap-4">
                    <p style="margin: 0">Copyright © {{ date('Y') }} Perpusku</p>
                </nav>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
<script>
    document.getElementsByClassName('footer-link').addEventListener("click", function (event) {
        event.preventDefault()
    });
</script>
</body>
</html>

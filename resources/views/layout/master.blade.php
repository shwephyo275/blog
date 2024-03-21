<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/argon-design-system-free@1.2.0/assets/css/argon-design-system.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('css')
</head>
<body>
    <div class="container-fluid bg-dark d-flex align-items-center justify-content-center" style="height: 38vh;">
        <h2 class="text-white">Blog App</h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="card card-body">
                    <div class="list-group">
                        <div class="bd-dark text-white list-group-item">All Category</div>
                        <a href="{{ url('/') }}" class="list-group-item text-dark">All</a>
                        <a href="" class="list-group-item text-dark">Category</a>
                    </div>
                </div>
            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (session()->has('success'))
            toastr.success("{{ session('success') }}")
        @endif
        @if (session()->has('error'))
            toastr.success("{{ session('error') }}")
        @endif
    </script>
    @yield('js')
</body>
</html>

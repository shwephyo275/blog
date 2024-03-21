<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/argon-design-system-free@1.2.0/assets/css/argon-design-system.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('css')
</head>
<body>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-3">
                <div class="card card-body">
                    <ul class="list-group">
                        <a href="{{ url('/admin') }}" class="list-group-item">Dashboard</a>
                        <li class="list-group-item">Category</li>
                        <a href="{{ url('/admin/blog') }}" class="list-group-item">Blogs</a>
                        <a href="{{ url('admin/user') }}" class="list-group-item">Users</a>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <div class="card card-body">
                    @if($errors->any())
                        @foreach ($errors->all() as $e )
                            <div class="alert alert-danger">{{ $e }}</div>
                        @endforeach
                    @endif
                    @yield('content')
                </div>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .background {
            background:  url('{{ asset('images/bg-login.jpg') }}') no-repeat center center;
            background-size: cover;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.5); 
            backdrop-filter: grayscale(100%) blur(5px); 
        }
        .bg-light {
        background-color: rgb(248 249 250 / 45%) !important;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 ">
    <div class="background position-fixed w-100 h-100 top-0 start-0 z-n1"></div>
    <div class="overlay position-fixed w-100 h-100 top-0 start-0 z-n1"></div>

    <div class="p-4 border rounded shadow bg-light col-md-4">
        <h2 class="text-center">Login for Admin</h2>
        <hr>
        <form action="{{route('admin.login.submit')}}" method="post" id="loginForm">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="hello@gmail.com">
                <label for="email">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="****">
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn btn-dark w-100">Login</button>
        </form>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function () {
        $("#loginForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                email: {
                    required: "Please enter your email",
                    email: "Enter a valid email address"
                },
                password: {
                    required: "Please enter your password",
                    minlength: "Password must be at least 6 characters long"
                }
            },
            errorElement: "div",
            errorClass: "text-danger",
            highlight: function(element) {
                $(element).addClass("is-invalid");
            },
            unhighlight: function(element) {
                $(element).removeClass("is-invalid");
            }
        });
    });
</script>

    </script>
</body>
</html>

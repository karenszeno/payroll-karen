<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Login Administrator</title>
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-container {
            width: 100%;
            max-width: 380px;
            padding: 20px 25px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .card-header {
            font-size: 1.6rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
            font-size: 0.9rem;
        }

        .form-control {
            border-radius: 30px;
            padding: 10px 15px;
            font-size: 0.95rem;
            border: 1.5px solid #ccc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 8px rgba(0, 86, 179, 0.2);
        }

        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
            padding: 10px;
            border-radius: 30px;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #004494;
            border-color: #004494;
        }

        .footer {
            margin-top: 15px;
            font-size: 0.85rem;
            color: #777;
        }

        .footer a {
            color: #0056b3;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 15px 20px;
                max-width: 90%;
            }

            .card-header {
                font-size: 1.4rem;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="card">
            <div class="card-header">Login Administrator</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username input -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>

                <!-- Password input -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <!-- Role selection -->
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="admin_payroll_perusahaan">Admin Payroll Perusahaan</option>
                        <option value="admin">Admin</option>
                        <option value="payroll_admin">Payroll Admin</option>
                    </select>
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

            <!-- Display error messages if login fails -->
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

</body>

</html>

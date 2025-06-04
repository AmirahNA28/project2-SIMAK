<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pelanggan</title>
    <!-- Menambahkan beberapa style dasar -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        .register-link {
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Login Pelanggan</h2>

        <!-- Menampilkan pesan error jika ada -->
        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('loginpelanggan') }}" method="POST">
            @csrf

            <!-- Input Email -->
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <!-- Input Password -->
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <!-- Submit Button -->
            <button type="submit">Login</button>
        </form>

        <p class="register-link">
            Belum punya akun? <a href="{{ route('registerpelanggan') }}">Daftar disini</a>
        </p>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | Saung Kandang Sapi</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

    * {
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Montserrat', sans-serif;
      background: linear-gradient(270deg, #f9f4ef, #d7c1a0, #f0d9a1, #e8cfae);
      background-size: 800% 800%;
      animation: backgroundMove 20s ease infinite;
      color: #4b3621;
      overflow-x: hidden;
      position: relative;
    }

    @keyframes backgroundMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .lightning {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      background: rgba(255, 255, 255, 0);
      z-index: 0;
      animation: flash 15s infinite;
    }

    @keyframes flash {
      0%, 100% { background: rgba(255, 255, 255, 0); }
      3% { background: rgba(255, 255, 255, 0.25); }
      4% { background: rgba(255, 255, 255, 0); }
      6% { background: rgba(255, 255, 255, 0.15); }
      7% { background: rgba(255, 255, 255, 0); }
      30% { background: rgba(255, 255, 255, 0); }
      31% { background: rgba(255, 255, 255, 0.2); }
      32% { background: rgba(255, 255, 255, 0); }
    }

    .container {
      position: relative;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 2;
      padding: 2rem;
      gap: 3rem;
    }

    .left-panel {
      flex: 1;
      max-width: 45%;
      padding-right: 3rem;
      text-align: center;
    }

    .emoji-bounce {
      font-size: 5rem;
      animation: bounce 2s infinite ease-in-out, cow-swing 3s ease-in-out infinite;
    }

    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    @keyframes cow-swing {
      0%, 100% { transform: rotate(0deg); }
      50% { transform: rotate(5deg); }
    }

    .right-panel {
      flex: 1;
      max-width: 400px;
      background: rgba(255, 255, 255, 0.85);
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .form-control {
      border-radius: 30px;
      padding: 0.75rem 1.5rem;
    }

    .btn-login {
      width: 100%;
      margin-top: 1rem;
      border-radius: 30px;
      padding: 0.75rem;
      background-color: #6b4e2f;
      color: white;
      font-weight: bold;
      border: none;
      transition: 0.3s;
    }

    .btn-login:hover {
      background-color: #543c25;
    }

    .btn-signup {
        width: 100%;
        margin-top: 0.75rem;
        border-radius: 30px;
        padding: 0.65rem;
        background: transparent;
        border: 2px solid #6b4e2f;
        color: #6b4e2f;
        font-weight: bold;
        transition: 0.3s;
        text-align: center;
        display: block;
        }

    .btn-signup:hover {
      background-color: #6b4e2f;
      color: white;
    }

    footer {
      margin-top: 1.5rem;
      font-size: 0.85rem;
      text-align: center;
      color: #4b3621;
    }

    @media (max-width: 900px) {
      .container {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="lightning"></div>

  <div class="container">
    <!-- Left Panel -->
    <div class="left-panel">
      <div class="emoji-bounce">🐮</div>
      <h1>Selamat Datang di <strong>SIMAK</strong></h1>
      <p>Sistem Informasi Manajemen Saung Kandang Sapi, solusi modern untuk peternakan Anda.</p>
      <a href="#" class="btn btn-primary mt-3">Pelajari Lebih Lanjut</a>
    </div>

    <!-- Right Panel (Login Form) -->
    <div class="right-panel">
      <h2 class="text-center mb-4">Login</h2>

      @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
      @endif

        <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required />
            @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required />
            @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
            <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
            <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <a href="#">Lupa Password?</a>
        </div>

        <button type="submit" class="btn-login">Sign In</button>
        </form>

        <!-- Tombol Sign Up terpisah dari form -->
        <a href="{{ route('register') }}" class="btn-signup text-center d-block w-100">Sign Up</a>
    </div>
  </div>
</body>
</html>

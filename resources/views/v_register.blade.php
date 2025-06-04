<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register | Saung Kandang Sapi</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Montserrat', sans-serif;
      background: linear-gradient(270deg, #f9f4ef, #d7c1a0, #f0d9a1, #e8cfae);
      background-size: 800% 800%;
      animation: backgroundMove 20s ease infinite;
      color: #4b3621;
      overflow-x: hidden;
    }

    @keyframes backgroundMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 2rem;
      padding: 2rem;
    }

    .left-panel {
      flex: 1;
      max-width: 450px;
      text-align: center;
    }

    .left-panel .emoji {
      font-size: 5rem;
      animation: bounce 2s infinite ease-in-out;
    }

    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    .left-panel h1 {
      font-size: 2.5rem;
      font-weight: 700;
    }

    .left-panel p {
      font-size: 1.1rem;
      margin-top: 1rem;
    }

    .right-panel {
      flex: 1;
      max-width: 450px;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(8px);
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .form-control {
      border-radius: 30px;
      padding: 0.75rem 1.25rem;
    }

    .btn-register {
      width: 100%;
      border-radius: 30px;
      padding: 0.75rem;
      background-color: #6b4e2f;
      color: white;
      font-weight: bold;
      border: none;
      transition: background-color 0.3s ease;
    }

    .btn-register:hover {
      background-color: #543c25;
    }

    .text-danger {
      font-size: 0.9rem;
      margin-top: 0.25rem;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left-panel">
      <div class="emoji">🐮</div>
      <h1>Selamat Datang di <br><strong>SIMAK</strong></h1>
      <p>Daftar sekarang dan mulai kelola peternakan sapi Anda secara efisien dan modern.</p>
    </div>

    <div class="right-panel">
      <h2 class="text-center mb-4">Daftar Akun</h2>

      @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <div class="mb-3">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
          @error('name')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email" value="{{ old('email') }}" required>
          @error('email')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
          @error('password')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
        </div>

        <div class="mb-3">
          <select name="role" class="form-control" required>
            <option value="">-- Pilih Peran --</option>
            <option value="karyawan">Karyawan</option>
            <option value="pemilik">Pemilik</option>
            <option value="pelanggan">Pelanggan</option>
          </select>
        </div>

        <button type="submit" class="btn-register">Daftar</button>
      </form>

      <p class="text-center mt-3">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </div>
  </div>
</body>
</html>

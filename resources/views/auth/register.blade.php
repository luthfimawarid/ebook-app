<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register - EbookApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #74b9ff, #a29bfe);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    .input-group-text {
      background: transparent;
      border-left: 0;
      cursor: pointer;
    }
  </style>
</head>
<body>
<div class="card p-4" style="width: 400px;">
  <h4 class="text-center mb-4 text-primary">Daftar Akun Baru</h4>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Nama Lengkap</label>
      <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <div class="input-group">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <span class="input-group-text" onclick="togglePassword()">
          <i id="eyeIcon" class="bi bi-eye"></i>
        </span>
      </div>
    </div>
    <button class="btn btn-success w-100">Daftar</button>
    <p class="mt-3 text-center mb-0">Sudah punya akun?
      <a href="{{ route('login') }}" class="text-decoration-none text-primary">Login</a>
    </p>
  </form>
</div>

<script>
function togglePassword() {
  const pass = document.getElementById('password');
  const icon = document.getElementById('eyeIcon');
  if (pass.type === 'password') {
    pass.type = 'text';
    icon.classList.replace('bi-eye', 'bi-eye-slash');
  } else {
    pass.type = 'password';
    icon.classList.replace('bi-eye-slash', 'bi-eye');
  }
}
</script>
</body>
</html>

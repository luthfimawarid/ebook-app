<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - EbookApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background: #f4f7fc;
    }
    .navbar {
      background: linear-gradient(135deg, #74b9ff, #0984e3);
    }
    .navbar-brand {
      font-weight: 600;
      color: white !important;
      letter-spacing: 0.5px;
    }
    .table thead {
      background-color: #0984e3;
      color: white;
    }
    .table tbody tr:hover {
      background-color: #f1f9ff;
    }
    .card {
      border: none;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      border-radius: 12px;
    }
    .btn-primary {
      background-color: #0984e3;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0869b1;
    }
  </style>
</head>
<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg mb-4 shadow-sm">
  <div class="container">
    <span class="navbar-brand"><i class="bi bi-book"></i> Dashboard</span>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="btn btn-outline-light btn-sm">
        <i class="bi bi-box-arrow-right"></i> Logout
      </button>
    </form>
  </div>
</nav>

<!-- ✅ Main Content -->
<div class="container">

  <!-- 📘 Form Tambah Ebook -->
  <div class="card mb-4 p-4">
    <h5 class="mb-3 text-primary"><i class="bi bi-file-earmark-plus"></i> Tambah Ebook Baru</h5>
    <form action="{{ route('ebooks.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row g-3">
        <div class="col-md-4">
          <input type="text" name="title" class="form-control" placeholder="Judul Ebook" required>
        </div>
        <div class="col-md-4">
          <input type="file" name="file" class="form-control" accept=".pdf" required>
        </div>
        <div class="col-md-4">
          <button class="btn btn-primary w-100"><i class="bi bi-plus-circle"></i> Tambah</button>
        </div>
      </div>
    </form>
  </div>

  <!-- 📚 List Ebook -->
  <div class="card p-4">
    <h5 class="mb-3 text-primary"><i class="bi bi-collection"></i> Daftar Ebook</h5>
    <table class="table table-hover align-middle">
      <thead>
        <tr>
          <th style="width: 60px;">No</th>
          <th>Nama Ebook</th>
          <th style="width: 180px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($ebooks as $i => $ebook)
        <tr>
          <td>{{ $i + 1 }}</td>
          <td>{{ $ebook->title }}</td>
          <td>
            <a href="{{ route('ebooks.view', $ebook->id) }}" class="btn btn-sm btn-info text-white">
              <i class="bi bi-eye"></i> Lihat
            </a>
            <button type="button" class="btn btn-sm btn-danger"
                    onclick="confirmDelete('{{ route('ebooks.destroy', $ebook->id) }}')">
              <i class="bi bi-trash"></i> Hapus
            </button>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3" class="text-center text-muted">Belum ada eBook.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<script>
// ✅ Notifikasi sukses upload/hapus
@if (session('success'))
Swal.fire({
  icon: 'success',
  title: 'Berhasil!',
  text: '{{ session('success') }}',
  timer: 1500,
  showConfirmButton: false
});
@endif

// 🗑️ Konfirmasi hapus eBook
function confirmDelete(url) {
  Swal.fire({
    title: 'Hapus eBook ini?',
    text: "Data akan dihapus permanen!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#6c757d',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = url;

      const token = document.createElement('input');
      token.type = 'hidden';
      token.name = '_token';
      token.value = '{{ csrf_token() }}';
      form.appendChild(token);

      const method = document.createElement('input');
      method.type = 'hidden';
      method.name = '_method';
      method.value = 'DELETE';
      form.appendChild(method);

      document.body.appendChild(form);
      form.submit();
    }
  });
}
</script>

</body>
</html>

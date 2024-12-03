<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Simpan Data Mahasiswa</title>
    <!-- Tambahkan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212; /* Warna latar belakang tema gelap */
            color: #a0a0a0; /* Warna teks default */
        }
        .form-control {
            background-color: #b6b6b6; /* Warna latar belakang input */
            color: #000000; /* Warna teks input */
            border: 1px solid #444; /* Warna border input */
        }
        .form-control:focus {
            background-color: #7e7e7e; /* Warna saat fokus */
            border-color: #0d6efd; /* Warna border fokus */
            box-shadow: none; /* Hilangkan bayangan */
        }
        .btn-primary {
            background-color: #0d6efd; /* Warna tombol */
            border: none;
        }
        .btn-primary:hover {
            background-color: #0b5ed7; /* Warna tombol saat hover */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="p-4 rounded bg-dark text-light">
            <h1 class="text-center mb-4">Buat Data Mahasiswa</h1>
            <!-- Tampilkan Pesan Sukses -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tampilkan Error Validasi -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="npm" class="form-label">NPM</label>
                    <input type="text" name="npm" id="npm" class="form-control" placeholder="Masukkan NPM" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <input type="text" name="prodi" id="prodi" class="form-control" placeholder="Masukkan Program Studi" required>
                </div><br>
                <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
            </form>
        </div>
    </div>
</body>
</html>

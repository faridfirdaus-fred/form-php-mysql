<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .form-container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .required-field::after {
            content: " *";
            color: red;
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Form Kontak</h1>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                <div class="alert alert-success" role="alert">
                    Pesan Anda berhasil dikirim! Terima kasih telah menghubungi kami.
                </div>
            <?php endif; ?>

            <form action="api/process-form.php" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label required-field">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label required-field">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label required-field">Nomor Handphone</label>
                    <input type="tel" class="form-control" id="telepon" name="telepon" required>
                </div>

                <div class="mb-3">
                    <label for="pesan" class="form-label required-field">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>

            <div class="mt-3 text-center">
                <a href="api/view-data.php" class="text-decoration-none">Lihat semua pesan</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
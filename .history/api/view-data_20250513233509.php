<?php
// Include database connection
require_once 'db-connect.php';

// Query to get all form submissions
$sql = "SELECT * FROM pesan ORDER BY tanggal_kirim DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Pesan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen p-4">
    <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">Data Pesan Masuk</h1>

        <?php if ($result->num_rows > 0): ?>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border-b text-left">ID</th>
                            <th class="py-2 px-4 border-b text-left">Nama</th>
                            <th class="py-2 px-4 border-b text-left">Email</th>
                            <th class="py-2 px-4 border-b text-left">Telepon</th>
                            <th class="py-2 px-4 border-b text-left">Pesan</th>
                            <th class="py-2 px-4 border-b text-left">Tanggal Kirim</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="py-2 px-4 border-b"><?php echo $row["id"]; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row["nama"]); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row["email"]); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row["telepon"]); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row["pesan"]); ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row["tanggal_kirim"]; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
                <p>Belum ada pesan masuk.</p>
            </div>
        <?php endif; ?>

        <div class="mt-6">
            <a href="/form-chat/" class="inline-block bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                Kembali ke Form
            </a>
        </div>
    </div>

    <?php $conn->close(); ?>
</body>

</html>
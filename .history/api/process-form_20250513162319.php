<?php
// Include database connection
require_once 'db-connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $nama = $conn->real_escape_string($_POST['nama']);
    $email = $conn->real_escape_string($_POST['email']);
    $telepon = $conn->real_escape_string($_POST['telepon']);
    $pesan = $conn->real_escape_string($_POST['pesan']);
    
    // Prepare SQL statement to prevent SQL injection
    $sql = "INSERT INTO pesan (nama, email, telepon, pesan, tanggal_kirim) 
            VALUES (?, ?, ?, ?, NOW())";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nama, $email, $telepon, $pesan);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Pesan Terkirim</title>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <script src='https://cdn.tailwindcss.com'></script>
        </head>
        <body class='bg-gray-100 min-h-screen flex items-center justify-center p-4'>
            <div class='bg-white rounded-lg shadow-md p-8 w-full max-w-md text-center'>
                <div class='mb-4 text-green-500'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='h-16 w-16 mx-auto' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7' />
                    </svg>
                </div>
                <h1 class='text-2xl font-bold mb-2'>Pesan Terkirim!</h1>
                <p class='text-gray-600 mb-6'>Terima kasih telah menghubungi kami. Pesan Anda telah berhasil dikirim.</p>
                <a href='/' class='inline-block bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200'>
                    Kembali ke Form
                </a>
            </div>
        </body>
        </html>
        ";
    } else {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Error</title>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <script src='https://cdn.tailwindcss.com'></script>
        </head>
        <body class='bg-gray-100 min-h-screen flex items-center justify-center p-4'>
            <div class='bg-white rounded-lg shadow-md p-8 w-full max-w-md text-center'>
                <div class='mb-4 text-red-500'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='h-16 w-16 mx-auto' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                        <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12' />
                    </svg>
                </div>
                <h1 class='text-2xl font-bold mb-2'>Error!</h1>
                <p class='text-gray-600 mb-6'>Terjadi kesalahan: " . $stmt->error . "</p>
                <a href='/' class='inline-block bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200'>
                    Kembali ke Form
                </a>
            </div>
        </body>
        </html>
        ";
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

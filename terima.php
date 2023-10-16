<?php
$host = 'test.test'; // Ganti dengan host server WebSocket Anda
$port = 80; // Ganti dengan port server WebSocket Anda

// Buat socket klien
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "Gagal membuat socket klien: " . socket_strerror(socket_last_error()) . "\n";
    exit;
}

// Sambungkan ke server WebSocket
if (!socket_connect($socket, $host, $port)) {
    echo "Gagal menyambung ke $host:$port: " . socket_strerror(socket_last_error()) . "\n";
    exit;
}

// Kirim pesan WebSocket
$message = "Hello, WebSocket Server!";
socket_write($socket, $message, strlen($message));

// Terima respons dari server
$response = socket_read($socket, 2048);
echo "Respons dari server: $response\n";

// Tutup socket klien
socket_close($socket);
?>

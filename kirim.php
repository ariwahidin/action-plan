<?php
$host = 'test.test'; // Ganti dengan host yang ingin Anda uji
$port = 80; // Ganti dengan port yang sesuai dengan host Anda
$dataToSend = 'Ini adalah data yang akan dikirim ke server.';

// Membuat socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if ($socket === false) {
    echo "Gagal membuat socket: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "Socket berhasil dibuat.\n";
}

// Menyambungkan ke host
if (socket_connect($socket, $host, $port) === false) {
    echo "Gagal menyambung ke $host:$port: " . socket_strerror(socket_last_error()) . "\n";
} else {

    echo "Berhasil menyambung ke $host.\n";
    // Format data untuk melakukan Handshake WebSocket
    $key = base64_encode(openssl_random_pseudo_bytes(16));
    $headers = "GET /tiket/terima.php HTTP/1.1\r\n" .
               "Host: $host\r\n" .
               "Upgrade: websocket\r\n" .
               "Connection: Upgrade\r\n" .
               "Sec-WebSocket-Key: $key\r\n" .
               "Sec-WebSocket-Version: 13\r\n\r\n";

    // Kirim Handshake ke server
    socket_write($socket, $headers, strlen($headers));

    // Menerima respons dari server (jika ada)
    $response = socket_read($socket, 2048);
    echo "Respons dari server: " . $response . "\n";

    // Kirim data ke server WebSocket
    $dataToSend = "Ini adalah data yang akan dikirim ke server.";
    $encodedData = "\x81" . chr(strlen($dataToSend)) . $dataToSend;
    socket_write($socket, $encodedData, strlen($encodedData));
}

// Tutup socket
socket_close($socket);
?>

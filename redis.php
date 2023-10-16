<?php
// Koneksi ke server Redis
$redis = new Redis();
$redis->connect('https://test.test/tiket/', 6379); // Ganti dengan host dan port Redis Anda

// Key dan value yang akan disimpan di cache
$key = 'contoh_key';
$value = 'Ini adalah data yang akan disimpan di cache';

// Simpan data ke cache dengan waktu kedaluwarsa 60 detik
$redis->set($key, $value, 60);

// Membaca data dari cache
$cachedValue = $redis->get($key);

if ($cachedValue !== false) {
    echo "Data dari cache: $cachedValue\n";
} else {
    echo "Data tidak ditemukan di cache. Menyimpan data ke cache...\n";

    // Simpan data ke cache jika tidak ada dalam cache
    $redis->set($key, $value, 60);

    echo "Data berhasil disimpan di cache.\n";
}

// Tutup koneksi Redis
$redis->close();
?>

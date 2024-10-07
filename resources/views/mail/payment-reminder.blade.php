<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Konsultasi Anda</title>
</head>
<body>
<h1>Halo, {{ $nama }}!</h1>
<p>Terima kasih telah mendaftar untuk konsultasi di MentalMate. Berikut detail pembayaran Anda:</p>
<ul>
    <li>Nama Konsultasi: {{ $nama }}</li>
    <li>Psikolog: {{ $psikolog }}</li>
    <li>Harga Konsultasi: Rp{{ number_format($harga_konsultasi, 0, ',', '.') }}</li>
    <li>Tanggal Konsultasi: {{ $tanggal }}</li>
</ul>
<p>Mohon segera lakukan pembayaran menggunakan metode {{ $metode_pembayaran }} untuk melanjutkan proses konsultasi.</p>
<p>Klik <a href="{{ route('client.paymentPage', ['snapToken' => $snapToken]) }}">di sini</a> untuk melakukan pembayaran.</p>
<p>Jika Anda membutuhkan bantuan lebih lanjut, silakan hubungi kami.</p>
<p>Terima kasih.</p>
</body>
</html>

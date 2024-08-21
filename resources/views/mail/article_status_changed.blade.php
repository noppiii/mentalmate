<!DOCTYPE html>
<html>
<head>
    <title>Status Artikel Diperbarui</title>
</head>
<body>
    <h1>Status Artikel Diperbarui</h1>
    <p>Hai, {{ $article->psikolog->name }}!</p>
    <p>Artikel Anda dengan judul "<strong>{{ $article->name }}</strong>" telah diperbarui statusnya menjadi "<strong>{{ $status }}</strong>".</p>

    @if($status === 'rejected')
        <p>Maaf, artikel Anda tidak dapat kami terima pada saat ini.</p>
    @elseif($status === 'accepted')
        <p>Selamat, artikel Anda telah diterima dan akan dipublikasikan.</p>
    @endif

    <p>Terima kasih atas kontribusi Anda!</p>
</body>
</html>

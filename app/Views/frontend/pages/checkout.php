<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Success</title>
    <link rel="shortcut icon" href="/img/logo.png" type="icon">

    <style>
        img {
            margin: 0 auto;
            display: block;
            /* margin-top: 20%; */
        }
    </style>

</head>

<body>
    <a href="/">
        <img src="/img/logo.png" alt="Colorlib logo"></a>
    <h1 style="text-align:center;">Terimakasih atas kepercayaan anda kepada kami</h1>
    <p style="text-align:center;">Silahkan lakukan pembayaran dan konfirmasi pembayaran anda pada link dibawah ini: <strong>
            <br> <a href="/konfirmasi/<?= $invoice?>">Konfirmasi pembayaran</a></strong>.</p>
    <p style="text-align:center;">Untuk melihat invoice anda bisa kunjungi link di bawah ini: <strong>
            <br> <a href="/profil">Invoice</a></strong>.</p>
    <p style="text-align:center; margin-top:10px;"><strong>
            <br> <a href="/">Kembali belanja</a></strong>.</p>
    <br>
    <p style="text-align:center; color:red;"><strong>Pastikan pembayaran anda A/N CV Anugerah Abadi HTSA</strong></p>

    <p style="text-align:center;"><strong>Info kontak : 08xx-xxxx-xxxx</strong></p>
</body>

</html>
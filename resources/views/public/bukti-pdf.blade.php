<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
  body {
    font-family: sans-serif;
    color: #1a1d21;
    font-size: 12px;
    padding: 20px;
  }

  .header {
    border-bottom: 3px solid #0D6EFD;
    padding-bottom: 16px;
    margin-bottom: 24px;
  }

  .header h1 {
    font-size: 18px;
    color: #0A2E5C;
    margin: 0 0 4px;
  }

  .header p {
    margin: 0;
    color: #6c7581;
    font-size: 10px;
  }

  .title {
    text-align: center;
    margin-bottom: 24px;
  }

  .title p.label {
    color: #0D6EFD;
    font-size: 10px;
    letter-spacing: 1px;
    margin: 0 0 4px;
    text-transform: uppercase;
  }

  .title h2 {
    font-size: 16px;
    margin: 0;
  }

  table.info {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  table.info td {
    padding: 8px 0;
    vertical-align: top;
    width: 50%;
  }

  table.info .label {
    color: #6c7581;
    font-size: 10px;
    display: block;
    margin-bottom: 2px;
  }

  table.info .value {
    font-weight: bold;
    font-size: 12px;
  }

  .box-paket {
    background: #F5F8FC;
    border: 1px solid #dde2e8;
    padding: 14px;
    margin-bottom: 24px;
  }

  .box-paket .label {
    color: #6c7581;
    font-size: 10px;
    margin: 0 0 6px;
    text-transform: uppercase;
  }

  .box-paket h3 {
    font-size: 14px;
    margin: 0 0 2px;
  }

  .box-paket p {
    font-size: 10px;
    color: #6c7581;
    margin: 0;
  }

  .status {
    display: inline-block;
    background: #EAF4FF;
    color: #0D6EFD;
    padding: 3px 10px;
    font-size: 10px;
    text-transform: uppercase;
    border-radius: 3px;
  }

  .footer {
    margin-top: 40px;
    padding-top: 16px;
    border-top: 1px solid #dde2e8;
    text-align: center;
    color: #9aa4b0;
    font-size: 9px;
  }
</style>
</head>
<body>

  <div class="header">
    <h1>PT. ForIT Asta Solusindo</h1>
    <p>Cimahi, Indonesia &middot; sales@sid.net.id &middot; 0821-1900-1500</p>
  </div>

  <div class="title">
    <p class="label">Bukti Pemesanan</p>
    <h2>#{{ str_pad($pesananPaket->id, 6, '0', STR_PAD_LEFT) }}</h2>
  </div>

  <table class="info">
    <tr>
      <td>
        <span class="label">Nama Pemesan</span>
        <span class="value">{{ $pesananPaket->nama }}</span>
      </td>
      <td>
        <span class="label">Tanggal Pemesanan</span>
        <span class="value">{{ $pesananPaket->created_at->format('d F Y, H:i') }} WIB</span>
      </td>
    </tr>
    <tr>
      <td>
        <span class="label">Email</span>
        <span class="value">{{ $pesananPaket->email }}</span>
      </td>
      <td>
        <span class="label">No. Telepon</span>
        <span class="value">{{ $pesananPaket->telepon }}</span>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <span class="label">Alamat Pemasangan</span>
        <span class="value">{{ $pesananPaket->alamat }}</span>
      </td>
    </tr>
    @if ($pesananPaket->catatan)
    <tr>
      <td colspan="2">
        <span class="label">Catatan</span>
        <span class="value">{{ $pesananPaket->catatan }}</span>
      </td>
    </tr>
    @endif
  </table>

  <div class="box-paket">
    <p class="label">Paket yang Dipesan</p>
    <h3>{{ $pesananPaket->paket->nama_paket }}</h3>
    <p>{{ $pesananPaket->paket->layanan->nama ?? '-' }} &middot; {{ $pesananPaket->paket->kecepatan }} &middot; {{ $pesananPaket->paket->tipe }}</p>
  </div>

  <p>
    <span class="label" style="display:inline;">Status: </span>
    <span class="status">{{ $pesananPaket->status }}</span>
  </p>

  <div class="footer">
    Dokumen ini dibuat otomatis oleh sistem.<br>
    Dicetak pada {{ now()->format('d F Y, H:i') }} WIB
  </div>

</body>
</html>
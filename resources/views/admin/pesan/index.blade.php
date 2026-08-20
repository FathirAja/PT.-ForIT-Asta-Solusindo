@extends('layouts.admin')

@section('page-title', 'Pesan Masuk')

@section('content')
<div class="page-header">
  <div>
    <h5>Pesan Masuk</h5>
    <p>Pesan yang dikirim pengunjung melalui form Kontak.</p>
  </div>
</div>

<div class="admin-panel">
  @if ($pesan->count() > 0)
  <table class="admin-table">
    <thead>
      <tr>
        <th>Pengirim</th>
        <th>Subjek</th>
        <th>Pesan</th>
        <th>Tanggal</th>
        <th class="text-end">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pesan as $item)
      <tr>
        <td>
          <p class="cell-title">{{ $item->nama }}</p>
          <p class="cell-sub">{{ $item->email }}</p>
        </td>
        <td class="fw-medium">{{ $item->subjek }}</td>
        <td class="text-muted">{{ Str::limit($item->pesan, 50) }}</td>
        <td class="text-muted">{{ $item->created_at->format('d M Y, H:i') }}</td>
        <td class="text-end">
          <form action="{{ route('admin.pesan.destroy', $item) }}" method="POST" class="form-hapus d-inline">
            @csrf @method('DELETE')
            <button type="submit" class="action-btn danger"><i class="fa-solid fa-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <div class="empty-state">
    <i class="fa-solid fa-envelope"></i>
    <p>Belum ada pesan masuk.</p>
  </div>
  @endif
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.form-hapus').forEach(form => {
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const currentForm = this;
    Swal.fire({title:'Hapus pesan ini?', icon:'warning', showCancelButton:true, confirmButtonText:'Ya, hapus', confirmButtonColor:'#0D6EFD'})
    .then(res => { if (res.isConfirmed) currentForm.submit(); });
  });
});
</script>
@endpush
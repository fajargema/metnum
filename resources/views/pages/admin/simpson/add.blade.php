<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Tambah Pengurus</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.user.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="a">a*</label>
                        <input type="text" class="form-control" name="a" value="{{ old('a') }}">
                    </div>

                    <div class="form-group">
                        <label for="b">b*</label>
                        <input type="text" class="form-control" name="b" value="{{ old('b') }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-secondary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

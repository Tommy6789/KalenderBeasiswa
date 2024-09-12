<!-- Add Calendar Modal -->
<div class="modal fade" id="TambahKalenderBeasiswa" tabindex="-1" aria-labelledby="TambahKalenderBeasiswaLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="TambahKalenderBeasiswaLabel">Kalender Beasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('kalenderBeasiswa.store') }}" method="post">
        @csrf
        <div class="form-group">
            <h1>Kategori</h1>

            <!-- Negara Select -->
            <div>
            <label for="option_negara">Negara</label>
            <select class="form-control" name="id_negara[]" id="option_negara" multiple required>
                @foreach ($negara as $i)
                <option value="{{ $i->id }}">{{ $i->nama }}</option>
                @endforeach
            </select>
            </div>

            <!-- Tingkat Studi Select -->
            <div>
            <label for="option_tingkat_studi">Tingkat Studi</label>
            <select class="form-control" name="id_tingkat_studi[]" id="option_tingkat_studi" multiple required>
                @foreach ($tingkatStudi as $i)
                <option value="{{ $i->id }}">{{ $i->nama }}</option>
                @endforeach
            </select>
            </div>

            <br>
            <h1>Tentang</h1>

            <!-- Form Fields -->
            <label for="tanggal_registrasi">Tanggal Registrasi</label>
            <input type="date" class="form-control" name="tanggal_registrasi" required>

            <label for="deadline">Deadline</label>
            <input type="date" class="form-control" name="deadline" required>

            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" required>

            <label for="nama">Nama Universitas</label>
            <input type="text" class="form-control" name="nama" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" cols="15" rows="10" required></textarea>

            <label for="jurusan">Jurusan</label>
            <input type="text" class="form-control" name="jurusan" required>

            <label for="jenis_beasiswa">Jenis Beasiswa</label>
            <select name="jenis_beasiswa" class="form-control" required>
            <option value="">Pilih Jenis Beasiswa</option>
            <option value="full">Full</option>
            <option value="partial">Partial</option>
            </select>

            <br>
            <h1>Keuntungan</h1>
            <label for="keuntungan">Keuntungan</label>
            <textarea name="keuntungan" class="form-control" cols="15" rows="10" required></textarea>

            <br>
            <h1>Persyaratan</h1>

            <!-- Persyaratan Fields -->
            <label for="umur">Umur</label>
            <input type="text" class="form-control" name="umur" required>

            <label for="gpa">GPA</label>
            <input type="text" class="form-control" name="gpa" required>

            <label for="tes_english">Tes English</label>
            <input type="text" class="form-control" name="tes_english" required>

            <label for="tes_bahasa_lain">Tes Bahasa Lain</label>
            <input type="text" class="form-control" name="tes_bahasa_lain" required>

            <label for="tes_standard">Tes Standard</label>
            <input type="text" class="form-control" name="tes_standard" required>

            <label for="dokumen">Dokumen</label>
            <input type="text" class="form-control" name="dokumen" required>

            <label for="lainnya">Lainnya</label>
            <input type="text" class="form-control" name="lainnya" required>

            <label for="status_tampil">Status Tampil</label>
            <select name="status_tampil" class="form-control" required>
            <option value="">Pilih Status Tampil</option>
            <option value="1">Tampil</option>
            <option value="0">Tidak Tampil</option>
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

        <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
        <script>
            new MultiSelectTag('option_negara'); // id
            new MultiSelectTag('option_tingkat_studi'); // id
        </script>
        </form>
    </div>
    </div>
</div>
</div>

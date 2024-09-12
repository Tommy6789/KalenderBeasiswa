<!-- Edit Calendar Modal -->
<div class="modal fade" id="EditKalenderBeasiswa" tabindex="-1" aria-labelledby="EditKalenderBeasiswaLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditKalenderBeasiswaLabel">Edit Kalender Beasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kalenderBeasiswa.update', ['id' => $kalenderBeasiswa->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <h1>Kategori</h1>

                        <!-- Negara Select -->
                        <div>
                            <label for="edit_option_negara">Negara</label>
                            <select class="form-control" name="id_negara[]" id="edit_option_negara" multiple required>
                                @foreach ($negara as $i)
                                    <option value="{{ $i->id }}"
                                        {{ in_array($i->id, $kalenderBeasiswa->negara_ids) ? 'selected' : '' }}>
                                        {{ $i->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tingkat Studi Select -->
                        <div>
                            <label for="edit_option_tingkat_studi">Tingkat Studi</label>
                            <select class="form-control" name="id_tingkat_studi[]" id="edit_option_tingkat_studi"
                                multiple required>
                                @foreach ($tingkatStudi as $i)
                                    <option value="{{ $i->id }}"
                                        {{ in_array($i->id, $kalenderBeasiswa->tingkat_studi_ids) ? 'selected' : '' }}>
                                        {{ $i->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <br>
                        <h1>Tentang</h1>

                        <!-- Form Fields -->
                        <label for="edit_tanggal_registrasi">Tanggal Registrasi</label>
                        <input type="date" class="form-control" name="tanggal_registrasi"
                            value="{{ $kalenderBeasiswa->tanggal_registrasi }}" required>

                        <label for="edit_deadline">Deadline</label>
                        <input type="date" class="form-control" name="deadline"
                            value="{{ $kalenderBeasiswa->deadline }}" required>

                        <label for="edit_judul">Judul</label>
                        <input type="text" class="form-control" name="judul" value="{{ $kalenderBeasiswa->judul }}"
                            required>

                        <label for="edit_nama">Nama Universitas</label>
                        <input type="text" class="form-control" name="nama" value="{{ $kalenderBeasiswa->nama }}"
                            required>

                        <label for="edit_deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" cols="15" rows="10" required>{{ $kalenderBeasiswa->deskripsi }}</textarea>

                        <label for="edit_jurusan">Jurusan</label>
                        <input type="text" class="form-control" name="jurusan"
                            value="{{ $kalenderBeasiswa->jurusan }}" required>

                        <label for="edit_jenis_beasiswa">Jenis Beasiswa</label>
                        <select name="jenis_beasiswa" class="form-control" required>
                            <option value="">Pilih Jenis Beasiswa</option>
                            <option value="full" {{ $kalenderBeasiswa->jenis_beasiswa == 'full' ? 'selected' : '' }}>
                                Full</option>
                            <option value="partial"
                                {{ $kalenderBeasiswa->jenis_beasiswa == 'partial' ? 'selected' : '' }}>Partial</option>
                        </select>

                        <br>
                        <h1>Keuntungan</h1>
                        <label for="edit_keuntungan">Keuntungan</label>
                        <textarea name="keuntungan" class="form-control" cols="15" rows="10" required>{{ $kalenderBeasiswa->keuntungan }}</textarea>

                        <br>
                        <h1>Persyaratan</h1>

                        <!-- Persyaratan Fields -->
                        <label for="edit_umur">Umur</label>
                        <input type="text" class="form-control" name="umur" value="{{ $kalenderBeasiswa->umur }}"
                            required>

                        <label for="edit_gpa">GPA</label>
                        <input type="text" class="form-control" name="gpa" value="{{ $kalenderBeasiswa->gpa }}"
                            required>

                        <label for="edit_tes_english">Tes English</label>
                        <input type="text" class="form-control" name="tes_english"
                            value="{{ $kalenderBeasiswa->tes_english }}" required>

                        <label for="edit_tes_bahasa_lain">Tes Bahasa Lain</label>
                        <input type="text" class="form-control" name="tes_bahasa_lain"
                            value="{{ $kalenderBeasiswa->tes_bahasa_lain }}" required>

                        <label for="edit_tes_standard">Tes Standard</label>
                        <input type="text" class="form-control" name="tes_standard"
                            value="{{ $kalenderBeasiswa->tes_standard }}" required>

                        <label for="edit_dokumen">Dokumen</label>
                        <input type="text" class="form-control" name="dokumen"
                            value="{{ $kalenderBeasiswa->dokumen }}" required>

                        <label for="edit_lainnya">Lainnya</label>
                        <input type="text" class="form-control" name="lainnya"
                            value="{{ $kalenderBeasiswa->lainnya }}" required>

                        <label for="edit_status_tampil">Status Tampil</label>
                        <select name="status_tampil" class="form-control" required>
                            <option value="">Pilih Status Tampil</option>
                            <option value="1" {{ $kalenderBeasiswa->status_tampil == '1' ? 'selected' : '' }}>
                                Tampil</option>
                            <option value="0" {{ $kalenderBeasiswa->status_tampil == '0' ? 'selected' : '' }}>
                                Tidak Tampil</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
                    <script>
                        new MultiSelectTag('edit_option_negara'); // id
                        new MultiSelectTag('edit_option_tingkat_studi'); // id
                    </script>
                </form>
            </div>
        </div>
    </div>
</div>

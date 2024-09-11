<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ktingkat_studi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id_kalender_beasiswa', 'id_tingkat_studi'];

    protected $table = 'ktingkat_studis'; // Ensure the correct table name is specified

    public function kalenderBeasiswa()
    {
        return $this->belongsTo(kalenderBeasiswa::class, 'id_kbeasiswa', 'id');
    }

    public function tingkatStudi()
    {
        return $this->belongsTo(tingkatStudi::class, 'id_tingkat_studi', 'id')->withTrashed(); // Include soft deleted tingkatStudi
    }

}
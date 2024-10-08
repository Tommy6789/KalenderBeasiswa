<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class knegara extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id_kbeasiswa', 'id_negara'];
    protected $table = 'knegaras'; // Ensure the correct table name is specified

    // Define relationship with kalenderBeasiswa
    public function kalenderBeasiswa()
    {
        return $this->belongsTo(kalenderBeasiswa::class, 'id_kbeasiswa', 'id');
    }

    // Define relationship with Negara (countries)
    public function negara()
    {
        return $this->belongsTo(Negara::class, 'id_negara', 'id')->withTrashed(); // Include soft deleted Negara
    }
}
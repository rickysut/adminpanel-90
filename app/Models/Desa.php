<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desa extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'desas';

    public static $searchable = [
        'kd_desa',
        'nm_desa',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kd_kec_id',
        'kd_desa',
        'nm_desa',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kd_kec()
    {
        return $this->belongsTo(Kecamatan::class, 'kd_kec_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

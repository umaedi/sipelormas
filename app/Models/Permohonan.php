<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permohonan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'no_skt',
        'lampiran1',
        'lampiran2',
        'lampiran3',
        'lampiran4',
        'lampiran5',
        'lampiran6',
        'lampiran7',
        'lampiran8',
        'lampiran9',
        'lampiran10',
        'lampiran11',
        'lampiran12',
        'lampiran13',
        'lampiran14',
        'lampiran15',
        'lampiran16',
        'lampiran17',
        'lampiran18',
        'lampiran19',
        'lampiran20',
        'lampiran21',
        'status',
        'skt',
        'pesan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function booted()
    {
        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }
}

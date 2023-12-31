<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hibah extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jumlah_hibah',
        'lampiran1',
        'lampiran2',
        'lampiran3',
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

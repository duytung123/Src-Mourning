<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;
    protected $table = 'm_classifications';
    protected $fillable =
        [
            'classification',
            'sort',
            'deleted_at',
            'created_at',
            'updated_at'
        ];
    public function list()
    {
        return $this->belongsTo(Classification::class)->withDefault();
    }
}

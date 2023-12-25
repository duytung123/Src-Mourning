<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'm_statuses';
    protected $fillable =
        [
            'status',
            'sort',
            'deleted_at',
            'created_at',
            'updated_at'
        ];
    public function list()
    {
        return $this->belongsTo(Status::class)->withDefault();
    }
}

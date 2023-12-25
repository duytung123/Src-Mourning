<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'm_companies';
    protected $fillable =
        [
            'company',
            'sort',
            'deleted_at',
            'created_at',
            'updated_at'
        ];
    public function list()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }
}

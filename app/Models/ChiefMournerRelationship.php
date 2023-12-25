<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiefMournerRelationship extends Model
{
    use HasFactory;
    protected $table = 'm_chief_mourner_relationships';
    protected $fillable =
        [
            'relationship',
            'sort',
            'deleted_at',
            'created_at',
            'updated_at'
        ];
    public function list()
    {
        return $this->belongsTo(ChiefMournerRelationship::class)->withDefault();
    }
}

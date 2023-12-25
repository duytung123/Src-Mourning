<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassedAwayRelationship extends Model
{
    use HasFactory;
    protected $table = 'm_passed_away_relationships';
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
        return $this->belongsTo(PassedAwayRelationship::class)->withDefault();
    }
}

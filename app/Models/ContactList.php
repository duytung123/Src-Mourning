<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactList extends Model
{
    use HasFactory;
    protected $table = 'm_contact_info';
    protected $casts = [
        'related_name' => 'encrypted',
        'related_kana' => 'encrypted',
    ];
    protected $fillable = [
        'id', 'related_employee_no','membership_year', 'related_name', 'related_kana', 'reception_datetime', 'company', 'member1', 'member2'
        ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    use HasFactory;
    protected $table = 'm_contact_info';
    protected $casts = [
        'entrant_name' => 'encrypted',
        'entrant_kana' => 'encrypted',
        'related_name' => 'encrypted',
        'related_kana' => 'encrypted',
        'passed_away_name' => 'encrypted',
        'passed_away_kana' => 'encrypted',
        'inlaws_employee_no' => 'encrypted',
        'inlaws_name' => 'encrypted',
        'inlaws_kana' => 'encrypted',
        'wake_attendees1' => 'encrypted',
        'wake_attendees2' => 'encrypted',
        'wake_attendees3' => 'encrypted',
        'wake_attendees' => 'encrypted',
        'funeral_attendees1' => 'encrypted',
        'funeral_attendees2' => 'encrypted',
        'funeral_attendees3' => 'encrypted',
        'funeral_attendees' => 'encrypted',
        'chief_mourner_name' => 'encrypted',
        'chief_mourner_kana' => 'encrypted',
        'remarks' => 'encrypted',
        'superior_employee_no' => 'encrypted',
        'superior_name' => 'encrypted',
        'superior_kana' => 'encrypted',
        'general_affairs_name' => 'encrypted',
        'general_affairs_kana' => 'encrypted',
        'general_affairs_contact_info' => 'encrypted',
        'supervisor_employee_no' => 'encrypted',
        'supervisor_name' => 'encrypted',
        'supervisor_kana' => 'encrypted',
        'branch_chief_employee_no' => 'encrypted',
        'branch_chief_name' => 'encrypted',
        'branch_chief_kana' => 'encrypted',
        'password' => 'encrypted',
    ];
    protected $fillable = [
        'id', 'related_employee_no', 'related_name', 'related_kana', 'reception_datetime', 'company', 'member1', 'member2',
        'passed_away_name', 'passed_away_kana', 'passed_away_relationship', 'passed_away_date',
        'wake', 'wake_date', 'wake_time_start','wake_time_end', 'wake_ceremony','wake_ceremony_zip', 'wake_ceremony_addr1', 'wake_ceremony_addr2', 'wake_ceremony_tel', 'wake_ceremony_url', 'wake_ceremony_access',
        'funeral', 'funeral_date', 'funeral_time_start','funeral_time_end', 'funeral_same_ceremony', 'funeral_ceremony','funeral_ceremony_zip', 'funeral_ceremony_addr1', 'funeral_ceremony_addr2', 'funeral_ceremony_tel', 'funeral_ceremony_url', 'funeral_ceremony_access',
    ];
}

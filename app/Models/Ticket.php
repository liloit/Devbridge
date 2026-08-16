<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function user() { return $this->belongsTo(User::class); }
    public function documents() { return $this->hasMany(Document::class); }
    public function logs() { return $this->hasMany(TicketLog::class); }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shared_Archive extends Model
{
    use HasFactory;

    public function archiveID()
    {
        return $this->belongsTo(Archive::class);
    }

    public function sharedID()
    {
        return $this->belongsTo(User::class);
    }
}

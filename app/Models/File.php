<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    protected $fillable = [
        'name',
        'file_path',
        'petition_id'
    ];

    public function petition(){
        return $this->belongsTo(Petition::class);
    }
}

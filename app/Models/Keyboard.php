<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keyboard extends Model
{
    protected $table = 'keyboard';
    protected $primaryKey = 'keyboard_id';
    public $timestamps = false;

    protected $fillable = [
        'keyboard_id',
        'name'
    ];
    protected $casts = [
        'key_id' => 'int',
        'name' => 'string'
    ];
    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }
    
}
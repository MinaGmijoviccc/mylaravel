<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PC extends Model
{
    protected $table = 'pc';
    protected $primaryKey = 'pc_id';
    public $timestamps = false;

    protected $fillable = [
        'pc_id',
        'name'
    ];
    protected $casts = [
        'pc_id' => 'int',
        'name' => 'string'
    ];
    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }
    
}

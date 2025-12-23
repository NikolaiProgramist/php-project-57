<?php

namespace App\Models;

use DDZobov\PivotSoftDeletes\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Label extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class)->withTimestamps()->withSoftDeletes();
    }
}

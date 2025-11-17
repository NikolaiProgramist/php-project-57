<?php

namespace App\Models;

use DDZobov\PivotSoftDeletes\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property User $createdBy
 */
class Task extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'status_id', 'assigned_to_id'];

    public function status(): BelongsTo
    {
        return $this->belongsTo(TaskStatus::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function labels(): BelongsToMany
    {
        return $this->belongsToMany(Label::class)->withTimestamps()->withSoftDeletes();
    }
}

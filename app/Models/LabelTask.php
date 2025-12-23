<?php

namespace App\Models;

use DDZobov\PivotSoftDeletes\Model;
use DDZobov\PivotSoftDeletes\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class LabelTask extends Pivot
{
    public static function forceDeleteByTask(int|Model $task): void
    {
        $id = $task->id ?? $task;

        DB::table('label_task')->where('task_id', $id)->delete();
    }

    public static function forceDeleteByLabel(int|Model $label): void
    {
        $id = $label->id ?? $label;

        DB::table('label_task')->where('label_id', $id)->delete();
    }
}

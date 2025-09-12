<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\Models\TaskStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        Gate::check('view-any', TaskStatus::class);
        $taskStatuses = TaskStatus::paginate(3);

        return view('task_status.index', compact('taskStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        Gate::authorize('create', TaskStatus::class);

        return view('task_status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskStatusRequest $request): RedirectResponse
    {
        Gate::authorize('create', TaskStatus::class);
        TaskStatus::create($request->all());

        return redirect(route('task_statuses.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $taskStatus): View
    {
        Gate::authorize('update', $taskStatus);

        return view('task_status.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus): RedirectResponse
    {
        Gate::authorize('update', $taskStatus);
        $taskStatus->update($request->all());

        return redirect(route('task_statuses.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        Gate::authorize('delete', $taskStatus);
        $taskStatus->delete();

        return redirect(route('task_statuses.index'));
    }
}

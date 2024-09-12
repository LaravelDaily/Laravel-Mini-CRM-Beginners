<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::with(['user', 'client'])->paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function create(): View
    {
        $users = User::select(['id', 'first_name', 'last_name'])->get();
        $clients = Client::select(['id', 'company_name'])->get();

        return view('projects.create', compact('users', 'clients'));
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        Project::create($request->validated());

        return redirect()->route('projects.index');
    }

    public function edit(Project $project): View
    {
        $users = User::select(['id', 'first_name', 'last_name'])->get();
        $clients = Client::select(['id', 'company_name'])->get();

        return view('projects.edit', compact('project', 'users', 'clients'));
    }

    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->validated());

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project): RedirectResponse
    {
        Gate::authorize(PermissionEnum::DELETE_PROJECTS->value);

        $project->delete();

        return redirect()->route('projects.index');
    }
}

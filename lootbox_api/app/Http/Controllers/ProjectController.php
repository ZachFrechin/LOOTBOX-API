<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\CreateRequest;
use App\Http\Requests\Project\UpdateRequest;
use App\Http\Services\ProjectService;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\JsonResponse;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(Request $request): JsonResponse
    {
        $projects = $this->projectService->all($request->user());
        return response()->json(["projects" => ProjectResource::collection($projects)], 200);
    }

    public function create(CreateRequest $request): JsonResponse
    {
        $project = $this->projectService->create(array_merge($request->all(), ['user_id' => $request->user()->id]));
        return response()->json(["project" => new ProjectResource($project)], 201);
    }
    public function show(Project $project): JsonResponse
    {
        return response()->json(["project" => new ProjectResource($project)], 200);
    }

    public function update(UpdateRequest $request, Project $project): JsonResponse
    {
        $project = $this->projectService->update($project, $request->all());
        return response()->json(["project" => new ProjectResource($project)], 200);
    }

    public function destroy(Project $project): JsonResponse
    {
        $this->projectService->delete($project);
        return response()->json(["message" => "Project deleted successfully"], 200);
    }
}

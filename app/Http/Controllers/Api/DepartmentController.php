<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Services\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $service;

    public function __construct(DepartmentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return DepartmentResource::collection($this->service->getAllDepartments());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:45|unique:departments,name',
            'parent_id' => 'nullable|exists:departments,id',
            'ambassador_name' => 'nullable|string|max:100',
        ]);

        return response()->json($this->service->createDepartment($validatedData), 201);
    }

    public function show($department)
    {
        return new DepartmentResource($this->service->getDepartmentById($department));
    }

    public function update(Request $request, $department)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:45|unique:departments,name,' . $department,
            'parent_id' => 'nullable|exists:departments,id',
            'ambassador_name' => 'nullable|string|max:100',
        ]);

        return response()->json($this->service->updateDepartment($department, $validated));
    }

    public function destroy($department)
    {
        $this->service->deleteDepartment($department);
        return response()->json(['message' => 'Department deleted successfully']);
    }

    public function getSubDepartments($id)
    {
        return response()->json($this->service->getSubDepartments($id));
    }
}

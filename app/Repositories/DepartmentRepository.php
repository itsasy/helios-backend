<?php

namespace App\Repositories;

use App\Models\Department;

class DepartmentRepository
{
    public function getAll()
    {
        return Department::all();
    }

    public function findById(int $id)
    {
        return Department::findOrFail($id);
    }

    public function create(array $data)
    {
        return Department::create($data);
    }

    public function update(int $id, array $data)
    {
        $department = $this->findById($id);
        $department->update($data);
        return $department;
    }

    public function delete(int $id)
    {
        $department = $this->findById($id);
        return $department->delete();
    }

    public function getSubDepartments(int $id)
    {
        return Department::where('parent_id', $id)->get();
    }
}

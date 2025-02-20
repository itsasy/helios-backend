<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService
{
    protected $repository;

    public function __construct(DepartmentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllDepartments()
    {
        return $this->repository->getAll();
    }

    public function getDepartmentById(int $id)
    {
        return $this->repository->findById($id);
    }

    public function createDepartment(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateDepartment(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteDepartment(int $id)
    {
        return $this->repository->delete($id);
    }

    public function getSubDepartments(int $id)
    {
        return $this->repository->getSubDepartments($id);
    }
}

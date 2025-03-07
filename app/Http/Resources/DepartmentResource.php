<?php

namespace App\Http\Resources;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Department */
class DepartmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'level' => $this->level,
            'employees_count' => $this->employees_count,
            'ambassador_name' => $this->ambassador_name,

            'parent_id' => $this->parent_id,
            'parent_name' => $this->parent?->name,

            'subDepartments' => DepartmentResource::collection($this->whenLoaded('subDepartments')),
            'subDepartments_count' => $this->subdepartments()->count()
        ];
    }
}

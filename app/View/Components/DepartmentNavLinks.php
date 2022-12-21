<?php

namespace App\View\Components;

use App\Models\Rv\Department;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class DepartmentNavLinks extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getDepartmentsProperty(): Collection|array
    {
        $deps = Cache::remember('departments', 60, function () {
            return Department::where('parent_id', null)
                ->select('id', 'name')
                ->orderBy('name', 'asc')
                ->get()
                ->pluck('id', 'name')
                ->toArray();
        });
        return $deps;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.department-nav-links', [
            'departments' => $this->getDepartmentsProperty(),
        ]);
    }
}

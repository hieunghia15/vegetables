<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionSearching extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $permission;

    public function render()
    {
        $this->permission = Permission::where('name', 'LIKE', '%' . ($this->search) . '%')
            ->paginate(10);

        $links = $this->permission;
        $this->permission = collect($this->permission->items());
        return view('livewire.permission-searching', [
            'permission' => compact($this->permission),
            'links' => $links
        ]);
    }
}
<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserSearching extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $user;

    public function render()
    {
        $this->user = User::with('roles')
            ->where('name', 'LIKE', '%' . ($this->search) . '%')
            ->orWhere('phone', 'LIKE', '%' . ($this->search) . '%')
            ->paginate(10);

        $links = $this->user;
        $this->user = collect($this->user->items());
        return view('livewire.user-searching', [
            'user' => compact($this->user),
            'links' => $links
        ]);
    }
}
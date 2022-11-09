<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class FarmerSearching extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $farmer;

    public function render()
    {
        $this->farmer = User::join('farmers', 'farmers.user_id', '=', 'users.id')
            ->where('users.authentication', '=', 'Xác nhận')
            ->orWhere('users.name', 'LIKE', '%' . ($this->search) . '%')
            ->select(['users.*'])
            ->paginate(10);

        $links = $this->farmer;
        $this->farmer = collect($this->farmer->items());
        return view('livewire.farmer-searching', [
            'farmer' => compact($this->farmer),
            'links' => $links
        ]);
    }
}
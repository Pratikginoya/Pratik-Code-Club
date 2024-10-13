<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Technology;
use App\Models\CodeDetails;

class Dashboard extends Component
{
    public $technologyCount;
    public $codeCount;

    public function mount()
    {
        $this->technologyCount = Technology::where('user_id',auth()->id())->active()->count();
        $this->codeCount = CodeDetails::where('user_id',auth()->id())->active()->count();
    }

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
}

<?php

namespace App\Livewire;

use App\Models\CodeDetails;
use Livewire\Component;

class ViewDetailCode extends Component
{
    protected $clickedCodeDetails;

    public function render()
    {
        $code_id = request()->route('id');

        $id = decrypt($code_id);

        $this->clickedCodeDetails = CodeDetails::find($id);

        return view('livewire.view-detail-code', ['clickedCodeDetails'=>$this->clickedCodeDetails])->layout('layouts.app');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Technology;
use Illuminate\Support\Facades\Blade;

class TechnologyView extends Component
{
    public $technologyData;
    protected $listeners = ['technologyAdded' => 'refreshTechnologyData'];

    public function render()
    {
        $this->technologyData = Technology::where('user_id',auth()->id())->get();
        return view('livewire.technology-view',['technologyData',$this->technologyData]);
    }

    public function delete($id)
    {
        $techDelete = Technology::findOrFail($id);

        if($techDelete) {
            $techDelete->delete();
            session()->flash('success','Technology has been deleted succesfully.');
        }
    }

    public function edit($id)
    {
        $this->dispatch('getEditDetailsOnCreate',$id);
    }

    public function updateStatus($techId, $status)
    {
        $tech = Technology::find($techId);
        if ($tech) {
            $tech->status = !$status;
            $tech->save();
            session()->flash('success','Technology status has been changed succesfully.');
            $this->refreshTechnologyData();
        }
    }

    public function refreshTechnologyData()
    {
        $this->technologyData = Technology::where('user_id',auth()->id())->get();
        $this->dispatch('reloadAllScripts');
    }
    
}

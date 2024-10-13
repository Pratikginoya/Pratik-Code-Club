<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Technology;

class TechnologyCreate extends Component
{
    public $tech_name = "";
    public $status = true;
    public $techEditId = null;

    protected $listeners = ['getEditDetailsOnCreate' => 'loadEditData'];

    public function render()
    {
        return view('livewire.technology-create');
    }

    public function loadEditData($id)
    {
        $getTech = Technology::find($id);
        $this->tech_name = $getTech->tech_name;
        $this->status = $getTech->status == 1 ? true : false;
        $this->techEditId = $getTech->id;
    }

    public function tech_submit()
    {
        $this->validate([
            'tech_name' => 'required|string|min:2|max:50',
        ]);

        if ($this->techEditId == null){
            $createTech = new Technology;
            $createTech->tech_name = $this->tech_name;
            $createTech->status = $this->status ? true : false;
            $createTech->user_id = auth()->id();
            $createTech->save();
    
            session()->flash('success','New technology added sucessfully.');
        } else {
            $createTech = Technology::find($this->techEditId);
            $createTech->tech_name = $this->tech_name;
            $createTech->status = $this->status ? true : false;
            $createTech->user_id = auth()->id();
            $createTech->save();

            session()->flash('success','New technology updated sucessfully.');
        }

        $this->resetFormData();
        $this->dispatch('technologyAdded');
    }

    public function resetFormData()
    {
        $this->tech_name = "";
        $this->status = true;
        $this->techEditId = null;
    }
}

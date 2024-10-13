<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CodeDetails;
use Illuminate\Support\Facades\Crypt;

class ManageYourCode extends Component
{
    use WithPagination;
    public $CodeDetails = [];

    public function render()
    {
        $this->CodeDetails = CodeDetails::with('technology')->where('user_id',auth()->id())->get();
        return view('livewire.manage-your-code', ['CodeDetails' => $this->CodeDetails])->layout('layouts.app');
    }

    public function updateCodeStatus($id, $current_status)
    {
        $codeDetails = CodeDetails::find($id);
        if($codeDetails){
            $codeDetails->status = !$current_status;
            $codeDetails->save();

            session()->flash('success','Code status has been updated successfully');
        }
    }

    public function edit($id)
    {
        $id = encrypt($id);
        return $this->redirect('/code/store/'.$id, navigate:true);
    }

    public function delete($id)
    {
        $codeDetailsDelete = CodeDetails::find($id);
        if($codeDetailsDelete){
            $codeDetailsDelete->delete();

            session()->flash('success','Code has been deleted successfully');
        }
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CodeDetails;

class SearchYourCode extends Component
{
    use WithPagination;
    public $CodeDetails = [];
    public $search_code = "";
    public $clickedCodeDetails;
    public $isOpen = false;

    public function mount()
    {
        $this->CodeDetails = CodeDetails::with('technology')->where('user_id',auth()->id())->active()->get();
    }

    public function render()
    {
        return view('livewire.search-your-code')->layout('layouts.app');
    }

    public function searchCodeField()
    {
        $this->CodeDetails = CodeDetails::with('technology')
            ->where(function($query) {
                $query->where('code_name','like',"%{$this->search_code}%")
                    ->orWhere('code_desc','like',"%{$this->search_code}%")
                    ->orWhere('code_detail','like',"%{$this->search_code}%")
                    ->orWhere('code_keyword','like',"%{$this->search_code}%");
            })
            ->where('user_id',auth()->id())
            ->active()
            ->get();
    }

    // public function appendDataOnModel($id)
    // {
    //     $this->clickedCodeDetails = CodeDetails::find($id);

    //     return view('livewire.view-detail-code')->layout('layouts.app');
    //     // open model
    //     // $this->isOpen = true;
    // }

    public function detailCode($id)
    {
        $id = encrypt($id);
        return $this->redirect('/code/detail/'.$id, navigate:true);
    }

    // close model
    public function closeModal()
    {
        $this->isOpen = false;
    }

    // public function viewMoreCodeDetails($id)
    // {
    //     $id = encrypt($id);
    //     return redirect('/code/'.$id, navigate:true);
    // }
}

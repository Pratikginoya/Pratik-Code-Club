<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CodeDetails;

class SearchYourCode extends Component
{
    use WithPagination;
    // public $CodeDetails = [];
    public $search_code = "";
    public $clickedCodeDetails;
    public $isOpen = false;
    public $isSearch = false;

    public function render()
    {
        $query = CodeDetails::with('technology')
            ->where('user_id', auth()->id());

        if ($this->isSearch) {
            $query->where(function($query) {
                $query->where('code_name', 'like', "%{$this->search_code}%")
                    ->orWhere('code_desc', 'like', "%{$this->search_code}%")
                    ->orWhere('code_detail', 'like', "%{$this->search_code}%")
                    ->orWhere('code_keyword', 'like', "%{$this->search_code}%");
            });
        }

        // Fetch paginated results here
        $CodeDetails = $query->active()->paginate(10);

        return view('livewire.search-your-code', [
            'CodeDetails' => $CodeDetails
        ])->layout('layouts.app');
    }

    public function searchCodeField()
    {
        $this->isSearch = true;
    }

    public function detailCode($id)
    {
        $id = encrypt($id);
        return $this->redirect('/code/detail/'.$id, navigate:true);
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Technology;
use App\Models\CodeDetails;
use Illuminate\Support\Facades\Crypt;

class StoreYourCode extends Component
{
    public $techName = [];
    public $tech_id = '';
    public $code_name = '';
    public $code_desc = '';
    public $code_detail = '';
    public $code_keyword = '';
    public $final_keywords = [];
    public $status = true;
    public $edit_code_details_id = null;

    // protected $listeners = ['editCodeDetails' => 'loadEditCodeDetails'];

    public function render()
    {
        $edit_id = request()->route('id');
        
        if($edit_id != null){
            $edit_id = decrypt($edit_id);
            $loadEditCodeDetails = CodeDetails::find($edit_id);
            if($loadEditCodeDetails){
                $this->tech_id = $loadEditCodeDetails->tech_id;
                $this->code_name = $loadEditCodeDetails->code_name;
                $this->code_desc = $loadEditCodeDetails->code_desc;
                $this->code_detail = $loadEditCodeDetails->code_detail;
                $this->final_keywords = explode(' | ',$loadEditCodeDetails->code_keyword);
                $this->status = $loadEditCodeDetails->status == 1 ? true : false;
                $this->edit_code_details_id = $loadEditCodeDetails->id;
            } 
        }

        $this->techName = Technology::where('user_id',auth()->id())->active()->get();
        return view('livewire.store-your-code', ['techName' => $this->techName])->layout('layouts.app');
    }

    public function code_submit()
    {
        if($this->edit_code_details_id == null){
            $this->validate([
                'tech_id' => 'required',
                'code_name' => 'required|min:2|max:200',
                'code_desc' => 'nullable|min:2|max:400',
                'code_detail' => 'required',
                'code_keyword' => 'nullable',
            ]);
    
            $code_details = new CodeDetails;
            $code_details->tech_id = $this->tech_id;
            $code_details->code_name = $this->code_name;
            $code_details->code_desc = $this->code_desc;
            $code_details->code_detail = $this->code_detail;
            $code_details->code_keyword = implode(' | ', $this->final_keywords);
            $code_details->status = $this->status ? true : false;
            $code_details->user_id = auth()->id();
            $code_details->save();
    
            session()->flash('success', 'Your code has been added successfully.');
        } else {
            $this->validate([
                'tech_id' => 'required',
                'code_name' => 'required|min:2|max:200',
                'code_desc' => 'nullable|min:2|max:400',
                'code_detail' => 'required',
                'code_keyword' => 'nullable',
            ]);
    
            $code_details = CodeDetails::find($this->edit_code_details_id);
            $code_details->tech_id = $this->tech_id;
            $code_details->code_name = $this->code_name;
            $code_details->code_desc = $this->code_desc;
            $code_details->code_detail = $this->code_detail;
            $code_details->code_keyword = implode(' | ', $this->final_keywords);
            $code_details->status = $this->status ? true : false;
            $code_details->user_id = auth()->id();
            $code_details->save();
    
            session()->flash('success', 'Your code has been updated successfully.');
        }
        $this->reset('tech_id', 'code_name', 'code_desc', 'code_detail', 'code_keyword', 'status', 'final_keywords','edit_code_details_id');
    }

    public function add_keyword()
    {
        $this->final_keywords[] = $this->code_keyword;
        $this->code_keyword = '';
    }

    public function remove_this_keyword($keyword)
    {
        // below array_diff is used to remove the value from existing array
        $this->final_keywords = array_diff($this->final_keywords, [$keyword]);

        // below array_values function is to re-indexing the existing array after remove the above keyword
        $this->final_keywords = array_values($this->final_keywords);
    }
}

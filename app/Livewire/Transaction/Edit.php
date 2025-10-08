<?php

namespace App\Livewire\Transaction;

use App\Models\Category;
use App\Models\Transaction;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $amount;
    public $category_id;
    public $date;
    public $type;
    public $selected_for_edit;

    public function mount()
    {
        $this->name = '';
        $this->amount = '';
        $this->category_id = '';
        $this->date = '';
        $this->type = '';
        $this->selected_for_edit='';

    }

    #[On('edit_transaction')]
    public function openEdit($id){
        $transaction = Transaction::find($id);
        if($transaction!=null) {
            $this->selected_for_edit=$transaction;
            $this->name = $transaction->name;
            $this->amount = $transaction->amount;
            if($this->amount < 0) {
                $this->type=1;
                $this->amount = $this->amount * -1;
            }else{
                $this->type=0;
            }
            $this->category_id = $transaction->category_id;
            $this->date = $transaction->date;
            Flux::modal('editTransaction')->show();
        }
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:5|max:50',
            'amount' => 'required|numeric|min:0.01|max:1000000',
            'category_id' => 'required',
            'date' => 'required|date|before_or_equal:today',
        ]);

        $this->selected_for_edit->name=$this->name;
        if($this->type)
            $this->amount=$this->amount*-1;
        $this->selected_for_edit->amount=$this->amount;
        $this->selected_for_edit->category_id=$this->category_id;
        $this->selected_for_edit->date=$this->date;
        $this->selected_for_edit->save();

        Flux::modal('editTransaction')->close();
        $this->mount();
        $this->dispatch('transaction_saved');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.transaction.edit',['categories' => $categories]);
    }
}

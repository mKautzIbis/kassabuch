<?php

namespace App\Livewire\Transaction;

use App\Models\Category;
use App\Models\Transaction;
use Flux\Flux;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $amount;
    public $category_id;
    public $date;
    public $type;

    public function mount()
    {
        $this->name = '';
        $this->amount = '';
        $this->category_id = '';
        $this->date = '';
        $this->type=0;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:5|max:50',
            'amount' => 'required|numeric|min:0.01|max:1000000',
            'category_id' => 'required',
            'date' => 'required|date|before_or_equal:today',
        ]);
        if($this->type==1){
            $this->amount=$this->amount*-1;
        }

        Transaction::create([
            'name' => $this->name,
            'amount' => $this->amount,
            'category_id' => $this->category_id,
            'date' => $this->date,
        ]);
        Flux::modal('createTransaction')->close();
        $this->mount();
        $this->dispatch('transaction_saved');
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.transaction.create', ['categories' => $categories]);
    }
}

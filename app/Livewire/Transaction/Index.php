<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $selected_for_delete;
    public function deleteQuestion($id)
    {
        Flux::modal('deleteModal')->show();
        $this->selected_for_delete=$id;
    }
    public function delete()
    {
        Flux::modal('deleteModal')->close();
        if(Transaction::find($this->selected_for_delete)!=null)
            Transaction::destroy($this->selected_for_delete);
    }

    public function edit($id)
    {
        $this->dispatch('edit_transaction', id:$id);
    }

    #[On('transaction_saved')]
    public function render()
    {
        $transactions = Transaction::orderBy('date', 'desc')->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.transaction.index',['transactions' =>$transactions]);
    }
}

<?php

namespace App\Livewire\Transaction;

use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    #[On('transaction_saved')]
    public function render()
    {
        $transactions = Transaction::orderBy('date', 'desc')->paginate(10);
        return view('livewire.transaction.index',['transactions' =>$transactions]);
    }
}

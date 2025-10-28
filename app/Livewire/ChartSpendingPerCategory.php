<?php

namespace App\Livewire;

use App\Models\Transaction;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ChartSpendingPerCategory extends Component
{

    #[Computed]
    public function chart()
    {
        $spendingPerCategory = Transaction::where('amount','<', '0')
            ->where('category_id','!=', null)
            ->selectRaw('SUM(amount) as saldo, category_id')
            ->groupBy('category_id')->get();


        return Chartjs::build()
            ->name('SpendingsPerCategory')
            ->type('bar')
            ->labels($spendingPerCategory->pluck('category')->pluck('name')->toArray())
            ->datasets([
                [
                    'label' => "Spendings",
                    'data' => $spendingPerCategory->pluck('saldo')->toArray(),
                    'backgroundColor' => $spendingPerCategory->pluck('category')->pluck('color')->toArray(),
                ],

            ])
            ->options([]);
    }

    public function render()
    {
        return view('livewire.chart-spending-per-category');
    }
}

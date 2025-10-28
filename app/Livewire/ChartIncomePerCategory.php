<?php

namespace App\Livewire;

use App\Models\Transaction;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ChartIncomePerCategory extends Component
{
    #[Computed]
    public function chart()
    {
        $IncomePerCategory = Transaction::where('amount','>', '0')
            ->where('category_id','!=', null)
            ->selectRaw('SUM(amount) as saldo, category_id')
            ->groupBy('category_id')->get();


        return Chartjs::build()
            ->name('IncomePerCategory')
            ->type('doughnut')
            ->labels($IncomePerCategory->pluck('category')->pluck('name')->toArray())
            ->datasets([
                [
                    'label' => "Income",
                    'data' => $IncomePerCategory->pluck('saldo')->toArray(),
                    'backgroundColor' => $IncomePerCategory->pluck('category')->pluck('color')->toArray(),
                ],

            ])
            ->options([]);
    }
    public function render()
    {
        return view('livewire.chart-income-per-category');
    }
}

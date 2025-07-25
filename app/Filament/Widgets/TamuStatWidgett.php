<?php

namespace App\Filament\Widgets;

use App\Models\DataTamu;
use Filament\Widgets\Widget;

class TamuStatWidgett extends Widget
{
    protected static string $view = 'filament.widgets.tamu-stat-widget';

    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 1;

    public function getData(): array
    {
        $today = DataTamu::whereDate('jam_datang', now()->toDateString())->count();
        $month = DataTamu::whereMonth('jam_datang', now()->month)
                         ->whereYear('jam_datang', now()->year)
                         ->count();
        $year = DataTamu::whereYear('jam_datang', now()->year)->count();

        return [
            'today' => $today,
            'month' => $month,
            'year' => $year,
        ];
    }

    protected function getViewData(): array
    {
        return [
            'stats' => [
                [
                    'label' => 'Pengunjung Hari Ini',
                    'value' => $this->getData()['today'],
                    'icon' => 'heroicon-o-users',
                    'color' => 'emerald',
                    'trend' => $this->getTrend('today'),
                ],
                [
                    'label' => 'Pengunjung Bulan Ini',
                    'value' => $this->getData()['month'],
                    'icon' => 'heroicon-o-calendar',
                    'color' => 'green',
                    'trend' => $this->getTrend('month'),
                ],
                [
                    'label' => 'Pengunjung Tahun Ini',
                    'value' => $this->getData()['year'],
                    'icon' => 'heroicon-o-chart-bar',
                    'color' => 'lime',
                    'trend' => $this->getTrend('year'),
                ],
            ],
        ];
    }

    protected function getTrend(string $period): ?string
    {
        // Implement your trend calculation logic here
        // For example, compare with previous period
        return null; // Return 'up', 'down', or null
    }
}
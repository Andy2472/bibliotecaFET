<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use App\Filament\Widgets\LoanStats;
use App\Filament\Widgets\MostActiveUsers;
use App\Filament\Widgets\StudentStats;
use App\Filament\Widgets\TotalLibros;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.dashboard';
    protected static ?string $navigationLabel = 'Escritorio';

    

    protected function getHeaderWidgets(): array
    {        
        return [
            StudentStats::class,
            TotalLibros::class,
        ];
    }
}

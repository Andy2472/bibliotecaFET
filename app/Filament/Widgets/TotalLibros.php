<?php

namespace App\Filament\Widgets;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Editorial;
use App\Models\Loan;
use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalLibros extends BaseWidget
{
    protected function getCards(): array
    {
        $totalLibros = Book::count();

        return [
            Card::make('Libros', $totalLibros)
                ->description('Total de libros registrados')
                ->color('success') // colores tailwind: primary, danger, warning, success, info
                ->icon('heroicon-c-check-badge'),  // iconos heroicons, Filament ya los usa

            Card::make('Autores', Author::count())
                ->color('info')
                ->icon('heroicon-c-user'),

            Card::make('Editoriales', Editorial::count())
                ->color('primary')
                ->icon('heroicon-m-book-open'),

            Card::make('Categorías', Category::count())
                ->color('secondary')
                ->icon('heroicon-s-bookmark-square'),

            Stat::make('Total Préstamos', Loan::count())->icon('heroicon-s-presentation-chart-bar'),
            Stat::make('Préstamos Activos', Loan::where('devuelto', false)->count())->icon('heroicon-m-receipt-refund'),

        ];
    }
}

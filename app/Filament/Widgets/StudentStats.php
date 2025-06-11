<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Student;

class StudentStats extends ChartWidget
{
    protected static ?string $heading = 'Total de Estudiantes';

    protected function getData(): array
    {
        $total = Student::count();

        return [
            'labels' => ['Estudiantes'],
            'datasets' => [
                [
                    'label' => 'Total',
                    'data' => [$total],
                    'backgroundColor' => 'rgba(22, 101, 52, 0.8)', // Verde oscuro con opacidad
                    'borderColor' => 'rgba(22, 101, 52, 1)',       // Borde sólido
                    'borderWidth' => 2,
                    'borderRadius' => 6, // Para bordes redondeados
                    'maxBarThickness' => 60, // Para barras gruesas y bonitas
                ],
            ],
            'options' => [
                'plugins' => [
                    'legend' => [
                        'display' => false, // Oculta la leyenda si solo hay un dato
                    ],
                    'tooltip' => [
                        'enabled' => true,
                        'backgroundColor' => 'rgba(22, 101, 52, 0.9)',
                        'titleFont' => ['weight' => 'bold'],
                    ],
                ],
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'grid' => [
                            'color' => 'rgba(22, 101, 52, 0.1)', // Lineas de la cuadricula más suaves y claras
                            'borderColor' => 'rgba(22, 101, 52, 0.3)',
                        ],
                        'ticks' => [
                            'color' => '#166534', // Color verde oscuro para números
                            'font' => [
                                'size' => 14,
                                'weight' => 'bold',
                            ],
                        ],
                    ],
                    'x' => [
                        'grid' => [
                            'display' => false, // Oculta líneas verticales para que se vea más limpio
                        ],
                        'ticks' => [
                            'color' => '#166534',
                            'font' => [
                                'size' => 16,
                                'weight' => 'bold',
                            ],
                        ],
                    ],
                ],
                'responsive' => true,
                'maintainAspectRatio' => false, // Para que ocupe el espacio del contenedor
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}


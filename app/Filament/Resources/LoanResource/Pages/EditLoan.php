<?php

namespace App\Filament\Resources\LoanResource\Pages;
use Illuminate\Support\Facades\Log;

use App\Filament\Resources\LoanResource;
use App\Models\Book;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Carbon;

class EditLoan extends EditRecord
{
    protected static string $resource = LoanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Si el campo devuelto es true y la fecha_devolucion aún está vacía
        if ($data['devuelto'] && empty($data['fecha_devolucion'])) {
            $data['fecha_devolucion'] = Carbon::now();
        }

        return $data;
    }

    protected function afterSave(): void
    {
        // Verifica si el préstamo fue marcado como devuelto
        if ($this->record->devuelto) {
            Log::info('Préstamo devuelto. Reponiendo libros...');

            // Obtener los IDs de los libros relacionados
            $bookIds = $this->record->books()->pluck('books.id')->toArray();
            Log::info('IDs de libros relacionados: ' . json_encode($bookIds));

            // Por cada libro, reponer la cantidad
            foreach ($bookIds as $bookId) {
                $book = Book::find($bookId);
                if ($book) {
                    $book->cantidad += 1;
                    $book->save();
                    Log::info("Libro repuesto: {$book->name} (Nueva cantidad: {$book->cantidad})");
                } else {
                    Log::warning("Libro no encontrado para ID: {$bookId}");
                }
            }
        } else {
            Log::info('El préstamo aún no ha sido devuelto, no se reponen libros.');
        }
    }
}

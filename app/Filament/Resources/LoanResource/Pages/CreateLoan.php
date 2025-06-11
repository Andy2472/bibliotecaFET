<?php

namespace App\Filament\Resources\LoanResource\Pages;

use App\Filament\Resources\LoanResource;
use App\Models\Book;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLoan extends CreateRecord
{
    protected static string $resource = LoanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['fecha_prestamo'] = now();
        $data['cantidad'] = 0; // para evitar el error al insertar
        return $data;
    }


    protected function afterCreate(): void
    {
        // Actualizar la cantidad de libros prestados
        $this->record->cantidad = $this->record->books()->count();
        $this->record->save();

        // Obtener los IDs de los libros relacionados, especificando la tabla para evitar ambigüedad
        $bookIds = $this->record->books()->pluck('books.id');

        // Por cada libro, disminuimos la cantidad
        foreach ($bookIds as $bookId) {
            $book = Book::find($bookId);
            if ($book && $book->cantidad > 0) {
                $book->cantidad -= 1;
                $book->save();
            }
        }
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoanResource\Pages;
use App\Filament\Resources\LoanResource\RelationManagers;
use App\Models\Loan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoanResource extends Resource
{
    protected static ?string $model = Loan::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Prestamos';

    protected static ?string $navigationGroup = 'Prestamos';

    protected static ?string $modelLabel = 'Prestamos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('cantidad')
                    ->disabled() // Deshabilitado para que no lo editen manualmente
                    ->numeric()
                    ->hiddenOn('create'),
                Forms\Components\Select::make('book_id')
                    ->relationship('books', 'name', modifyQueryUsing: fn($query) => $query->orderBy('name'))
                    ->multiple()
                    ->disabledOn('edit')
                    ->label('Libro')
                    ->searchable()
                    ->preload()
                    ->required(),
                    Forms\Components\Select::make('student_id')
                    ->relationship('student', 'name', modifyQueryUsing: fn($query) => $query->orderBy('name'))
                    ->label('Estudiante')
                    ->disabledOn('edit')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Toggle::make('devuelto')
                    ->onColor('success')
                    ->offColor('danger')
                    ->hiddenOn('create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cantidad')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('book')
                    ->label('Libros')
                    ->getStateUsing(function ($record) {
                        return $record->books->pluck('name')->join(', ');
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('student.name')
                    ->sortable()
                    ->searchable(),
                    Tables\Columns\TextColumn::make('student.last_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_prestamo')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('devuelto')
                    ->boolean(),
                Tables\Columns\TextColumn::make('fecha_devolucion')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function mutateFormDataBeforeUpdate(array $data): array
    {
        $data['cantidad'] = count($data['book_id'] ?? []);
        return $data;
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLoans::route('/'),
            'create' => Pages\CreateLoan::route('/create'),
            'edit' => Pages\EditLoan::route('/{record}/edit'),
        ];
    }
}

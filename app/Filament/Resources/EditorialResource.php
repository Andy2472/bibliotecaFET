<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EditorialResource\Pages;
use App\Filament\Resources\EditorialResource\RelationManagers;
use App\Models\Editorial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EditorialResource extends Resource
{
    protected static ?string $model = Editorial::class;

    protected static ?string $navigationIcon = 'heroicon-m-wallet';

    protected static ?string $navigationLabel = 'Editorial';

    protected static ?string $navigationGroup = 'Libros';

    protected static ?string $modelLabel = 'Editorial';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(40),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEditorials::route('/'),
            'create' => Pages\CreateEditorial::route('/create'),
            'edit' => Pages\EditEditorial::route('/{record}/edit'),
        ];
    }
}

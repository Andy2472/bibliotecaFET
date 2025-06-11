<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-c-book-open';

    protected static ?string $navigationLabel = 'Libros';

    protected static ?string $navigationGroup = 'Libros';

    protected static ?string $modelLabel = 'Libros';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Forms\Components\TextInput::make('u_code')
                    ->label('Codigo de la universidad')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->minLength(5)
                    ->maxLength(18),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(40),
                Forms\Components\TextInput::make('cantidad')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->maxValue(99),
                Forms\Components\FileUpload::make('cover_image')
                    ->label('Portada')
                    ->image()
                    ->directory('covers')
                    ->visibility('public')
                    ->imagePreviewHeight('200')
                    ->previewable(),
                Forms\Components\TextInput::make('isbn')
                    ->maxLength(40)
                    ->default(null),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name', modifyQueryUsing: fn($query) => $query->orderBy('name'))
                    ->label('Categoria')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('author_id')
                    ->relationship('authors', 'name', modifyQueryUsing: fn($query) => $query->orderBy('name'))
                    ->multiple()
                    ->label('Autor')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('editorial_id')
                    ->relationship('editorials', 'name', modifyQueryUsing: fn($query) => $query->orderBy('name'))
                    ->multiple()
                    ->label('Editorial')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Toggle::make('disponible')
                    ->onColor('success')
                    ->offColor('danger')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('disponible')
                    ->boolean(),
                Tables\Columns\TextColumn::make('u_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cantidad')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Author')
                    ->label('Autores')
                    ->getStateUsing(function ($record) {
                        return $record->authors->pluck('name')->join(', ');
                    }),
                Tables\Columns\TextColumn::make('Editorial')
                    ->label('Editorial')
                    ->getStateUsing(function ($record) {
                        return $record->editorials->pluck('name')->join(', ');
                    }),
                Tables\Columns\TextColumn::make('isbn')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Portada')
                    ->circular()
                    ->disk('public')
                    ->size(40),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}

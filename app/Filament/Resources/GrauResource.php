<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GrauResource\Pages;
use App\Filament\Resources\GrauResource\RelationManagers;
use App\Models\Grau;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GrauResource extends Resource
{
    protected static ?string $model = Grau::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Kareira';

    protected static ?string $navigationLabel = 'Grau';
    protected static ?string $pluralModelLabel = 'Grau';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('naran_grau')
                    ->required(),
                Forms\Components\TextInput::make('salariu')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('naran_grau')
                    ->searchable(),
                Tables\Columns\TextColumn::make('salariu')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListGraus::route('/'),
            'create' => Pages\CreateGrau::route('/create'),
            'edit' => Pages\EditGrau::route('/{record}/edit'),
        ];
    }
}

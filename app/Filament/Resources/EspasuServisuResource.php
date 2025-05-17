<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EspasuServisuResource\Pages;
use App\Filament\Resources\EspasuServisuResource\RelationManagers;
use App\Models\EspasuServisu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EspasuServisuResource extends Resource
{
    protected static ?string $model = EspasuServisu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Administrasaun Lugar Serbisu no Munisipiu';

    protected static ?string $navigationLabel = 'Espasu Serbisu';
    protected static ?string $pluralModelLabel = 'Espasu Serbisu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_diresaun')
                    ->relationship('diresaun', 'naran_diresaun')
                    ->required(),
                Forms\Components\TextInput::make('fatin_servisu')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('diresaun.naran_diresaun')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fatin_servisu')
                    ->searchable()
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
            'index' => Pages\ListEspasuServisus::route('/'),
            'create' => Pages\CreateEspasuServisu::route('/create'),
            'edit' => Pages\EditEspasuServisu::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegimeEspesialResource\Pages;
use App\Filament\Resources\RegimeEspesialResource\RelationManagers;
use App\Models\RegimeEspesial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegimeEspesialResource extends Resource
{
    protected static ?string $model = RegimeEspesial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Kareira';

    protected static ?string $navigationLabel = 'Regime Espesial';
    protected static ?string $pluralModelLabel = 'Regime Espesial';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('naran_regime')
                    ->required(),
                Forms\Components\TextInput::make('grau_regime')
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
                Tables\Columns\TextColumn::make('naran_regime')
                    ->searchable(),
                Tables\Columns\TextColumn::make('grau_regime')
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
            'index' => Pages\ListRegimeEspesials::route('/'),
            'create' => Pages\CreateRegimeEspesial::route('/create'),
            'edit' => Pages\EditRegimeEspesial::route('/{record}/edit'),
        ];
    }
}

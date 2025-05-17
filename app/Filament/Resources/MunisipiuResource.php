<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MunisipiuResource\Pages;
use App\Filament\Resources\MunisipiuResource\RelationManagers;
use App\Models\Munisipiu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MunisipiuResource extends Resource
{
    protected static ?string $model = Munisipiu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administrasaun Lugar Serbisu no Munisipiu';
    protected static ?string $navigationLabel = 'Munisipiu';
    protected static ?string $pluralModelLabel = 'Munisipiu';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('naran_munisipiu')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('naran_munisipiu')
                    ->searchable(),
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
            'index' => Pages\ListMunisipius::route('/'),
            'create' => Pages\CreateMunisipiu::route('/create'),
            'edit' => Pages\EditMunisipiu::route('/{record}/edit'),
        ];
    }
}

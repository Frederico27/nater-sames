<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiresaunResource\Pages;
use App\Filament\Resources\DiresaunResource\RelationManagers;
use App\Models\Diresaun;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiresaunResource extends Resource
{
    protected static ?string $model = Diresaun::class;
    protected static ?string $navigationLabel = 'Diresaun';
    protected static ?string $pluralModelLabel = 'Diresaun';

    protected static ?string $navigationGroup = 'Administrasaun Lugar Serbisu no Munisipiu';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('naran_diresaun')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('naran_diresaun')
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
            'index' => Pages\ListDiresauns::route('/'),
            'create' => Pages\CreateDiresaun::route('/create'),
            'edit' => Pages\EditDiresaun::route('/{record}/edit'),
        ];
    }
}

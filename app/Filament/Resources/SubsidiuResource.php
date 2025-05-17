<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubsidiuResource\Pages;
use App\Filament\Resources\SubsidiuResource\RelationManagers;
use App\Models\Subsidiu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubsidiuResource extends Resource
{
    protected static ?string $model = Subsidiu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administrasaun Funsionariu no Subsidiu';
    protected static ?string $navigationLabel = 'Subsidiu';
    protected static ?string $pluralModelLabel = 'Subsidiu';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('naran_subsidiu')
                    ->required(),
                Forms\Components\TextInput::make('montante')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('naran_subsidiu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('montante')
                    ->numeric()
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubsidius::route('/'),
            'create' => Pages\CreateSubsidiu::route('/create'),
            'edit' => Pages\EditSubsidiu::route('/{record}/edit'),
        ];
    }
}

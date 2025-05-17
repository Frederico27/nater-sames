<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FunsionariuSubsidiuResource\Pages;
use App\Filament\Resources\FunsionariuSubsidiuResource\RelationManagers;
use App\Models\FunsionariuSubsidiu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FunsionariuSubsidiuResource extends Resource
{
    protected static ?string $model = FunsionariuSubsidiu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Administrasaun Funsionariu no Subsidiu';

    protected static ?string $navigationLabel = 'Subsidiu Funsionariu';
    protected static ?string $pluralModelLabel = 'Subsidiu Funsionariu';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_funsionariu')
                    ->required()
                    ->relationship('funsionariu', 'naran_kompletu'),
                Forms\Components\Select::make('id_subsidiu')
                    ->required()
                    ->relationship('subsidiu', 'naran_subsidiu'),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->required(),
                Forms\Components\Select::make('status')
                ->options([
                    'active' => 'Ativu',
                    'inactive' => 'Inativu',
                ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('funsionariu.naran_kompletu')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subsidiu.naran_subsidiu')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
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
            'index' => Pages\ListFunsionariuSubsidius::route('/'),
            'create' => Pages\CreateFunsionariuSubsidiu::route('/create'),
            'edit' => Pages\EditFunsionariuSubsidiu::route('/{record}/edit'),
        ];
    }
}

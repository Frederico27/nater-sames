<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\FunsionariuSubsidiuResource\Pages;
use App\Filament\Resources\FunsionariuSubsidiuResource\RelationManagers;
use App\Models\FunsionariuSubsidiu;
use Carbon\Carbon;
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
                    ->required()
                    ->afterStateUpdated(function ($state, Forms\Set $set) {
                        // Check if end_date is in the past
                        if ($state && Carbon::parse($state)->isPast()) {
                            $set('status', 'inactive');
                        } else {
                            $set('status', 'active');
                        }
                    })
                    ->reactive(),
                Forms\Components\Select::make('status')
                    ->options([
                        'active' => 'Ativu',
                        'inactive' => 'Inativu',
                    ])
                    ->required()
                    ->default('active'),
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
            ])
            
            ->headerActions([
                FilamentExportHeaderAction::make('export')
                ->fileName('My File') // Default file name
                ->timeFormat('m y d') // Default time format for naming exports
                ->defaultFormat('pdf') // xlsx, csv or pdf
                ->defaultPageOrientation('landscape') // Page orientation for pdf files. portrait or landscape
                // ->directDownload() // Download directly without showing modal
                // ->disableAdditionalColumns() // Disable additional columns input
                // ->disableFilterColumns() // Disable filter columns input
                // ->disableFileName() // Disable file name input
                // ->disableFileNamePrefix() // Disable file name prefix
                // ->disablePreview() // Disable export preview
                ->withHiddenColumns() //Show the columns which are toggled hidden
                ->fileNameFieldLabel('File Name') // Label for file name input
                ->formatFieldLabel('Format') // Label for format input
                ->pageOrientationFieldLabel('Page Orientation') // Label for page orientation input
            // ->filterColumnsFieldLabel('filter columns') // Label for filter columns input
            // ->additionalColumnsFieldLabel('Additional Columns') // Label for additional columns input
            // ->additionalColumnsTitleFieldLabel('Title') // Label for additional columns' title input
            // ->additionalColumnsDefaultValueFieldLabel('Default Value') // Label for additional columns' default value input
            // ->additionalColumnsAddButtonLabel('Add Column') // Label for additional columns' add button
            ])
            ;
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

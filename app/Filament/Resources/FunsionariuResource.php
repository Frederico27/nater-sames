<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\FunsionariuResource\Pages;
use App\Filament\Resources\FunsionariuResource\RelationManagers;
use App\Models\Funsionariu;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FunsionariuResource extends Resource
{
    protected static ?string $model = Funsionariu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Administrasaun Funsionariu no Subsidiu';
    protected static ?string $navigationLabel = 'Funsionariu';
    protected static ?string $pluralModelLabel = 'Funsionariu';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasaun Pesoal')
                    ->schema([
                        Forms\Components\TextInput::make('naran_kompletu')
                            ->required()
                            ->label('Naran Kompletu')
                            ->columnSpan(2),
                        Forms\Components\Select::make('sexu')
                            ->options([
                                'feto' => 'Feto',
                                'mane' => 'Mane',
                            ])
                            ->required(),
                        Forms\Components\Select::make('id_munisipiu')
                            ->required()
                            ->relationship('munisipiu', 'naran_munisipiu')
                            ->label('Munisipiu'),

                        Forms\Components\DatePicker::make('loron_moris')
                            ->required()
                            ->label('Loron Moris'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required(),
                        Forms\Components\TextInput::make('nu_telefone')
                            ->tel()
                            ->required()
                            ->numeric()
                            ->label('Numeru Telefone'),
                    ])->columns(2),

                Forms\Components\Section::make('Edukasaun')
                    ->schema([
                        Forms\Components\Select::make('nivel_edukasaun')
                            ->options([
                                'primaria' => 'Primaria',
                                'pre_sekundariu' => 'Pre Sekundariu',
                                'sekundariu' => 'Sekundariu',
                                'lisensiadu' => 'Lisensiadu',
                                'mestradu' => 'Mestradu',
                                'doutoramentu' => 'Doutoramentu',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('titulu_akademiku')
                            ->label('Titulu Akademiku'),
                    ])->columns(2),

                Forms\Components\Section::make('Informasaun Servisu')
                    ->schema([
                        Forms\Components\Select::make('id_espasu_servisu')
                            ->required()
                            ->relationship('espasu_servisu', 'fatin_servisu')
                            ->label('Espasu Servisu'),
                        Forms\Components\TextInput::make('pozisaun')
                            ->required(),
                        Forms\Components\Select::make('tipu_fun')
                            ->options([
                                'geral' => 'Geral',
                                'espesial' => 'Espesial',
                            ])
                            ->required()
                            ->label('Tipu Funsionariu')
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                if ($state === 'geral') {
                                    $set('id_regime', null);
                                } else if ($state === 'espesial') {
                                    $set('id_grau', null);
                                }
                            }),

                        Forms\Components\Select::make('id_grau')
                            ->relationship('grau', 'naran_grau')
                            ->label('Grau')
                            ->visible(fn(Get $get): bool => $get('tipu_fun') === 'geral')
                            ->nullable()
                            ->dehydrated(fn(Get $get): bool => $get('tipu_fun') === 'geral'),

                        Forms\Components\Select::make('id_regime')
                            ->relationship('regimeEspesial', 'naran_regime')
                            ->label('Regime')
                            ->visible(fn(Get $get): bool => $get('tipu_fun') === 'espesial')
                            ->nullable()
                            ->dehydrated(fn(Get $get): bool => $get('tipu_fun') === 'espesial'),
                    ])->columns(2),

                Forms\Components\Section::make('Kontratu & Status')
                    ->schema([
                        Forms\Components\Select::make('tipu_kontratu')
                            ->options([
                                'kontratadu' => 'Kontratadu',
                                'permanente' => 'Permanente',
                            ])
                            ->required(),

                        Forms\Components\Select::make('status')
                            ->options([
                                'ativu' => 'Ativu',
                                'suspensa' => 'Suspensa',
                                'inativu' => 'Inativu',
                            ])
                            ->required(),
                        Forms\Components\DatePicker::make('start_work')
                            ->required()
                            ->label('Data Komesa'),
                        Forms\Components\DatePicker::make('end_work')
                            ->label('Data Remata')
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                if (!empty($state) && strtotime($state) < strtotime('today')) {
                                    $set('status', 'inativu');
                                }
                            }),
                    ])->columns(2),

                Forms\Components\Section::make('Sistema ID')
                    ->schema([
                        Forms\Components\TextInput::make('pmis')
                            ->required(),
                        Forms\Components\TextInput::make('payroll')
                            ->required()
                            ->numeric(),
                    ])->columns(2),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('munisipiu.naran_munisipiu')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('grau.naran_grau')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('espasu_servisu.fatin_servisu')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('regimeEspesial.naran_regime')
                    ->formatStateUsing(fn($state) => is_array($state) ? implode(', ', $state) : $state)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('naran_kompletu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sexu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('loron_moris')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nu_telefone')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipu_fun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nivel_edukasaun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('titulu_akademiku')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipu_kontratu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pozisaun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_work')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_work')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pmis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payroll')
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
                Tables\Actions\ViewAction::make(),
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist

            ->schema([
                \Filament\Infolists\Components\Section::make('Informasaun Personal')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(3)
                            ->schema([
                                \Filament\Infolists\Components\Group::make([
                                    TextEntry::make('naran_kompletu')
                                        ->label('Naran Kompletu')
                                        ->weight('bold')
                                        ->size(TextEntry\TextEntrySize::Large),
                                    TextEntry::make('sexu')
                                        ->label('Sexu')
                                        ->badge(),
                                    TextEntry::make('loron_moris')
                                        ->label('Loron Moris')
                                        ->date('d F Y'),
                                ])->columnSpan(2),
                                ImageEntry::make('image')
                                    ->label('Foto')
                                    ->defaultImageUrl(asset('https://static.vecteezy.com/system/resources/thumbnails/001/840/618/small_2x/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-free-vector.jpg'))
                                    ->circular()
                                    ->width(150)
                                    ->height(150)
                                    ->columnSpan(1),
                            ]),
                        \Filament\Infolists\Components\Section::make('Kontaktu & Edukasaun')
                            ->schema([
                                TextEntry::make('nivel_edukasaun')
                                    ->label('Nivel Edukasaun')
                                    ->icon('heroicon-o-academic-cap'),
                                TextEntry::make('nu_telefone')
                                    ->label('Numeru Telefone')
                                    ->icon('heroicon-o-phone'),
                                TextEntry::make('email')
                                    ->label('Email')
                                    ->icon('heroicon-o-envelope')
                                    ->url(fn($record) => $record->email ? "mailto:{$record->email}" : null),
                            ])
                            ->columns(3)
                            ->collapsible(),
                    ])
                    ->columnSpanFull(),


                \Filament\Infolists\Components\Section::make('Detallu Funsionariu')
                    ->schema([
                        TextEntry::make('pozisaun')
                            ->label('Position'),
                        TextEntry::make('departamentu')
                            ->label('Department'),
                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'ativu' => 'success',
                                'inativu' => 'danger',
                                default => 'warning',
                            }),
                        TextEntry::make('nivel.naran')
                            ->label('Level'),
                        TextEntry::make('created_at')
                            ->label('Dadus Kria iha')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->label('Dadus Renova')
                            ->dateTime(),
                    ])
                    ->columns(2),
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
            'index' => Pages\ListFunsionarius::route('/'),
            'create' => Pages\CreateFunsionariu::route('/create'),
            'view' => Pages\ViewFunsionariu::route('/{record}'),
            'edit' => Pages\EditFunsionariu::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FunsionariuResource\Pages;
use App\Filament\Resources\FunsionariuResource\RelationManagers;
use App\Models\Funsionariu;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
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
                Forms\Components\Select::make('id_munisipiu')
                    ->required()
                    ->relationship('munisipiu', 'naran_munisipiu'),
                Forms\Components\Select::make('id_grau')
                    ->relationship('grau', 'naran_grau'),
                Forms\Components\Select::make('id_espasu_servisu')
                    ->required()
                    ->relationship('espasu_servisu', 'fatin_servisu'),
                Forms\Components\Select::make('id')
                    ->relationship('regimeEspesial', 'naran_regime'),
                Forms\Components\TextInput::make('naran_kompletu')
                    ->required(),
                Forms\Components\Select::make('sexu')
                    ->options([
                        'feto' => 'Feto',
                        'mane' => 'Mane',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('loron_moris')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('nu_telefone')
                    ->tel()
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('tipu_fun')
                    ->options([
                        'geral' => 'Geral',
                        'espesial' => 'Espesial',
                    ])
                    ->required(),
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
                Forms\Components\TextInput::make('titulu_akademiku'),
                Forms\Components\Select::make('tipu_kontratu')
                    ->options([
                        'kontratadu' => 'Kontratadu',
                        'permanente' => 'Permanente',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('pozisaun')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'ativu' => 'Ativu',
                        'suspensa' => 'Suspensa',
                        'inativu' => 'Inativu',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('start_work')
                    ->required(),
                Forms\Components\DatePicker::make('end_work'),
                Forms\Components\TextInput::make('pmis')
                    ->required(),
                Forms\Components\TextInput::make('payroll')
                    ->required()
                    ->numeric(),
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
                Tables\Columns\TextColumn::make('id_regime')
                    ->numeric()
                    ->sortable(),
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
            ]);
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
                                        ->url(fn ($record) => $record->email ? "mailto:{$record->email}" : null),
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

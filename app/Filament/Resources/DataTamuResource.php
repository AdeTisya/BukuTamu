<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DataTamuResource\Pages;
use App\Models\DataTamu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DataTamuResource extends Resource
{
    protected static ?string $model = DataTamu::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),

                Forms\Components\TextInput::make('Dari')
                    ->required(),

                Forms\Components\Select::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('no_telp')
                    ->required(),

                Forms\Components\TextInput::make('alamat_asal')
                    ->required(),

                Forms\Components\Textarea::make('keperluan')
                    ->required(),

                Forms\Components\DateTimePicker::make('jam_datang')
                    ->required(),

                Forms\Components\FileUpload::make('foto')
                    ->directory('tamu-foto')
                    ->image()
                    ->imagePreviewHeight('100'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('Dari')->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('no_telp'),
                Tables\Columns\TextColumn::make('alamat_asal'),
                Tables\Columns\TextColumn::make('asal')->label('Asal'),
                Tables\Columns\TextColumn::make('asal')->searchable(),
                Tables\Columns\TextColumn::make('keperluan')->limit(20),
                Tables\Columns\TextColumn::make('jam_datang')->dateTime(),
                Tables\Columns\ImageColumn::make('foto')->circular(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDataTamus::route('/'),
            'create' => Pages\CreateDataTamu::route('/create'),
            'edit' => Pages\EditDataTamu::route('/{record}/edit'),
        ];
    }
}
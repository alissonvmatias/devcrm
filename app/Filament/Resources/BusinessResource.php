<?php

namespace App\Filament\Resources;

use App\Enums\PriorityEnum;
use App\Filament\Resources\BusinessResource\Pages;
use App\Filament\Resources\BusinessResource\RelationManagers;
use App\Models\Business;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;

class BusinessResource extends Resource
{
    protected static ?string $model = Business::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Dados gerais')
            ->schema([
                Forms\Components\TextInput::make('enterprise')
                    ->label('Empresa')
                    ->required(),
                Forms\Components\Select::make('branch')
                    ->label('Filial')
                    ->required(),
                Forms\Components\TextInput::make('name_bussiness')
                    ->label('Nome do negócio')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('solution')
                    ->label('Solução')
                    ->required()
                    ->maxLength(255),
                    ])->columns(2),
                Section::make('Valores')
                    ->schema([
                Forms\Components\TextInput::make('price_ativation')
                    ->label('Valor de Ativação')
                    ->maxLength(255),
                Forms\Components\TextInput::make('price_month')
                    ->label('Valor Mensal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('comission_ativation')
                    ->label('Comissão de Ativação')
                    ->maxLength(255),
                Forms\Components\TextInput::make('comission_month')
                    ->label('Comissão Mensal')
                    ->maxLength(255),
                ])->columns(2),
                Section::make('Prioridade')
                ->schema([
                Forms\Components\Select::make('priority')
                    ->label('Prioridade')
                    ->options(PriorityEnum::class)
                    ->required()
                ])->columns(2),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('enterprise')
                ->label('Empresa')
                ->searchable(),
            Tables\Columns\TextColumn::make('branch')
                ->label('Filial')
                ->searchable(),
            Tables\Columns\TextColumn::make('name_bussiness')
                ->label('Nome do Negócio')
                ->searchable(),
            Tables\Columns\TextColumn::make('solution')
                ->label('Solução')
                ->searchable(),
            Tables\Columns\TextColumn::make('price_ativation')
                ->label('Valor de Ativação')
                ->searchable(),
            Tables\Columns\TextColumn::make('price_month')
                ->label('Valor Mensal')
                ->searchable(),
            Tables\Columns\TextColumn::make('comission_ativation')
                ->label('Comissão de Ativação')
                ->searchable(),
            Tables\Columns\TextColumn::make('comission_month')
                ->label('Comissão Mensal')
                ->searchable(),
            Select::make('priority')
                ->options(PriorityEnum::class)
                ->searchable()
                ->label('Prioridade')
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
            'index' => Pages\ListBusinesses::route('/'),
            'create' => Pages\CreateBusiness::route('/create'),
            'edit' => Pages\EditBusiness::route('/{record}/edit'),
        ];
    }
}

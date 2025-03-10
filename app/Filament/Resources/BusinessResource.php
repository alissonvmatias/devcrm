<?php

namespace App\Filament\Resources;

use App\Enums\BranchEnum;
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

class BusinessResource extends Resource
{
    protected static ?string $model = Business::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Dados do negócio')
            ->schema([
                Forms\Components\TextInput::make('enterprise')
                    ->maxLength(255),
                Forms\Components\Select::make('branch')
                    ->options(BranchEnum::class)
                    ->required(),
                Forms\Components\TextInput::make('name_bussiness')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('solution')
                    ->required()
                    ->maxLength(255)
                    ])->columns(2),
                    Section::make('Dados do negócio')
                    ->schema([
                Forms\Components\TextInput::make('price_ativation')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price_month')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('comission_ativation')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('comission_month')
                    ->required()
                    ->maxLength(255),
                    ])->columns(2),
                Forms\Components\Select::make('priority')
                    ->required()
                    ->options(PriorityEnum::class),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('enterprise')
                    ->searchable(),
                Tables\Columns\TextColumn::make('branch')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_bussiness')
                    ->searchable(),
                Tables\Columns\TextColumn::make('solution')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_ativation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_month')
                    ->searchable(),
                Tables\Columns\TextColumn::make('comission_ativation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('comission_month')
                    ->searchable(),
                Tables\Columns\TextColumn::make('priority')
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
            'index' => Pages\ListBusinesses::route('/'),
            'create' => Pages\CreateBusiness::route('/create'),
            'edit' => Pages\EditBusiness::route('/{record}/edit'),
        ];
    }
}

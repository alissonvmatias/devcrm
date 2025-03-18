<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeEnterpriseResource\Pages;
use App\Filament\Resources\TypeEnterpriseResource\RelationManagers;
use App\Models\TypeEnterprise;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeEnterpriseResource extends Resource
{
    protected static ?string $modelLabel = 'Segmento';

    protected static ?string $model = TypeEnterprise::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('TypeEnterprise')
                    ->label('Segmento')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('TypeEnterprise')
                    ->label('Segmentos')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTypeEnterprises::route('/'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnterpriseResource\Pages;
use App\Filament\Resources\EnterpriseResource\RelationManagers;
use App\Models\Enterprise;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form\Components\Select;
use App\Enums\TypeLeadEnum;

class EnterpriseResource extends Resource
{
    protected static ?string $model = Enterprise::class;
    protected static ?string $modelLabel = 'Empresa';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Dados da empresa')
            ->schema([
                Forms\Components\TextInput::make('cnpj')
                    ->label('CNPJ')
                    ->mask('99.999.999/9999-99')
                    ->rule('cnpj')
                    ->maxLength(255),
                Forms\Components\TextInput::make('social_reason')
                    ->label('Razão Social')
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_fantasy')
                    ->label('Nome Fantasia'), 
                ])->columns(2),
            Section::make('Dados para Contato')
            ->schema([
                Forms\Components\select::make('type')
                    ->label('Tipo de Empresa')
                    ->options(TypeLeadEnum::class)
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('name_manager')
                    ->label('Nome do Responsável')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telephone')
                    ->label('Telefone/Celular')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                ])   
                ->columns(2),
                Fieldset::make('Observação')
                ->schema([  
                    Forms\Components\TextInput::make('Observação')
                    ->label('Descreva um pouco sobre a empresa.')
                    ->columnSpanFull()
                    ->nullable()
                ]),
                Forms\Components\TextInput::make('user_name')
                ->label('Parceiro')
                ->readonly()
                ->default(Auth::user() ? Auth::user()->name: 'Usuário desconhecido')
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cnpj')
                    ->label('CNPJ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('social_reason')
                    ->label('Razão Social')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_fantasy')
                    ->label('Nome Fantasia'),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo de Empresa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_manager')
                    ->label('Nome do Responsável')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone')
                    ->label('Telefone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('observation')
                    ->label('Observação')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_name')
                    ->label('Nome do Responsável')
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListEnterprises::route('/'),
            'create' => Pages\CreateEnterprise::route('/create'),
            'edit' => Pages\EditEnterprise::route('/{record}/edit'),
        ];
    }
}

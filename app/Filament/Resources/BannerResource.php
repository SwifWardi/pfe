<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Faker\Core\File;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
    return static::getModel()::count();
    }

    public static function canAccess(): bool
    {
        // Ensure the user is authenticated before checking the role
        if (auth()->check()) {
            return auth()->user()->hasRole('admin');
        }

        return false;  // If not authenticated, deny access
    }

    protected static ?string $navigationGroup = 'Shop Page';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
                Section::make('Banner Details')
                ->schema([
                    TextInput::make('title')
                    ->label('Title')
                    ->columnSpan(1)
                    ->required(),
                    FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->maxSize('1024')
                    ->directory('uploads/banners')
                    ->columnSpan(1)
                    ->required(),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image')
                    ->label('Image')
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    public static function getNavigationGroup(): ?string
    {
        return 'settings'; // Group name (same as RoleResource and PermissionResource)
    }
    public static function shouldRegisterNavigation(): bool
    {
    return auth()->user()->hasRole('admin');
    }

    public static function canAccess(): bool
    {
        // Ensure the user is authenticated before checking the role
        if (auth()->check()) {
            return auth()->user()->hasRole('admin');
        }

        return false;  // If not authenticated, deny access
    }

    public static function getNavigationSort(): ?int
    {
        return 1; 
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('My Profile Photo')
                ->schema([
                    FileUpload::make('photo')
                    ->previewable()
                        ->image()
                        ->avatar()
                        ->imageEditor()
                        ->disk('public') 
                        ->directory('uploads/profile')
                        ->visibility('public')
                        ->label('My Picture')
                        ->columnSpanFull(),
                
                ]),
                
                Section::make('Personal Information')
                        ->extraAttributes(['class' => 'text-xl font-bold'])
                        ->schema([
                            TextInput::make('name')
                                ->label('Full Name')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(1),
                
                            TextInput::make('username')
                                ->prefix('#')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(1),
                
                            TextInput::make('email')
                                ->email()
                                ->columnSpanFull(),
                
                            TextInput::make('address')
                                ->maxLength(255)
                                ->columnSpanFull(),
                
                            TextInput::make('phone')
                                ->tel()
                                ->maxLength(20)
                                ->columnSpanFull(),
                        ])
                        ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('roles.name')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
                TextColumn::make('updated_at')->dateTime()->sortable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use App\Models\ProductPhoto;
use App\Models\Subcategory;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Catalog';

    public static function getNavigationBadge(): ?string
    {
        if (auth()->user()->isAdmin()) {
            return static::getModel()::count();
        }
    
        return static::getModel()::where('vendor_id', auth()->id())->count();
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

            if (auth()->user()?->hasRole('vendor')) {
                $query->where('vendor_id', auth()->id());
            }

        return $query;
    }

    protected static function getVendorField()
    {
        if (auth()->user()->isAdmin()) {
            return Select::make('vendor_id')
                ->label('Vendor_Id')
                ->relationship(name: 'vendor', titleAttribute: 'name')
                ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->id} : {$record->name}")
                ->helperText('In Form of Id : Name')
                ->required();
        }
        
        return Hidden::make('vendor_id')
            ->default(auth()->id());
    }

        public static function form(Form $form): Form
        {
            return $form
        ->schema([
            // Basic Information Section
            Section::make('Basic Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextInput::make('name')
                                ->label('Product Name')
                                ->maxLength(255)
                                ->required(),
                            Select::make('brand_id')
                                ->label('Brand')
                                ->options(Brand::all()->pluck('name', 'id')),
                            RichEditor::make('long_descp')
                                ->label('Long Description')
                                ->required()
                                ->columnSpanFull(),
                            Textarea::make('short_descp')
                                ->label('Short Description')
                                ->required()
                                ->columnSpanFull(),
                            TagsInput::make('tags')
                                ->placeholder('Add tags...')
                                ->separator(',') 
                                ->helperText('Separate tags with commas')
                                ->label('Product Tags'),
                            self::getVendorField(),
                        ]),
                ]),

        // Category & Subcategory Section
        Section::make('Category & Subcategory')
            ->schema([
                Grid::make(2)
                    ->schema([
                        Select::make('category_id')
                            ->label('Category')
                            ->options(Category::all()->pluck('name', 'id'))
                            ->live()
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                $set('subcategory_id', null);
                                if ($state) {
                                    $subcategories = Subcategory::with('category')->where('category_id', $state)->pluck('name', 'id');
                                    $set('subcategoriesOptions', $subcategories);
                                } else {
                                    $set('subcategoriesOptions', []);
                                }
                            }),
                        Select::make('subcategory_id')
                            ->label('Subcategory')
                            ->options(function (Forms\Get $get) {
                                return $get('subcategoriesOptions') ?? [];
                            }),
                    ]),
            ]),

        // Product Details Section
        Section::make('Product Details')
            ->schema([
                Grid::make(3)
                    ->schema([
                        TextInput::make('code')
                            ->label('Product Code')
                            ->required(),
                        TextInput::make('qty')
                            ->label('Product Quantity')
                            ->numeric()
                            ->required(),
                        TextInput::make('selling_price')
                            ->label('Selling Price')
                            ->numeric()
                            ->required(),
                        TextInput::make('discount_price')
                            ->label('Discount Price')
                            ->numeric()
                            ->nullable(),
                        TagsInput::make('size')
                            ->label('Product Size')
                            ->separator(',') // Use comma as a separator
                            ->helperText('Separate tags with commas')
                            ->placeholder('Add sizes'),
                        TagsInput::make('color')
                            ->label('Product Color')
                            ->separator(',') // Use comma as a separator
                            ->helperText('Separate tags with commas')
                            ->placeholder('Add colors'),
                    ]),
            ]),

        // Toggles Section
        Section::make('Product Flags')
            ->schema([
                Grid::make(3)
                    ->schema([
                        Toggle::make('hot_deals')
                            ->label('Hot Deals')
                            ->nullable(),
                        Toggle::make('featured')
                            ->label('Featured')
                            ->nullable(),
                        Toggle::make('special_offer')
                            ->label('Special Offer')
                            ->nullable(),
                    ]),
            ]),

        // Media Section
        Section::make('Media') 
            ->schema([
                FileUpload::make('thambnail')
                    ->label('Product Thumbnail')
                    ->directory('uploads/product/thambnail')
                    ->required(),
                FileUpload::make('photos')
                    ->label('Product Photos')
                    ->directory('uploads/product/multi-img')
                    ->multiple()
                    ->maxFiles(4)
                    ->reorderable()
                    ->nullable()
                    ->helperText('Upload up to 4 product photos.'),
            ]),
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('qty'),
                ImageColumn::make('thambnail'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('delete')
                    ->label('Delete')
                    ->color('danger') 
                    ->action(function (Product $record) {
                        $record->delete();
                        $record->photos()->delete();

                    }),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}

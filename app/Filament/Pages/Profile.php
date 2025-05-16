<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Profile extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static string $view = 'filament.pages.profile';
    protected static ?string $title = 'My Profile';
    protected static ?string $navigationLabel = 'Profile';
    protected static ?string $navigationGroup = 'My Information';

    public ?array $data = [];
    public ?string $photo;

    public function mount(): void
    {
        $this->photo = auth()->user()->photo;
        $this->form->fill([
            'name' => auth()->user()->name,
            'username' => auth()->user()->username,
            'address' => auth()->user()->address,
            'email' => auth()->user()->email,
            'phone' => auth()->user()->phone,
            'photo' => $this->photo,
        ]);
    }

    protected function afterSave(): void
    {
        $photoPath = $this->data['photo'] ?? null;
        $path = is_array($photoPath) ? reset($photoPath) : $photoPath;
        if ($path && $this->photo !== $path) {
            try {
                $manager = new ImageManager(new Driver());
                $image = $manager->read(public_path('storage/' . $path));
                $image->resize(180, 180);
                $image->save();
            } catch (\Exception $e) {
                Log::error('Thumbnail processing failed: ' . $e->getMessage());
            }
        }    
    }

    public function form(Form $form): Form
    {
        return $form
            ->model(auth()->user())
            ->statePath('data')
            ->schema([
                Grid::make([
                    'default' => 1,
                    'sm' => 1,
                    'md' => 2,
                    'lg' => 2,
                ])
                ->schema([
                    Section::make('Profile Photo')
                    ->extraAttributes(['class' => 'text-xl font-bold'])
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
                        ])
                        ->columns(1),
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
                ]),
            ]);
            
    }
    

    public function submit(): void
    {
        auth()->user()->update($this->form->getState());

        Notification::make()
            ->title('Profile updated successfully!')
            ->success()
            ->send();
        
        $this->afterSave();
        
    }
}
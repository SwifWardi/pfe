<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\ProductPhoto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function afterCreate(): void
    {
        $this->record->update([
            'slug' => Str::slug($this->record->name),
        ]);

        $photoPath = $this->data['photo'] ?? null;
        $path = is_array($photoPath) ? reset($photoPath) : $photoPath;
        log::info('data ' . $path);
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
            

        $photos = $this->data['photos'] ?? [];

        foreach ($photos as $photo) {
            $manager = new ImageManager(new Driver());
            $image = $manager->read(public_path('storage/' . $photo));
            $image->resize(800,800);
            $image->save();

            ProductPhoto::insert([
                'product_id' => $this->record->id,
                'src' => $photo,
            ]);
        }
    }
    
    
}

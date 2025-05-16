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

         // Handle thumbnail - it's an associative array with UUID keys
            $thumbnail = $this->data['thambnail'] ?? null;
            
            if ($thumbnail && is_array($thumbnail)) {
                // Extract the first value from the thumbnail array
                $thumbnailPath = reset($thumbnail); // Gets first value in the array
                Log::info('Using thumbnail path: ' . $thumbnailPath);
                
                if (!empty($thumbnailPath)) {
                    try {
                        $manager = new ImageManager(new Driver());
                        $image = $manager->read(public_path('storage/' . $thumbnailPath));
                        $image->resize(800, 800);
                        $image->save();
                        
                        // Update product with the thumbnail
                        $this->record->update([
                            'thambnail' => $thumbnailPath,
                        ]);
                    } catch (\Exception $e) {
                        Log::error('Thumbnail processing failed: ' . $e->getMessage());
                    }
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

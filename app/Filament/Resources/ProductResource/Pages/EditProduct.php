<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\ProductPhoto;
use Filament\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Filament\Resources\Pages\EditRecord;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Delete Product') // Optional custom label
                ->color('danger') // Change the button color if desired
                ->modalHeading('Are you sure you want to delete this product and its photos?') // Optional modal heading
                ->modalSubheading('This action cannot be undone.') // Optional modal subheading
            ->action(function(){
                $this->record->photos()->delete();
                $this->record->delete();
                return redirect('/admin/products');
            }),
        ];
    }

    protected function afterSave(): void
    {
        $oldphotos = $this->record->photos()->get();
        $array = [];
        if($oldphotos){
            foreach($oldphotos as $photo){
                $path = public_path('storage/' . $photo->src);
                $relativePath = str_replace("\\", "/" , $path);
                if(file_exists($relativePath)){
                    unlink($relativePath);
                }
            }
        }

        log::info('data :', $array);

        // Create slug for the product
        $this->record->update([
            'slug' => Str::slug($this->record->name),
        ]);

        // Handle photos
        
        $photos = $this->data['photos'] ?? [];
        $this->record->photos()->delete();

        foreach ($photos as $photo) {
            $manager = new ImageManager(new Driver());
            $image = $manager->read(public_path('storage/' . $photo));
            $image->resize(800,800);
            $image->save();

            ProductPhoto::insert([
                'product_id' => $this->record->id,
                'src' => $photo
            ]);
        }
    }
}

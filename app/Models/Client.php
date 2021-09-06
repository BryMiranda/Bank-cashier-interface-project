<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Client extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'email'
    ];

    public function equipments()
    {
        return $this->hasMany(DraftCheck::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useDisk('client')
            ->storeConversionsOnDisk('public')
            ->registerMediaConversions(function () {
                $this->addMediaConversion('thumbnail')
                    ->fit(Manipulations::FIT_CROP, 300, 300)
                    ->performOnCollections('images');
            });
    }

    public function saveImage(UploadedFile $file)
    {
        return $this->addMedia($file)
            ->toMediaCollection('images');
    }

    public function images()
    {
        return $this->getMedia('images');
    }
}

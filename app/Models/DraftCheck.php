<?php

namespace App\Models;

use App\Presenters\DraftCheckPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DraftCheck extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'status',
        'observation',
        'check_number',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useDisk('draft-check')
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

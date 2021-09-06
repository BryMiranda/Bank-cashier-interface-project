<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftCheck extends Model
{
    use HasFactory;

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

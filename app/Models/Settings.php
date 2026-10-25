<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    /**
     * Absolute URL for the uploaded logo, falling back to the bundled brand
     * asset when none has been uploaded.
     *
     * @return string
     */
    public function getLogoUrlAttribute()
    {
        return $this->mediaUrl($this->logo, 'dash/images/mitrax-logo-for-dark-bg.png');
    }

    /**
     * Absolute URL for the uploaded favicon, falling back to the bundled asset.
     *
     * @return string
     */
    public function getFaviconUrlAttribute()
    {
        return $this->mediaUrl($this->favicon, 'dash/images/mitrax-favicon.png');
    }

    /**
     * Uploads are stored on the public disk under photos/, which public/storage
     * maps to storage/app/public.
     *
     * @param  string|null  $file
     * @param  string  $fallback
     * @return string
     */
    private function mediaUrl($file, $fallback)
    {
        return $file ? asset('storage/photos/'.$file) : asset($fallback);
    }
}

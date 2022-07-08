<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function campaignImages()
    {
        return $this->hasMany(CampaignImage::class);
    }

    public static function saveImages($campaign)
    {
        if (request()->has('campaign_images')) {
            return collect(request()->campaign_images)->map( fn ($image) => CampaignImage::create([
                'file_id' => $image, 
                'campaign_id' => $campaign->id
            ]));
        }
    }
}

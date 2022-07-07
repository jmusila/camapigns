<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCampaignRequest;
use App\Http\Resources\CampaignResource;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        return CampaignResource::collection(Campaign::with('campaignImages')->get());
    }

    public function store(CreateCampaignRequest $request)
    {
        $campaign = Campaign::create($request->validated());

        $campaign->campaignImages()->sync($request->campaign_images);

        return new CampaignResource($campaign->load('campaignImages'));
    }
}

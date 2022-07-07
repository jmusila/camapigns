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
        return new CampaignResource(Campaign::create($request->validated())->campaignImages()->sync($request->campaign_images));
    }
}

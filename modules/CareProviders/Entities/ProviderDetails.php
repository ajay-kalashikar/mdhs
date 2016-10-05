<?php

namespace Modules\CareProviders\Entities;

use Illuminate\Database\Eloquent\Model;

class ProviderDetails extends Model
{
    protected $fillable = [];
    protected $table = "provider_details";
    
    public function county() {
        return $this->belongsTo('Modules\CareProviders\Entities\CountyDetails', 'county_id', 'id');
    }
    
    public function rating() {
        return $this->belongsTo('Modules\CareProviders\Entities\RatingDetails', 'quality_rating', 'rating');
    }
    
    public function provider_type() {
        return $this->belongsTo('Modules\CareProviders\Entities\ProviderTypes', 'provider_type', 'type');
    }
}

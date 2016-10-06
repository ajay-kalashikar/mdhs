<?php

namespace Modules\CareProviders\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CareProviders\Entities\ProviderDetails;
use Modules\CareProviders\Entities\CountyDetails;
use Modules\CareProviders\Entities\ProviderTypes;
use Modules\CareProviders\Entities\RatingDetails;
use \Exception;

class CareProvidersController extends Controller {

    /**
     * filter care providers on the basis of search criteria.
     * @param Request $request
     * @return JSON response with all found data.
     */
    public function index(Request $request) {
        try {
            if (is_null($request->provider_name) && is_null($request->provider_type) && is_null($request->county) && is_null($request->city) && is_null($request->rating)) {
                throw new Exception("Search criteria is empty");
            }
            $page_size = env('DEFAULT_RECORDS_PER_PAGE', 20);
            list($page, $provider_name, $provider_type, $county, $city, $rating) = self::getSearchParameters($request);
            $query = ProviderDetails::with('county', 'rating', 'provider_type');
            if (!empty($provider_name)) {
                $query->where('name', 'like', $provider_name);
            }
            if (!empty($provider_type)) {
                $query->where('provider_type', '=', $provider_type);
            }
            if (!empty($county)) {
                $query->where('county_id', '=', $county);
            }
            if (!empty($city)) {
                $query->where('physical_city', 'like', $city);
            }
            if (trim($rating) !== '') {
                $query->where('quality_rating', '=', $rating);
            }
            $details = $query->paginate(10000, ['*'], 'page', $page);
            return response($details, 200);
        }
        catch (Exception $ex) {
            return response(['error' => $ex->getMessage(), 'success' => false]);
        }
    }

    /**
     * to get all available counties
     * @return json response
     */
    public function getCounties() {
        $counties = CountyDetails::all();
        return response($counties);
    }

    /**
     * to get all provider types
     * @return json response
     */
    public function getProviderTypes() {
        $types = ProviderTypes::all();
        return response($types);
    }

    /**
     * to get all rating descriptions
     * @return type
     */
    public function getRatings() {
        $ratings = RatingDetails::all();
        return response($ratings);
    }

    /**
     * to get city list county based
     * @return json response
     */
    public function getCities(Request $request) {
        $county = $request->get('county', '');
        $query = ProviderDetails::select('physical_city as city');
        if(!empty($county)) {
            $query->where('county_id', '=', $county);
        }
        $query->groupBy('physical_city');
        $query->orderBy('physical_city', 'ASC');
        $ratings = $query->get();
        return response($ratings);
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {
        return view('careproviders::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request) {
        
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit() {
        return view('careproviders::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request) {
        
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy() {
        
    }

    private static function getSearchParameters($request) {
        return [
            $request->get('page', 1),
            $request->get('provider_name', ''),
            $request->get('provider_type', ''),
            $request->get('county', ''),
            $request->get('city', ''),
            $request->get('rating', '')
        ];
    }

}

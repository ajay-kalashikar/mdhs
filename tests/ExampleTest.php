<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
//    public function testBasicExample()
//    {
//        //$this->visit('/')
//        //     ->see('Laravel 5');
//    }
    
    public function testCountyApi() {
        $content = $this->call('GET', '/careproviders/get/counties')->getContent();
        $this->assertJson($content, 'Valid JSON');
    }
    
    public function testCitiesApi() {
        $content = $this->call('GET', '/careproviders/get/cities')->getContent();
        $this->assertJson($content, 'Valid JSON');
    }
    
    public function testCitiesOfCountyApi() {
        $content = $this->call('GET', '/careproviders/get/cities', ['county' => '2'])->getContent();
        $this->assertJson($content, 'Valid JSON');
    }
    
    public function testProviderTypes() {
        $content = $this->call('GET', '/careproviders/get/provider_types')->getContent();
        $this->assertJson($content, 'Valid JSON');
    }
    
    public function testSearchResultsNoParam() {
        $content = $this->call('GET', '/careproviders/get')->getContent();
        $this->assertJsonStringEqualsJsonString($content, '{"error":"Search criteria is empty","success":false}');
    }
    
    public function testSearchResultsWithCounty() {
        $content = $this->call('GET', '/careproviders/get', ['county' => '2'])->getContent();
        $this->assertJson($content, 'Valid JSON');
    }
    
    public function testSearchResultsWithCountyAndCity() {
        $content = $this->call('GET', '/careproviders/get', ['county' => '2', 'city' => 'CORINTH'])->getContent();
        $this->assertJson($content, 'Valid JSON');
    }
    
    public function testSearchResultsWithCountyAndCityAndProviderType() {
        $content = $this->call('GET', '/careproviders/get', ['county' => '2', 'city' => 'CORINTH', 'provider_type' => '2'])->getContent();
        $this->assertJson($content, 'Valid JSON');
    }
    
    public function testSearchResultsWithCountyAndCityAndProviderTypeAndRating() {
        $content = $this->call('GET', '/careproviders/get', ['county' => '2', 'city' => 'CORINTH', 'provider_type' => '2', 'rating' => '0'])->getContent();
        $this->assertJson($content, 'Valid JSON');
    }
    
    public function testSearchResultsWithCountyAndCityAndProviderTypeAndRatingAndName() {
        $content = $this->call('GET', '/careproviders/get', ['name' => 'Avance - EHS Child Development Center @ Morales', 'county' => '2', 'city' => 'CORINTH', 'provider_type' => '2', 'rating' => '0'])->getContent();
        $this->assertJson($content, 'Valid JSON');
    }
}

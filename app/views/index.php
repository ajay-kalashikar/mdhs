<!DOCTYPE html>
<html lang="en" ng-app="mdhsApp" ng-controller="mainController">
<head>
<meta charset="utf-8">
    <title>MDHS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MDHS">
    <meta name="author" content="Mississippi Department Of Human Reourses">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/uswds.css">
    
    <script src="js/angular.js"></script>
    <script src="js/uswds.js"></script>
    <script src="bower_components/underscore/underscore.js"></script>
    <script src="js/controllers/mainCtrl.js"></script>
    <script src="js/services/searchService.js"></script>
    <script src="js/services/pagerService.js"></script>
    <script src="js/mdhs.js"></script>
    
    
</head>
<body>
	
  <a class="usa-skipnav" href="#main-content">Skip to main content</a>
  <header class="usa-header usa-header-basic-megamenu" role="banner">
    <div class="usa-nav-container">
      <div class="usa-navbar">
        <button class="usa-menu-btn">Menu</button>
        
          	<div class="usa-image-block">
            	<a href="#" accesskey="1" title="Home" aria-label="Home"><img src="img/mdhs_logo.png" alt="Mississippi Department Of Health Services" ></a>
        	</div>	
          
      
      </div>
      <nav role="navigation" class="usa-nav">
        <div class="usa-nav-inner">
          
          <ul class="usa-nav-primary usa-accordion">
                      
            <li>
              <a class="usa-nav-link" href="#">
                <span>Home</span>
              </a>
            </li>
          </ul>
          <form class="usa-search usa-search-small">
            <div role="search">
              <label class="usa-sr-only" for="search-field-small">Search small</label>
              <input id="search-field-small" type="search" name="search">
              <button type="submit">
                <span class="usa-sr-only">Search</span>
              </button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </header>
  <div class="usa-overlay"></div>
  <main id="main-content" class="usa-grid-full">

  	<form class="usa-form" ng-submit="search()">
  	<fieldset>	

  	<label for="input-type-text">Provider Name</label>
  	<input id="input-type-text" name="input-type-text" type="text" ng-model="searchData.provider_name">	
    <label for="providerType">Provider Type</label>
    <select name="provider_type" id="providerType" ng-model="searchData.provider_type">
      <option ng-repeat="provider in providerType" value="{{provider.type}}">{{provider.description}}</option>
      <option value="">Select Provider</option>
    </select>
    <label for="County">County</label>
    <select name="county" id="County" ng-model="searchData.county" ng-change="loadCities(searchData.county)">
      <option ng-repeat="county in counties" value="{{county.id}}">{{county.name}}</option>
      <option value="">Select County</option>
    </select>
    <label for="City">City</label>
    <select name="city" id="City" ng-model="searchData.city">
      <option ng-repeat="city in cities" value="{{city.city}}">{{city.city}}</option>
      <option value="">Select City</option>
    </select>
    
    <label for="starRatings">Quality Star Ratings</label>
    <select name="star_ratings" id="starRatings" ng-model ="searchData.rating">
      <option ng-repeat="rating in ratings" value="{{rating.rating}}">{{rating.description}}</option>
    </select>
     <div class="usa-input-error-message" ng-if="errorMsg">{{errorMsg}}</div>
    </fieldset>
    <input type="submit" value="Search" />
  </form>

  <h6>Child Care Providers</h6>

  <table class="usa-table-borderless">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Ratings</th>
      </tr>
    </thead>
    <tbody>
      <tr ng-repeat="result in items">
        <th scope="row">{{result.name}}</th>
        <td>{{result.phone_no}}</td>
        <td>{{result.quality_rating}}</td>
      </tr>

      <tr ng-if="items.length < 1">
        <td colspan="3"><h6>No Result Found!</h6></td>
      </tr>
      
    </tbody>
  </table>
  
  <!-- pager -->
  <nav aria-label="Page navigation" ng-if="pager.pages.length">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" ng-click="setPage(pager.currentPage - 1)" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item" ng-repeat="page in pager.pages"><a ng-class="{active:pager.currentPage === page}" class="page-link" ng-click="setPage(page)">{{page}}</a></li>
    <li class="page-item">
      <a class="page-link" ng-click="setPage(pager.totalPages)" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
        
  </main>

  <footer class="usa-footer usa-footer-big" role="contentinfo">
    <div class="usa-grid usa-footer-return-to-top">
      <a href="#">Return to top</a>
    </div>
    <div class="usa-footer-primary-section">
      <div class="usa-grid-full">
        
    </div>

  </footer>

</body>
</html>
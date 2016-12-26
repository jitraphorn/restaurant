app.service('dataService', function($http) {
  return {
    getData: function(url){
      return $http.get(url).then(function(response){
        return response;
      }, function(error){
        return error;
      });
    },
    postData: function(url,jsondata){
      return $http.post(url,jsondata).then(function(response){
        return response;
      }, function(error){
        return error;
      });
    }
  }
});
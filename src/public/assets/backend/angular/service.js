app.service('dataService', function($http,API_URL) {
  return {
    // getData: function(url){
    //   return $http.get(url).then(function(response){
    //     return response;
    //   }, function(error){
    //     return error;
    //   });
    // },
    // postData: function(url,jsondata){
    //   return $http.post(url,jsondata).then(function(response){
    //     return response;
    //   }, function(error){
    //     return error;
    //   });
    // }

    //- getData
    getData: function(api){
      return $http.get(API_URL+api)
        .then(getDataComplete)
        .catch(getDataFailed);

      function getDataComplete(response){
        return response;
      }

      function getDataFailed(error){
        $log.error('XHR failed for getData.'+ error);
      }
    },

//- postData
    postData: function(api,data){
      delete data.$$hashKey;
      return $http({
        method:'POST',
        url:API_URL+api,
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        data:$.param(data)
      });
    }
  }
});
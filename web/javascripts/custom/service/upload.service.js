(function (angular) {
    angular.module('test').factory('uploadService', Service);

    Service.$inject = [ '$http', '$q' ];

    function Service($http, $q) {
        var self = this;

        var factory = {
            'upload': function (data) {
                var defer = $q.defer();
                var promise = $http.post('/api/upload', data);
                promise.success(function (response) {
                    defer.resolve(response);
                });

                return defer.promise;
            }
        };

        return factory;
    }
})(angular);
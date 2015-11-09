(function (angular) {
    angular.module('test').controller('indexController', Controller);

    Controller.$inject = [
        '$scope', 'uploadService'
    ];

    function Controller($scope, uploadService) {
        var fileInput = angular.element(document.querySelector('#upload-input'));
        var uploader = {};

        this.uploadedFiles = [];
        var self = this;
        this.uploadForm = {};

        this.model = { 'file': {} };

        fileInput.on('change', function (event) {
            var fileReader = new FileReader();
            fileReader.onload = function () {
                self.model.file = fileReader.result;
            };
            fileReader.readAsBinaryString(this.files[0]);
            var temp = this.files[0].name;
            self.model.name = temp.split('.').pop();
        });

        this.upload = function () {
            var promise = uploadService.upload(self.model);
            promise.then(function (response) {
                self.uploadedFiles.unshift(response);
            });
        };

    }
})(angular);
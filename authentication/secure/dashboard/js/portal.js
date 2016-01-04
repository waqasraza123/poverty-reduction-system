var app = angular.module('app', ['formly', 'formlyBootstrap', 'ui.bootstrap', 'ngIntlTelInput','ngFileUpload','flow']);

//app.config(function config(formlyConfigProvider) {
//        // set templates here
//        formlyConfigProvider.setType({
//            name: 'fileupload',
//            templateUrl: 'fileupload.html'
//        });
//    })
    //app.config(['flowFactoryProvider', function (flowFactoryProvider) {
    //    flowFactoryProvider.defaults = {
    //        target: './modules/school_renovation/profile_photo',
    //       permanentErrors: [404, 500, 501],
    //    maxChunkRetries: 1,
    //    chunkRetryInterval: 5000,
    //    simultaneousUploads: 4,
    //    singleFile: true
    //    };
    //    flowFactoryProvider.on('catchAll', function (event) {
    //    console.log('catchAll', arguments);
    //  });
    // You can also set default events:
    //    flowFactoryProvider.on('catchAll', function (event) {
    //      ...
    //    });
    // Can be used with different implementations of Flow.js
    // flowFactoryProvider.factory = fustyFlowFactory;

app.controller('mainController', function (formlyVersion, $uibModal, $scope, $http, $window) {

    var vm = this;
    // funcation assignment
    //    vm.edit = edit;
    //    $scope.loaded=false;
    $scope.portalitems = [];
    var temp;
    $scope.usernamef;
    $scope.fields = [];
    $scope.model = {};
    $http.get("./php/getjson.php")
        .then(function (response) {
            localStorage.setItem("user_details", JSON.stringify(response.data.user_details))
            window.console.log(response.data.user_details);
            $scope.userdata = localStorage.getItem("user_details");
    
    temp = JSON.parse($scope.userdata);
    $scope.usernamef = temp.firstname + " " + temp.lastname;
            window.console.log($scope.usernamef );
    $scope.fields = [];
    $scope.model = {};
        });

    
    $scope.logout = function () {
        $http({
            method: 'POST',
            url: './php/logout.php',
            data: $scope.userdata
        }).success(function (data) {
            if (data.success == 1) {
                localStorage.clear();
                $window.location.href = './index.php';
                //                $location.path();
            } else {

            }
            window.console.log(data);
        });
    }
    $scope.register = function (url, pname) {
        window.console.log(url);
        $http({
            method: 'POST',
            url: './php/openmodule.php',
            data: {
                "url": url
            }
        }).success(function (data) {
            window.console.log(data);
            if (data.success == 1) {
                if (data.redirect != null)
                    $window.location.href = data.redirect;
                else {
                    var user = JSON.parse($scope.userdata);
                    $scope.moduler = data.name;
                    $scope.fields = data.fields;
                    if (data.fields == null) {
                        //                        $window.location.href = "./modules/"+url; 
                        //                        $scope.postsignup();
                        $scope.doentry(url);
                        return;
                    }
                    var result = $uibModal.open({
                        templateUrl: 'myModalContent.html',
                        controller: 'ModalInstanceCtrl',
                        controllerAs: 'vm',
                        resolve: {
                            formData: function () {
                                return {
                                    fields: $scope.fields,
                                    model: {
                                        firstname: user.firstname,
                                        lastname: user.lastname,
                                        email: user.email,
                                        username: user.username
                                    },
                                    title: pname,
                                    url: url
                                };
                            }
                        }
                    }).result;
                }
                //                window.console.log();
            } else {

            }
            window.console.log(data);

        })

    }
    $scope.doentry = function (url) {
        $http({
            method: 'POST',
            url: './php/add_module_reg.php',
            data: {
                url: url,
                fields: {}
            }
        }).success(function (data) {
            if (data.success == 1) {
                $window.location.href = data.url;
                window.console.log(data.url);
            } else {

            }

            $uibModalInstance.close(vm.formData.model);
        });
    }
});

app.controller('ModalInstanceCtrl', function ($scope, $http, $window, $uibModalInstance, formData, $timeout, $compile, Upload) {
    var vm = this;
    vm.formData = formData;
    vm.originalFields = angular.copy(vm.formData.fields);
    $scope.moduler = vm.formData.title;
    // function assignment
    vm.regerror = "";
    vm.serverer = false;
    vm.ok = ok;
    vm.cancel = cancel;
    $scope.postsignup = function () {
            $http({
                method: 'POST',
                url: './php/add_module_reg.php',
                data: {
                    url: vm.formData.url,
                    fields: vm.formData.model
                }
            }).success(function (data) {
                window.console.log(data);
                if (data.success == 1) {
                    $window.location.href = data.url;
                    window.console.log(data.url);
                } else {
                    vm.regerror = "Error :" + data.errors;
                    vm.serverer = true;
                }

                $uibModalInstance.close(vm.formData.model);
            });
        }
        // variable assignment

    // function definition
    function ok() {
        $scope.postsignup();

    }

    function cancel() {
        vm.formData.options.resetModel();
        $uibModalInstance.dismiss('cancel');
    }
    $scope.onChange = function (files) {
        if (files[0] == undefined) return;
        $scope.fileExt = files[0].name.split(".").pop()
    }

    $scope.isImage = function (ext) {
        if (ext) {
            return ext == "jpg" || ext == "jpeg" || ext == "gif" || ext == "png"
        }
    }
});
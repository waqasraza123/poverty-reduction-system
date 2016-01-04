var app = angular.module('app', ['formly', 'formlyBootstrap', 'ui.bootstrap','ngIntlTelInput']);
app.config(function (ngIntlTelInputProvider) {
    ngIntlTelInputProvider.set({defaultCountry: 'us'});
  });
app.controller('mainController', function (formlyVersion, $uibModal, $scope, $http, $window) {

    var vm = this;
    // funcation assignment
    //    vm.edit = edit;
    //    $scope.loaded=false;
    $scope.portalitems = [];
    $scope.userdata = localStorage.getItem("user_details");
    $scope.fields = [];
    $scope.model = {};
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
    $scope.register = function (url,pname) {
        window.console.log(url);
        $http({
            method: 'POST',
            url: './php/openmodule.php',
            data: {
                "url": url
            }
        }).success(function (data) {
            if (data.success == 1) {
                if(data.redirect!=null)
                    $window.location.href=data.redirect;
                else{
                var user=JSON.parse(localStorage.getItem("user_details"));
                $scope.moduler=data.name;
                $scope.fields = data.fields;
                    if(data.fields==null){
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
                                model:{firstname:user.firstname,lastname:user.lastname,email:user.email,username:user.username},
                                title:pname,
                                url:url
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
    $scope.doentry=function(url){
        $http({
            method: 'POST',
            url: './php/add_module_reg.php',
            data: {url:url,fields:{}}
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

app.controller('ModalInstanceCtrl', function ($scope,$http,$window,$uibModalInstance, formData) {
    var vm = this;
     vm.formData = formData;
    vm.originalFields = angular.copy(vm.formData.fields);
    $scope.moduler=vm.formData.title;
    // function assignment
    vm.ok = ok;
    vm.cancel = cancel;
    $scope.postsignup = function () {
        $http({
            method: 'POST',
            url: './php/add_module_reg.php',
            data: {url:vm.formData.url,fields:vm.formData.model}
        }).success(function (data) {
            if (data.success == 1) {
               $window.location.href = data.url; 
                window.console.log(data.url);
            } else {

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
});
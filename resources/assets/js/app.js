var app = angular.module('tasksApp', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('tasksController', function ($scope, $http) {

    $scope.tasks = [];
    $scope.employers = [];
    $scope.lastpage = 1;
    $scope.loading = false;

    $scope.init = function () {
        $scope.loading = true;

        $http.get('/api/employers').success(function (data, status, headers, config) {
            $scope.employers = data;
            $scope.loading = false;
        });

        $http({
            url: '/api/tasks',
            method: "GET",
            params: {page: $scope.lastpage}
        }).success(function (data, status, headers, config) {
            $scope.tasks = data.data;
            $scope.loading = false;
            $scope.currentpage = data.current_page;
        });



    }

    $scope.addTask = function () {
        $scope.loading = true;

        $http.post('/api/tasks', {
            title: $scope.task.title,
            status: $scope.task.status
        }).success(function (data, status, headers, config) {
            $scope.tasks.push(data);
            $scope.task = '';
            $scope.loading = false;

        });
    };

    $scope.updateTask = function (task) {
        $scope.loading = true;

        $http.put('/api/tasks/' + task.id, {
            title: task.title,
            status: task.status
        }).success(function (data, status, headers, config) {
            task = data;
            $scope.loading = false;

        });
        ;
    };

    $scope.deleteTask = function (index) {
        $scope.loading = true;

        var task = $scope.tasks[index];

        $http.delete('/api/tasks/' + task.id)
                .success(function () {
                    $scope.tasks.splice(index, 1);
                    $scope.loading = false;
                });
        ;
    };



    $scope.loadMore = function () {
        $scope.lastpage += 1;
        $http({
            url: '/api/tasks',
            method: "GET",
            params: {page: $scope.lastpage}
        }).success(function (data, status, headers, config) {
            $scope.tasks = $scope.tasks.concat(data.data);
        });
    };

    $scope.init();
});
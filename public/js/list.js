var app = angular.module('tasksApp', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('tasksController', function ($scope, $http) {

    $scope.tasks = [];
    $scope.employers = [];
    $scope.statuses = [
        {name: 'Open', value: 'open'},
        {name: 'Closed', value: 'closed'}
    ];

    $scope.current_page = 1;
    $scope.api_token = angular.element(document.querySelector('#api_token')).val();
    $scope.loading = false;

    $scope.init = function () {
        $scope.loading = true;
        if (angular.element(document.querySelector('#taskEmployers')).length) {
            $http({
                url: '/api/employers',
                method: "GET",
                params: {api_token: $scope.api_token}
            }).success(function (data, status, headers, config) {
                $scope.employers = data;
                $scope.loading = false;
            });
        }

        $http({
            url: '/api/tasks',
            method: "GET",
            params: {page: $scope.current_page, api_token: $scope.api_token}
        }).success(function (data, status, headers, config) {
            $scope.tasks = data.data;
            $scope.loading = false;
            $scope.current_page = data.current_page;
        });

    }

    $scope.createTask = function () {
        $scope.loading = true;

        $http.post('/api/tasks?api_token=' + $scope.api_token, {
            title: $scope.task.title,
            description: $scope.task.description,
            user: $scope.task.user,
            status: $scope.task.status,
            close_date: $scope.task.close_date
        }).success(function (data, status, headers, config) {
            $scope.tasks.push(data);
            $scope.task = '';
            $scope.loading = false;

        });
    };

    $scope.updateTask = function (task) {
        $scope.loading = true;

        $http.put('/api/tasks/' + task.id + '?api_token=' + $scope.api_token, {
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

        $http.delete('/api/tasks/' + task.id + '?api_token=' + $scope.api_token)
                .success(function () {
                    $scope.tasks.splice(index, 1);
                    $scope.loading = false;
                });
        ;
    };

    $scope.loadMore = function () {
        $scope.current_page += 1;
        $http({
            url: '/api/tasks',
            method: "GET",
            params: {page: $scope.current_page, api_token: $scope.api_token}
        }).success(function (data, status, headers, config) {
            $scope.tasks = $scope.tasks.concat(data.data);
        });
    };

    $scope.init();
});
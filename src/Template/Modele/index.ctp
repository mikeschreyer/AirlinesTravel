<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset="ISO-8859-1">
    <title>Modele CRUD</title>
    <script
        src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js">
    </script>
    <script src="webroot/js/modele/index.js"></script>
    <style>
        a {
            cursor: pointer;
        }
    </style>
</head>
<body>
<div ng-controller="ModeleCRUDCtrl">
    <div class="panel-heading">Modele avion<a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
    <div class="panel-body none formData" id="addForm">
        <h2 id="actionLabel">Add modele avion</h2>
        <form class="form" id="modeleAddForm" enctype='application/json'>
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" ng-model="modele.name" />
            </div>
            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
            <a href="javascript:void(0);" class="btn btn-success" ng-click="addModele(modele.name)">Add modele</a>
            <!-- input type="submit" class="btn btn-success" id="addButton" value="Add modele" -->
        </form>
    </div>

    <div class="panel-body none formData" id="editForm">
        <h2 id="actionLabel">Edit modele avion</h2>
        <form class="form" id="modeleEditForm" enctype='application/json'>
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="nameEdit" ng-model="modele.name" />
            </div>
            <input type="hidden" class="form-control" name="id" id="idEdit"/>
            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
            <a href="javascript:void(0);" class="btn btn-success" ng-click="updateModele(modele.id,modele.name)">Update modele</a>
        </form>
    </div>


    <br /> <br />
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>
    <br />
    <br />
    <table>
        <thead>
            <tr>
                <th class="text-align-center">ID</th>
                <th class="width-30-pct">Name</th>
                <th class="text-align-center">Action</th>
            </tr>
        </thead>
        <tbody ng-init="getAllModele()">
            <tr ng-repeat="unModele in modele">
                <td>{{unModele.id}}</td>
                <td>{{unModele.name}}</td>
                <td>
                    <a href="javascript:void(0);" class="glyphicon glyphicon-edit"  ng-click="getModele(unModele.id)" onclick="$('#editForm').slideDown();"></a>
                    <a href="javascript:void(0);" class="glyphicon glyphicon-trash" ng-click="deleteModele(unModele.id)" onclick="$('#editForm').slideDown();"></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>

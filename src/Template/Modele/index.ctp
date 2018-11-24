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
	background-color: lightblue;
}
</style>
</head>
<body>
	<div ng-controller="ModeleCRUDCtrl">
			<table>
				<tr>
					<td width="100">ID:</td>
					<td><input type="text" id="id" ng-model="modele.id" /></td>
				</tr>
				<tr>
					<td width="100">Name:</td>
					<td><input type="text" id="name" ng-model="modele.name" /></td>
				</tr>
			</table>
			<br /> <br />
			<a ng-click="getModele(modele.id)">Get Modele</a>
			<a ng-click="updateModele(modele.id,modele.name)">Update modele</a>
			<a ng-click="addModele(modele.name)">Add Modele</a>
			<a ng-click="deleteModele(modele.id)">Delete Modele</a>

		<br /> <br />
		<p style="color: green">{{message}}</p>
		<p style="color: red">{{errorMessage}}</p>

		<br />
		<br />
		<a ng-click="getAllModeles()">Get all Modeles</a><br />
		<br /> <br />
		<div ng-repeat="unModele in modele">
			{{unModele.id}} {{unModele.name}}
		</div>
	</div>
</body>
</html>

{
	"info": {
		"_postman_id": "d9611488-4c01-4eba-b174-9e7b93b6f931",
		"name": "API Departamentos",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "30197727"
	},
	"item": [
		{
			"name": "Obtener todos los departamentos",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "https://helios-backend.duckdns.org/api/departments",
					"protocol": "https",
					"host": [
						"helios-backend",
						"duckdns",
						"org"
					],
					"path": [
						"api",
						"departments"
					]
				}
			},
			"response": []
		},
		{
			"name": "Obtener un departamento por ID",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "https://helios-backend.duckdns.org/api/departments/1",
					"protocol": "https",
					"host": [
						"helios-backend",
						"duckdns",
						"org"
					],
					"path": [
						"api",
						"departments",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "Crear un nuevo departamento",
			"request": {
				"method": "POST",
				"header": [
					{
						"key": "Content-Type",
						"value": "application/json"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n    \"name\": \"Departamento de Tecnolog\\u00eda\",\n    \"ambassador_name\": \"John Doe\",\n    \"parent_id\": null\n}"
				},
				"url": {
					"raw": "https://helios-backend.duckdns.org/api/departments",
					"protocol": "https",
					"host": [
						"helios-backend",
						"duckdns",
						"org"
					],
					"path": [
						"api",
						"departments"
					]
				}
			},
			"response": []
		},
		{
			"name": "Actualizar un departamento",
			"request": {
				"method": "PUT",
				"header": [
					{
						"key": "Content-Type",
						"value": "application/json"
					}
				],
				"body": {
					"mode": "raw",
					"raw": "{\n    \"name\": \"Departamento de Innovaci\\u00f3n\",\n    \"ambassador_name\": \"Jane Smith\"\n}"
				},
				"url": {
					"raw": "https://helios-backend.duckdns.org/api/departments/1",
					"protocol": "https",
					"host": [
						"helios-backend",
						"duckdns",
						"org"
					],
					"path": [
						"api",
						"departments",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "Eliminar un departamento",
			"request": {
				"method": "DELETE",
				"header": [],
				"url": {
					"raw": "https://helios-backend.duckdns.org/api/departments/2",
					"protocol": "https",
					"host": [
						"helios-backend",
						"duckdns",
						"org"
					],
					"path": [
						"api",
						"departments",
						"2"
					]
				}
			},
			"response": []
		},
		{
			"name": "Obtener subdepartamentos",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "https://helios-backend.duckdns.org/api/departments/1/subdepartments",
					"protocol": "https",
					"host": [
						"helios-backend",
						"duckdns",
						"org"
					],
					"path": [
						"api",
						"departments",
						"1",
						"subdepartments"
					]
				}
			},
			"response": []
		}
	]
}

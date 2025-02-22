# Documentación de la API: Departamentos

## URL Base
La base URL de la API es:
```
https://helios-backend.duckdns.org/api
```
## Colección de Postman
El proyecto incluye un archivo json para usar en Postman

## Instrucciones para levantar el proyecto

1. Clonar el repositorio:
   ```sh
   git clone https://github.com/itsasy/helios-backend.git
   cd helios-backend
   ```
2. Instalar dependencias:
   ```sh
   composer install
   ```
3. Configurar el archivo de entorno:
   ```sh
   cp .env.example .env
   ```
4. Generar la clave de la aplicación:
   ```sh
   php artisan key:generate
   ```
5. Configurar la base de datos en el archivo `.env`.
6. Ejecutar las migraciones y seeders:
   ```sh
   php artisan migrate --seed
   ```
7. Iniciar el servidor:
   ```sh
   php artisan serve
   ```

---

## Endpoints

### 1. Obtener todos los departamentos
**Endpoint:**
```http
GET /departments
```
**Descripción:**
Obtiene una lista de todos los departamentos.

**Parámetros opcionales:**
- `search` (string): Filtra departamentos por nombre.
- `parent_id` (int): Filtra por el ID del departamento padre.
- `level` (int): Filtra por nivel del departamento.

**Ejemplo de solicitud:**
```http
GET /departments?search=Tecnologia&level=2
```

**Respuesta exitosa (200 OK):**
```json
{
  "data": [
    {
      "id": 1,
      "name": "Marco Hoeger",
      "level": 2,
      "employees_count": 72,
      "total_employees": 100,
      "ambassador_name": "Janessa Rau",
      "parent_id": null,
      "parent_name": null,
      "subDepartments_count": 3
    }
  ]
}
```

---

### 2. Obtener un departamento por ID
**Endpoint:**
```http
GET /departments/{id}
```
**Descripción:**
Obtiene los detalles de un departamento específico.

**Parámetros:**
- `id` (int, requerido) - ID del departamento a consultar.

**Respuesta exitosa (200 OK):**
```json
{
  "data": {
    "id": 1,
    "name": "Marco Hoeger",
    "level": 2,
    "employees_count": 72,
    "total_employees": 100,
    "ambassador_name": "Janessa Rau",
    "parent_id": null,
    "parent_name": null,
    "subDepartments_count": 3
  }
}
```

**Respuesta de error (404 Not Found):**
```json
{
  "message": "Departamento no encontrado"
}
```

---

### 3. Crear un nuevo departamento
**Endpoint:**
```http
POST /departments
```
**Descripción:**
Crea un nuevo departamento.

**Cuerpo de la solicitud (JSON):**
```json
{
  "name": "Departamento de Tecnología",
  "ambassador_name": "John Doe",
  "parent_id": null
}
```

**Respuesta exitosa (201 Created):**
```json
{
  "data": {
    "id": 2,
    "name": "Departamento de Tecnología",
    "level": 1,
    "employees_count": 50,
    "total_employees": 50,
    "ambassador_name": "John Doe",
    "parent_id": null,
    "parent_name": null,
    "subDepartments_count": 0
  }
}
```

**Respuesta de error (422 Unprocessable Entity):**
```json
{
  "message": "Error de validación",
  "errors": {
    "name": ["El nombre es obligatorio"]
  }
}
```

---

### 4. Actualizar un departamento
**Endpoint:**
```http
PUT /departments/{id}
```
**Descripción:**
Actualiza la información de un departamento existente.

**Parámetros:**
- `id` (int, requerido) - ID del departamento a actualizar.

**Cuerpo de la solicitud (JSON):**
```json
{
  "name": "Departamento de Innovación",
  "ambassador_name": "Jane Smith"
}
```

**Respuesta exitosa (200 OK):**
```json
{
  "data": {
    "id": 2,
    "name": "Departamento de Innovación",
    "level": 2,
    "employees_count": 60,
    "total_employees": 80,
    "ambassador_name": "Jane Smith",
    "parent_id": null,
    "parent_name": null,
    "subDepartments_count": 0
  }
}
```

**Respuesta de error (404 Not Found):**
```json
{
  "message": "Departamento no encontrado"
}
```

---

### 5. Eliminar un departamento
**Endpoint:**
```http
DELETE /departments/{id}
```
**Descripción:**
Elimina un departamento existente.

**Parámetros:**
- `id` (int, requerido) - ID del departamento a eliminar.

**Respuesta exitosa (204 No Content):**
Sin contenido.

**Respuesta de error (404 Not Found):**
```json
{
  "message": "Departamento no encontrado"
}
```

---

### 6. Obtener subdepartamentos de un departamento
**Endpoint:**
```http
GET /departments/{id}/subdepartments
```
**Descripción:**
Obtiene la lista de subdepartamentos asociados a un departamento.

**Parámetros:**
- `id` (int, requerido) - ID del departamento padre.

**Respuesta exitosa (200 OK):**
```json
{
  "data": [
    {
      "id": 11,
      "name": "Vivian Daniel III",
      "parent_id": 1,
      "level": 5,
      "employees_count": 41,
      "total_employees": 60,
      "ambassador_name": "Zora Macejkovic",
      "created_at": "2025-02-21T08:13:03.000000Z",
      "updated_at": "2025-02-21T08:13:03.000000Z"
    }
  ]
}
```

**Respuesta de error (404 Not Found):**
```json
{
  "message": "Departamento no encontrado"
}
```

---

## Notas
- Los datos devueltos en las respuestas están dentro de la clave `data`.


# Laravel Prueba tecnica FullStack

A continuacion tenemos una secuencia de pasos para el uso de la aplicacion

## Instalacion

Crear Base de datos llamada prueba_tecnica_laravel
```
Configurar .ENV
DB_HOST=127.0.0.1
DB_PORT=3306
DB_USERNAME=
DB_PASSWORD=
```
Migrar las Tablas y ejecutar las semillas
```
php artisan migrate
php artisan db:seed
```
## USO
Credenciales Admin
```
correo : admin@admin.com
contraseña: admin
```

## CORREO
Enviar cola de emails
```
php artisan queue:work  
```
# API
A continuación tenemos una secuencia de peticiones que se utilizarán para probar la API.
## Obtener la lista de todos los emails

```
GET /api/emails

200
{
"data": [
        {
            "id": 1,
            "asunto": "Hola",
            "mensaje": "COmo estas",
            "destinatario": "asd@asda.cpm",
            "estado": "Enviado",
            "remitente": {
                "id": 1,
                "email": "admin@admin.com",
                "email_verified_at": null,
                "nombre": "Admin",
                "numero": "0987654321",
                "cedula": "18765432123",
                "fecha_nacimiento": "1999-05-14",
                "ciudad": "Ambato",
                "created_at": "2021-04-24T19:20:00.000000Z",
                "updated_at": "2021-04-24T19:20:00.000000Z",
                "edad": 21
            }
        },
        ],
    "links": {
        "first": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
        "last": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Anterior",
                "active": false
            },
            {
                "url": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Siguiente &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost/prueba_tecnica_laravel/public/api/emails",
        "per_page": 10,
        "to": 2,
        "total": 2
    }
}
```

## Obtener la lista de emails filtrado por remitente

```
GET api/emails?remitente=admin@admin.com

200 
{
    "data": [
        {
            "id": 1,
            "asunto": "Hola",
            "mensaje": "COmo estas",
            "destinatario": "asd@asda.cpm",
            "estado": "Enviado",
            "remitente": {
                "id": 1,
                "email": "admin@admin.com",
                "email_verified_at": null,
                "nombre": "Admin",
                "numero": "0987654321",
                "cedula": "18765432123",
                "fecha_nacimiento": "1999-05-14",
                "ciudad": "Ambato",
                "created_at": "2021-04-24T19:20:00.000000Z",
                "updated_at": "2021-04-24T19:20:00.000000Z",
                "edad": 21
            }
        },
        
    ],
    "links": {
        "first": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
        "last": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Anterior",
                "active": false
            },
            {
                "url": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Siguiente &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost/prueba_tecnica_laravel/public/api/emails",
        "per_page": 10,
        "to": 2,
        "total": 2
    }
}
```
## Obtener la lista de emails filtrado por destinatario

```
GET api/emails?destinatario=asd@asda.cpm

200 
{
    "data": [
        {
            "id": 1,
            "asunto": "Hola",
            "mensaje": "COmo estas",
            "destinatario": "asd@asda.cpm",
            "estado": "Enviado",
            "remitente": {
                "id": 1,
                "email": "admin@admin.com",
                "email_verified_at": null,
                "nombre": "Admin",
                "numero": "0987654321",
                "cedula": "18765432123",
                "fecha_nacimiento": "1999-05-14",
                "ciudad": "Ambato",
                "created_at": "2021-04-24T19:20:00.000000Z",
                "updated_at": "2021-04-24T19:20:00.000000Z",
                "edad": 21
            }
        },
        
    ],
    "links": {
        "first": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
        "last": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Anterior",
                "active": false
            },
            {
                "url": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Siguiente &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost/prueba_tecnica_laravel/public/api/emails",
        "per_page": 10,
        "to": 2,
        "total": 2
    }
}
```
## Obtener la lista de emails filtrado por asunto

```
GET api/emails?asunto=Hola

200 
{
    "data": [
        {
            "id": 1,
            "asunto": "Hola",
            "mensaje": "COmo estas",
            "destinatario": "asd@asda.cpm",
            "estado": "Enviado",
            "remitente": {
                "id": 1,
                "email": "admin@admin.com",
                "email_verified_at": null,
                "nombre": "Admin",
                "numero": "0987654321",
                "cedula": "18765432123",
                "fecha_nacimiento": "1999-05-14",
                "ciudad": "Ambato",
                "created_at": "2021-04-24T19:20:00.000000Z",
                "updated_at": "2021-04-24T19:20:00.000000Z",
                "edad": 21
            }
        },
        
    ],
    "links": {
        "first": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
        "last": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Anterior",
                "active": false
            },
            {
                "url": "http://localhost/prueba_tecnica_laravel/public/api/emails?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Siguiente &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost/prueba_tecnica_laravel/public/api/emails",
        "per_page": 10,
        "to": 2,
        "total": 2
    }
}
```
## Obtener lista de emails cambiar numero de paginado
Se debe agregar a cualquiera de las url anteriores el parametro paginate y el valor

```
GET api/emails?paginate=1
GET api/emails?remitente=admin@admin.com?paginate=1
GET api/emails?destinatario=admin@admin.com?paginate=1
GET api/emails?asunto=Hola?paginate=1

200 
{
    "data": [
        {
            "id": 1,
            "asunto": "Hola",
            "mensaje": "COmo estas",
            "destinatario": "asd@asda.cpm",
            "estado": "Enviado",
            "remitente": {
                "id": 1,
                "email": "admin@admin.com",
                "email_verified_at": null,
                "nombre": "Admin",
                "numero": "0987654321",
                "cedula": "18765432123",
                "fecha_nacimiento": "1999-05-14",
                "ciudad": "Ambato",
                "created_at": "2021-04-24T19:20:00.000000Z",
                "updated_at": "2021-04-24T19:20:00.000000Z",
                "edad": 21
            }
        }
    ],
    "links": {
        "first": "http://localhost/prueba_tecnica_laravel/public/api/emails?paginate=1&page=1",
        "last": "http://localhost/prueba_tecnica_laravel/public/api/emails?paginate=1&page=2",
        "prev": null,
        "next": "http://localhost/prueba_tecnica_laravel/public/api/emails?paginate=1&page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 2,
        "links": [
            {
                "url": null,
                "label": "&laquo; Anterior",
                "active": false
            },
            {
                "url": "http://localhost/prueba_tecnica_laravel/public/api/emails?paginate=1&page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://localhost/prueba_tecnica_laravel/public/api/emails?paginate=1&page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://localhost/prueba_tecnica_laravel/public/api/emails?paginate=1&page=2",
                "label": "Siguiente &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost/prueba_tecnica_laravel/public/api/emails",
        "per_page": "1",
        "to": 1,
        "total": 2
    }
}
```
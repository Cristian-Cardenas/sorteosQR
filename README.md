# 🎟️ SorteosQR: Plataforma de Gestión y Análisis de Sorteos con Código QR

[![Laravel v10.x](https://img.shields.io/badge/Laravel-10-red?style=flat-square&logo=laravel)](https://laravel.com/)
[![Filament](https://img.shields.io/badge/Filament%20PHP-Admin%20Panel-39b1a5?style=flat-square&logo=laravel)](https://filamentphp.com/)
[![PHP v8.2+](https://img.shields.io/badge/PHP-8.2+-blue?style=flat-square&logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/Database-MySQL-orange?style=flat-square&logo=mysql)](https://www.mysql.com/)

## 💡 Descripción del Proyecto

**SorteosQR** es una plataforma robusta diseñada para la **gestión integral de sorteos** asociados a tiendas físicas. Su funcionalidad principal radica en la asignación de **Códigos QR únicos** a cada tienda para facilitar el registro de clientes y en la posterior **generación de ganadores aleatorios**.

El proyecto demuestra la capacidad de crear sistemas transaccionales seguros y herramientas de análisis de datos a través de **Laravel y Filament**, enfocándose en la **seguridad** y la **visibilidad de datos**.

## 🔑 Habilidades Clave Demostradas

Este repositorio pone en valor tus competencias en las siguientes áreas:

* **Desarrollo con Filament:** Experiencia en la creación de paneles de administración completos (Resources, Forms, Tables) para gestionar modelos de datos complejos (Tiendas, Sorteos, Premios, Participantes).
* **Análisis y Reportes de Datos:** Implementación de vistas y lógica para generar **estadísticas generales y específicas por sorteo**. Esto incluye métricas como la tasa de participación, el número total de inscritos, la distribución de premios, etc.
* **Lógica de Sorteo y Aleatoriedad:** Desarrollo de un algoritmo de selección de ganadores que es **aleatorio** y **sin repeticiones**, garantizando la equidad del sorteo.
* **Seguridad y Anti-Fraude:** Desarrollo de medidas de seguridad cruciales, tales como:
    * **Validación de Unicidad:** Bloqueo de registros duplicados por el mismo usuario en el mismo sorteo.
    * **URL de QR Dinámicas/Seguras:** Generación y gestión de URLs únicas para el registro, evitando manipulaciones externas.
* **Manejo de Relaciones Complejas:** Modelado y gestión de las relaciones entre **Tiendas**, **Sorteos**, **Premios** y **Participantes** con Eloquent ORM.

## 🎯 Flujo de la Plataforma

El sistema sigue un flujo de trabajo claro a través del panel de administración de Filament:

1.  **Creación de Tiendas y Sorteos:** Definición de tiendas y configuración de sorteos con sus respectivos premios.
2.  **Generación de QR Único:** Se crea un código QR para cada tienda, asociado a la URL de registro.
3.  **Registro de Clientes:** El cliente escanea el QR, accede al formulario e ingresa sus datos (el sistema identifica automáticamente la tienda y el sorteo).
4.  **Selección de Ganadores:** Un botón en el panel de Filament ejecuta la lógica que selecciona **aleatoriamente** al número exacto de ganadores.
5.  **Visualización de Estadísticas:** El sistema ofrece paneles de resumen con métricas clave del rendimiento de todos los sorteos, y vistas detalladas para análisis específicos.

## 🛠️ Tecnologías Utilizadas

| Componente | Tecnología |
| :--- | :--- |
| **Backend & Core** | **Laravel 10**, PHP 8.2+ |
| **Panel de Administración** | **Filament PHP** |
| **Lógica** | Librería de **Generación de Códigos QR** |
| **Análisis de Datos** | **Consultas Agregadas** con Eloquent y MySQL |
| **Base de Datos** | MySQL |


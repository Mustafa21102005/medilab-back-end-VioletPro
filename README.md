# Medilab API (Laravel)

REST API for the Medilab medical website. It serves the public landing-page content, powers the admin panel, and stores appointment requests.

The frontend lives in a separate repository: **[medilab-frontend](https://github.com/Mustafa21102005/medilab-frontend-VioletPro)** (Vue 3).

## Features

- Content endpoints for Hero, About, Services, Departments, and Stats sections
- CRUD for doctors, departments, services, stats, and appointments
- Appointment workflow: create, edit, delete, mark as read/unread
- Image uploads (hero background, about preview, department images) on the `public` disk
- Form Request validation with JSON error responses (`422`)
- Automatic re-ordering of `order` fields (stats, services, etc.)
- Referential integrity with friendly errors:
    - A doctor can't be deleted while they have appointments
    - A department can't be deleted while it has doctors or appointments
- Seeders with demo content and images

## Tech stack

- PHP 8.4+
- Laravel
- MySQL

## Getting started

```bash
git clone https://github.com/Mustafa21102005/medilab-back-end-VioletPro.git
cd medilab-backend
composer install
cp .env.example .env
php artisan key:generate
```

Set your database credentials in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medilab
DB_USERNAME=root
DB_PASSWORD=
```

Then run:

```bash
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

The API will be available at `http://localhost:8000/api`.

> `storage:link` is required so uploaded images are publicly reachable through `/storage/...`.

## API overview

| Resource     | Endpoints                                                                                                                                                                                               |
| ------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Hero         | `GET /hero`, `POST /hero` (with `_method=PUT`), `PUT /why-choose-items/{id}`                                                                                                                            |
| About        | `GET /about`, `POST /about` (with `_method=PUT`), `PUT /about-features/{id}`                                                                                                                            |
| Services     | `GET /services`, `POST /services`, `PUT /services/{id}`, `DELETE /services/{id}`, `PUT /service-section`                                                                                                |
| Departments  | `GET /departments`, `GET /departments/{id}`, `POST /departments`, `POST /departments/{id}` (with `_method=PUT`), `DELETE /departments/{id}`, `PUT /department-section`                                  |
| Doctors      | `GET /doctors`, `POST /doctors`, `PUT /doctors/{id}`, `DELETE /doctors/{id}`                                                                                                                            |
| Stats        | `GET /stats`, `POST /stats`, `PUT /stats/{id}`, `DELETE /stats/{id}`                                                                                                                                    |
| Appointments | `GET /appointment-section`, `PUT /appointment-section`, `POST /appointments`, `PUT /appointments/{id}`, `DELETE /appointments/{id}`, `PATCH /appointments/{id}/read`, `PATCH /appointments/{id}/unread` |

Run `php artisan route:list` for the authoritative list.

### Notes

- File uploads use `multipart/form-data`. Because browsers can't send multipart bodies over a real `PUT`, the frontend sends a `POST` with `_method=PUT` (Laravel method spoofing).
- Image fields are returned as full public URLs (via `Storage::disk('public')->url()`), not raw storage paths.
- Validation errors return `422` with an `errors` object. Business-rule failures (e.g. deleting a doctor with appointments) return `422` with a `message`.

## Database rules

Foreign keys use `cascadeOnUpdate()` and `restrictOnDelete()`, so the database itself prevents orphaned records, even if a delete bypasses the controller.

## License

This project is open-sourced under the [MIT License](LICENSE).

## Author

**Mustafa Azmi Khalil** — © 2026

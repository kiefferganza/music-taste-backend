
# Music Taste Backend

Backend for voting albums for office music playlist


## Installation

Install my-project with composer

```bash
  composer install
  php artisan migrate
  php artisan db:seed --class=AdminSeeder
  php artisan db:seed 
  php artisan serve
```


# API Documentation

## Authentication
This API uses Laravel Sanctum for authentication. All protected routes require a valid authentication token.

### Register
**Endpoint:** `POST /api/register`

**Request Body:**
```json
{
  "name": "John Doe",
  "email": "admin@example.com",
  "password": "password123",
}
```

**Response:**
```json
{
    "token": "12|4rtdED9b1oClkZL5Odu2mADZrttKBF9LDcqp2Wr0cc37ed5e",
    "user": {
        "name": "John Doe",
        "email": "admin@example.com",
        "role": "user",
        "updated_at": "2025-03-26T16:45:11.000000Z",
        "created_at": "2025-03-26T16:45:11.000000Z",
        "id": 3
    }
}
```

### Login
**Endpoint:** `POST /api/login`

**Request Body:**
```json
{
  "email": "johndoe@example.com",
  "password": "password123"
}
```

**Response:**
```json
{
    "token": "13|OfOOPinlPm3ZEVh1FqbF1IpRY5iNihAa86udzpCp900e0f02",
    "user": {
        "id": 1,
        "name": "Cecilia Barrows I",
        "email": "valentin.kunde@example.com",
        "role": "admin",
        "email_verified_at": "2025-03-24T16:46:56.000000Z",
        "created_at": "2025-03-24T16:46:57.000000Z",
        "updated_at": "2025-03-24T16:46:57.000000Z"
    }
}
```

### Logout (Requires Authentication)
**Endpoint:** `POST /api/logout`

**Headers:**
```
Authorization: Bearer your-auth-token
```

**Response:**
```json
{
  "message": "Logged out successfully"
}
```

## User Endpoint (Requires Authentication)
**Endpoint:** `GET /api/user`

**Headers:**
```
Authorization: Bearer your-auth-token
```

**Response:**
```json
{
  "id": 1,
  "name": "John Doe",
  "email": "johndoe@example.com"
}
```

## Albums

### Get All Albums (Requires Authentication)
**Endpoint:** `GET /api/albums`

**Headers:**
```
Authorization: Bearer your-auth-token
```

**Response:**
```json
{
    "data": [
        {
            "id": 13,
            "name": "Dr. Christy Haley I",
            "votes": [
                {
                    "id": 27,
                    "user_id": 1,
                    "created_at": "2025-03-26T16:26:21.000000Z",
                    "updated_at": "2025-03-26T16:32:47.000000Z",
                    "album_id": 13,
                    "value": "upvote",
                    "upvotes": 1,
                    "downvotes": 0,
                    "total_votes": 1
                }
            ],
            "artist": "deserunt",
            "cover": "https://picsum.photos/seed/picsum/200/300",
            "upvotes": 1,
            "downvotes": 0,
            "total_votes": 1,
            "created_at": "2025-03-24T16:53:35.000000Z",
            "updated_at": "2025-03-24T16:53:35.000000Z"
        },
    ],
    "links": {
        "first": "http://music-taste.test/api/albums?page=1",
        "last": "http://music-taste.test/api/albums?page=1",
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
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://music-taste.test/api/albums?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://music-taste.test/api/albums",
        "per_page": 10,
        "to": 10,
        "total": 10
    }
}
```

### Vote for an Album (Requires Authentication)
**Endpoint:** `POST /api/album/{album}/vote`

**Request Body:**
```json
{
    "value": "upvote"
}
```
**Headers:**
```
Authorization: Bearer your-auth-token
```

**Response:**
```json
{
    "data": {
        "id": 12,
        "name": "Dr. Phoebe Stoltenberg PhD",
        "votes": [
            {
                "id": 28,
                "user_id": 1,
                "created_at": "2025-03-26T16:47:23.000000Z",
                "updated_at": "2025-03-26T16:47:23.000000Z",
                "album_id": 12,
                "value": "upvote",
                "upvotes": 2,
                "downvotes": 0,
                "total_votes": 2
            }
        ],
        "artist": "doloribus",
        "cover": "https://picsum.photos/seed/picsum/200/300",
        "upvotes": 1,
        "downvotes": 0,
        "total_votes": 1,
        "created_at": "2025-03-24T16:53:35.000000Z",
        "updated_at": "2025-03-24T16:53:35.000000Z"
    }
}
```

### Delete an Album (Requires Authorization & Authentication)
**Endpoint:** `DELETE /api/album/{album}`

**Headers:**
```
Authorization: Bearer your-auth-token
```

**Permissions:** The authenticated user must have permission to delete the album.

**Response:**
```json
{
  "message": "Album deleted successfully"
}
```

## Notes
- Ensure you include the `Authorization: Bearer your-auth-token` header for all protected routes.
- The `{album}` parameter in routes should be replaced with the actual album ID.
- Only authorized users can delete albums.

---

This API is built using Laravel with Sanctum authentication. Ensure you have Laravel Sanctum properly configured in your project for authentication to work as expected.


## Authors

- [@kiefferganza](https://www.github.com/kiefferganza)

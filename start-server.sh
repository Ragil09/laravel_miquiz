#!/bin/bash

# Gunakan port dari Railway, default ke 8080 jika tidak ada
PORT=${PORT:-8080}

# Jalankan Laravel di port Railway
php artisan serve --host=0.0.0.0 --port=$PORT

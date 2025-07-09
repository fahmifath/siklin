# 🏥 Siklin - Sistem Informasi Klinik

**Siklin** adalah aplikasi berbasis Laravel yang dirancang untuk membantu manajemen data klinik, seperti pasien, dokter, dan kunjungan harian.

---

## 🌐 Repository

🔗 [https://github.com/fahmifath/siklin](https://github.com/fahmifath/siklin)

---

## 📦 Cara Instalasi

Sebelum mulai, pastikan kamu sudah menginstal:

- PHP >= 8.1
- Composer
- MySQL atau MariaDB

### 1. Clone Repository

```bash
git clone https://github.com/fahmifath/siklin.git
cd siklin
```

### 2. Install Dependency PHP
```bash
composer install
```

### 3. Salin File .env dan Atur Konfigurasi
```bash
cp .env.example .env


Edit file .env:

APP_NAME=Siklin
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=siklin
DB_USERNAME=root
DB_PASSWORD=

```

###  4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Jalankan Migrasi (dan Seeder jika ada)
```bash
php artisan migrate
```


## 🚀 Menjalankan Aplikasi
###  Jalankan Server Laravel
```bash
php artisan serve

```

## Struktur folder
```bash
app/
│
├── Models/
│   ├── Pasien.php
│   ├── Dokter.php
│   ├── Kunjungan.php
│   ├── JadwalDokter.php
│   ├── Obat.php
│   └── Resep.php
│
└── Http/
    └── Controllers/
        ├── PasienController.php
        ├── DokterController.php
        ├── KunjunganController.php
        ├── JadwalDokterController.php
        ├── ObatController.php
        └── ResepController.php

resources/
└── views/
    ├── pasien/
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   └── edit.blade.php
    │
    ├── dokter/
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   ├── edit.blade.php
    │   └── kunjungan_fokter.blade.php
    │
    ├── kunjungan/
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   └── edit.blade.php
    │
    ├── jadwaldokter/
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   └── edit.blade.php
    │
    ├── obat/
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   └── edit.blade.php
    │
    └── resep/
        ├── index.blade.php
        ├── create.blade.php
        └── edit.blade.php

routes/
└── web.php

```

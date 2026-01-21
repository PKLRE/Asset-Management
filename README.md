# Sistem Manajemen Aset

Aplikasi manajemen aset berbasis Laravel 12 dengan fitur pelacakan inventori real-time, manajemen stok, dan audit trail transaksi lengkap.

## Setup Cepat

### Requirement
- PHP 8.2+
- Composer
- Node.js 20+
- MySQL/SQLite

### Instalasi

```bash
# Clone & masuk ke folder
git clone <repo-url>
cd Asset-Management

# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Database (pilih salah satu)
# MySQL:
php artisan migrate

# Jalankan aplikasi
php artisan serve
npm run dev
```

Aplikasi siap di `http://localhost:8000`

## Fitur Utama

- **Manajemen Master Data** - Kategori, Produk, Lantai, Pengguna
- **Pelacakan Stok Real-time** - Saldo per produk per lantai
- **Transaksi Masuk/Keluar** - Pickup & Receipt dengan audit trail
- **Log Transaksi Terpadu** - Semua pergerakan inventori tercatat

## Struktur Database

| Tabel | Fungsi |
|-------|--------|
| `categories` | Kategori produk |
| `sizes` | Ukuran/varian produk |
| `floors` | Lokasi/lantai |
| `products` | Data produk |
| `stock_balances` | Stok per produk per lantai |
| `pickups` | Pengambilan barang |
| `receipts` | Penerimaan barang |
| `inventory_transactions` | Log semua transaksi IN/OUT |

## Teknologi
- Laravel 12
- MySQL/SQLite
- Node.js + Vite
- Blade Templating

## Fitur Utama

### 1. **Manajemen Data Master**
- **Kategori**: Klasifikasi dan organisasi produk
- **Ukuran**: Varian ukuran produk (S/M/L, pengukuran, dll.)
- **Lantai**: Pelacakan lokasi/lantai penempatan inventori
- **Produk**: Katalog produk berbasis SKU dengan tingkat stok minimum
- **Pengguna**: Catatan karyawan untuk pelacakan transaksi

### 2. **Pelacakan Saldo Stok**
- Stok on hand (SOH) real-time per produk per lantai
- Pembaruan saldo otomatis melalui transaksi
- Pemantauan tingkat stok minimum

### 3. **Dua Alur Transaksi Utama**

#### Alur 1: Pengambilan (Pickup/Issue - OUT)
- Struktur header-detail untuk penarikan barang
- Pelacakan peminta dan lantai tujuan
- Audit trail penggunaan produk
- Pembaruan saldo stok otomatis

#### Alur 2: Penambahan (Receipt/Intake - IN)
- Struktur header-detail untuk penerimaan barang
- Pelacakan supplier dan penetapan harga satuan
- Dukungan multi-mata uang
- Pencatatan biaya historis untuk penilaian inventori

### 4. **Log Transaksi Terpadu**
- **Sumber kebenaran tunggal** untuk semua pergerakan inventori
- Tabel `inventory_transactions` yang terpadu menangkap:
  - Semua pergerakan IN/OUT dengan detail lengkap
  - Informasi produk, lantai, kuantitas, dan harga
  - Referensi silang ke dokumen sumber (pengambilan atau penerimaan)
  - Pelacakan stempel waktu untuk kepatuhan audit

## Skema Basis Data

### Tabel Inti

| Tabel | Tujuan |
|-------|---------|
| `categories` | Kategori produk |
| `sizes` | Spesifikasi ukuran produk |
| `floors` | Lokasi bangunan |
| `products` | Data master produk dengan SKU |
| `users` | Data master karyawan |
| `stock_balances` | Inventori saat ini per produk per lantai |

### Tabel Transaksi

| Tabel | Tujuan |
|-------|---------|
| `pickups` / `pickup_lines` | Permintaan penarikan barang |
| `receipts` / `receipt_lines` | Pesanan pembelian/penerimaan barang |
| `inventory_transactions` | Log transaksi terpadu (IN/OUT) |

## Prinsip Desain Utama

- **Model Supplier Sederhana**: Menggunakan nama supplier langsung tanpa tabel master supplier khusus
- **Ukuran Fleksibel**: Produk dapat memiliki satu ukuran utama; dukungan varian masa depan telah direncanakan
- **Dukungan Multi-Lantai**: Memungkinkan pelacakan inventori berbasis lokasi
- **Audit Trail**: Riwayat transaksi lengkap dengan stempel waktu
- **Harga Fleksibel**: Mendukung berbagai mata uang (default: IDR)
- **Kuantitas Selalu Positif**: Arah transaksi ditentukan oleh enum `trans_type` (IN/OUT)

## Jenis Transaksi

```
IN  → Barang Masuk (Penerimaan/Pembelian - Peningkatan Stok)
OUT → Barang Keluar (Pengambilan/Penggunaan - Penurunan Stok)
```

## Stack Teknologi

Dibangun untuk Laravel dengan dukungan basis data MySQL.

## Lisensi

MIT License - Lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.

---

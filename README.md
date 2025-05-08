<div align="center">
**SISTEM JUAL-BELI HASIL PERTANIAN BUAH** 🍎🍊🍌




![image](https://github.com/user-attachments/assets/4ab05c50-19f5-4057-beca-34f008291701)


<br><br>

<strong>Anna Adelia Sari</strong><br>
<strong>D0222349</strong><br>
<strong>Framework Web Based</strong><br>
<strong>2025</strong>

</div>

👥 Role & Fitur

👨‍💼 Admin
- Login sebagai admin  
- Mengelola data Pengguna (petani dan pembeli)  
  - Lihat daftar pengguna  
  - Edit / Hapus pengguna  
  - Atur peran role pengguna  
- Mengelola data Produk (buah-buahan yang dijual)  
  - Lihat semua produk buah  
  - Edit / Hapus produk jika tidak sesuai  
- Melihat Transaksi atau pesanan  
  - Lihat semua transaksi: produk, pembeli, total harga, status  

👨‍🌾 Petani
- Login sebagai petani/penjual  
- Menambahkan data produk buah  
  - Nama, Harga, Stok, Foto, Deskripsi  
- Mengupdate data produk jika ada perubahan  
  - Ubah harga, stok, atau deskripsi produk  
- Mengelola pesanan  
  - Konfirmasi pesanan  
  - Update status pengiriman (dikemas, dikirim, selesai)  
- Melihat riwayat penjualan  

👨‍💼 Pembeli
- Login sebagai pembeli  
- Melihat dan Membeli Buah  
- Melihat Riwayat Pembelian  
- Memberi Ulasan / Reting buah yang dibeli  

---

🧱 Tabel-tabel database beserta field dan tipe datanya

### Tabel User

| Nama field   | Tipe data    | Keterangan                            |
|--------------|--------------|----------------------------------------|
| id           | INT (PK)     | Primary key/ID unik pengguna          |
| name         | VARCHAR(100) | Nama pengguna                         |
| email        | VARCHAR(50)  | Email login                           |
| password     | VARCHAR(25)  | Kata sandi pengguna                   |
| role         | ENUM         | Peran pengguna (‘admin’,’petani’,’pembeli’) |
| created_at   | TIMESTAMP    | waktu dibuat                          |
| update_at    | TIMESTAMP    | waktu diubah                          |

### Tabel Products

| Nama field   | Tipe data     | Keterangan                                  |
|--------------|---------------|----------------------------------------------|
| id           | INT (PK)      | Primary key/ID unik produk                  |
| user_id      | INT           | ID petani yang menambahkan produk (relasi ke user.id) |
| name         | VARCHAR(100)  | Nama buah                                   |
| description  | TEXT          | Deskripsi buah                              |
| harga        | DECIMAL(10,2) | Harga buah                                  |
| stok         | INT           | Stok buah tersedia                          |
| image        | VARCHAR(255)  | URL/Path foto produk                        |
| created_at   | TIMESTAMP     | waktu dibuat                                |
| updated_at   | TIMESTAMP     | Waktu diubah                                |

### Tabel Orders

| Nama field   | Tipe data     | Keterangan                                  |
|--------------|---------------|----------------------------------------------|
| id           | INT (PK)      | Primary key/ID unik pesanan                 |
| buyer_id     | INT           | ID pembeli (relasi ke users.id)            |
| status       | ENUM          | Status pesanan ('Menunggu','dikemas','dikirim','selesai','dibatalkan') |
| total_price  | DECIMAL(12,2) | Total harga semua produk dalam pesanan     |
| created_at   | TIMESTAMP     | waktu pesanan dibuat                        |
| update_at    | TIMESTAMP     | waktu pesanan diubah                        |

### Tabel Order_items

| Nama field   | Tipe data     | Keterangan                                |
|--------------|---------------|--------------------------------------------|
| id           | INT (PK)      | Primary key/ID item pesanan               |
| order_id     | INT           | ID pesanan (relasi ke orders.id)          |
| product_id   | INT           | ID produk (relasi ke products.id)         |
| quantity     | INT           | Jumlah produk yang dibeli                 |
| price        | DECIMAL(10,2) | Harga produk saat dibeli                  |

### Tabel Reviews

| Nama field   | Tipe data     | Keterangan                                |
|--------------|---------------|--------------------------------------------|
| id           | INT (PK)      | Primary key/ID ulasan                     |
| user_id      | INT           | ID pembeli (relasi ke users.id)          |
| product_id   | INT           | ID produk (relasi ke products.id)        |
| rating       | INT           | Nilai rating (1-5)                        |
| comment      | TEXT          | Isi ulasan                                |
| created_at   | TIMESTAMP     | Tanggal ulasan dibuat                     |

---

🔗Jenis relasi dan tabel yang berelasi

### Relasi antara users dan products
- **Jenis Relasi**: One to Many (1:N)  
- **Penjelasan**: Satu user (petani) bisa memiliki banyak produk, tetapi satu produk hanya dimiliki oleh satu petani.  
- **Foreign key**: `products.user_id → users.id`

### Relasi antara users dan orders
- **Jenis relasi**: One-to-Many  
- **Penjelasan**: Satu user (pembeli) bisa membuat banyak pesanan, tetapi satu pesanan hanya milik satu pembeli.  
- **Foreign key**: `orders.buyer_id → users.id`

### Relasi antara orders dan order_items
- **Jenis relasi**: One-to-Many  
- **Penjelasan**: Satu pesanan bisa memiliki banyak item pesanan, tetapi satu item hanya milik satu pesanan.  
- **Foreign key**: `order_items.order_id → orders.id`

### Relasi antara products dan order_items
- **Jenis relasi**: One-to-Many  
- **Penjelasan**: Satu produk bisa muncul di banyak item pesanan, tetapi satu item hanya mengacu ke satu produk.  
- **Foreign key**: `order_items.product_id → products.id`

### Relasi antara users dan reviews
- **Jenis relasi**: One-to-Many  
- **Penjelasan**: Satu user (pembeli) bisa memberikan banyak ulasan, tetapi satu ulasan hanya dibuat oleh satu user.  
- **Foreign key**: `reviews.user_id → users.id`

### Relasi antara products dan reviews
- **Jenis relasi**: One-to-Many  
- **Penjelasan**: Satu produk bisa memiliki banyak ulasan, tetapi satu ulasan hanya untuk satu produk.  
- **Foreign key**: `reviews.product_id → products.id`

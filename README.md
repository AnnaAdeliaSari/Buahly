<div align="center">
<h1>SISTEM JUAL-BELI HASIL PERTANIAN BUAH 🍎🍊🍌</h1>




![image](https://github.com/user-attachments/assets/4ab05c50-19f5-4057-beca-34f008291701)


<br><br>

<strong>Anna Adelia Sari</strong><br>
<strong>D0222349</strong><br>
<strong>Framework Web Based</strong><br>
<strong>2025</strong>

</div>

---
**👥 Role & Fitur**
##
**👨‍💼 Admin**
- Login sebagai admin  
- Mengelola data Pengguna (petani dan pembeli)  
  - Lihat daftar pengguna  
  - Edit / Hapus pengguna  
  - Atur peran role pengguna  
- Mengelola data Produk (buah-buahan yang dijual)  
  - Lihat semua produk buah  
  - Edit / Hapus produk jika tidak sesuai  
- Melihat Transaksi atau pesanan  
  - Lihat semua data: produk, pembeli, total harga, status  

**👨‍🌾 Petani**
- Login sebagai petani/penjual  
- Menambahkan data produk buah  
  - Nama, Harga, Stok, Deskripsi  
- Mengupdate data produk jika ada perubahan  
  - Ubah harga, stok, atau deskripsi produk  
- Mengelola pesanan    
  - Update status pengiriman (dikemas, dikirim, selesai)  
- Melihat riwayat penjualan  

**👨‍💼 Pembeli**
- Login sebagai pembeli  
- Melihat dan Membeli Buah  
- Melihat Riwayat Pembelian  

---

**🧱 Tabel-tabel database beserta field dan tipe datanya**
##
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
| user_id      | INT (FK)          | ID petani yang menambahkan produk (relasi ke user.id) |
| name         | VARCHAR(100)  | Nama buah                                   |
| description  | TEXT          | Deskripsi buah                              |
| harga        | DECIMAL(10,2) | Harga buah                                  |
| stok         | INT           | Stok buah tersedia                          |
| created_at   | TIMESTAMP     | waktu dibuat                                |
| updated_at   | TIMESTAMP     | Waktu diubah                                |

### Tabel Orders

| Nama field   | Tipe data     | Keterangan                                  |
|--------------|---------------|----------------------------------------------|
| id           | INT (PK)      | Primary key/ID unik pesanan                 |
| buyer_id     | INT (FK)         | ID pembeli (relasi ke users.id)            |
| product_id   | INT (FK)         | ID produk (relasi ke products.id)            |
| status       | ENUM          | Status pesanan ('Menunggu','dikemas','dikirim','selesai','dibatalkan') |
| total_price  | DECIMAL(12,2) | Total harga semua produk dalam pesanan     |
| created_at   | TIMESTAMP     | waktu pesanan dibuat                        |
| update_at    | TIMESTAMP     | waktu pesanan diubah                        |

---

**🔗Jenis relasi dan tabel yang berelasi**
##
### Relasi antara users dan products
- **Jenis Relasi**: One to Many (1:N)  
- **Penjelasan**: Satu user (petani) bisa memiliki banyak produk, tetapi satu produk hanya dimiliki oleh satu petani.  
- **Foreign key**: `products.user_id → users.id`

### Relasi antara users dan orders
- **Jenis relasi**: One-to-Many  
- **Penjelasan**: Satu user (pembeli) bisa membuat banyak pesanan, tetapi satu pesanan hanya milik satu pembeli.  
- **Foreign key**: `orders.buyer_id → users.id`

### Relasi antara Users (Pembeli) ⬌ Products (Buah) [melalui Orders]
- **Jenis relasi**: Many-to-Many  
- **Penjelasan**: -Satu pembeli dapat membeli banyak produk
                  -Satu produk dapat dibeli oleh banyak pembeli.
                  -Relasi ini terjadi melalui tabel orders sebagai penghubung.
- **Foreign key**:-`orders.buyer_id → users.id`
                  - `orders.product_id → products.id`



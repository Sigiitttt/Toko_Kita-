```markdown
# Toko Kita - Modern SaaS Inventory System

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpinedotjs&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)

**Toko Kita** adalah platform manajemen inventaris berbasis web yang dirancang untuk membantu bisnis memantau stok, aset, dan laporan penjualan secara real-time. Dibangun dengan pendekatan **Modern SaaS UI**, aplikasi ini menggabungkan performa backend Laravel yang tangguh dengan antarmuka **Bento Grid** yang estetis dan responsif.

## 📸 Screenshots

*(Tempatkan screenshot dashboard Anda di sini)*
## ✨ Key Features

### 🎨 Modern User Interface
- **Bento Grid Layout:** Desain dashboard modular yang modern dan informatif.
- **Glassmorphism:** Efek transparansi dan blur untuk pengalaman visual yang premium.
- **Responsive Design:** Tampilan optimal di Desktop, Tablet, dan Mobile.

### 🚀 Core Functionality
- **Product Management (CRUD):** Tambah, edit, dan hapus produk dengan validasi ketat.
- **Smart Image Handling:** Sistem upload gambar dengan auto-cropping rasio 1:1 (Square).
- **Live Search:** Pencarian produk instan tanpa reload halaman (Powered by Alpine.js Debounce).
- **Auto-Formatting:** Input harga otomatis diformat ke Rupiah (IDR).

### 📊 Analytics & Reporting
- **Real-time Dashboard:** Menampilkan total aset, jumlah produk, dan status kesehatan toko.
- **Visual Statistics:** Kartu statistik interaktif dengan indikator pertumbuhan.

## 🛠️ Tech Stack

- **Backend:** Laravel 11
- **Frontend:** Blade Templating, Tailwind CSS v3
- **Interactivity:** Alpine.js (Lightweight JavaScript Framework)
- **Database:** MySQL 8.0
- **Environment:** Docker (via Laravel Sail) & WSL2

## ⚙️ Installation (Local Development)

Proyek ini dikonfigurasi menggunakan **Laravel Sail** (Docker) untuk memastikan lingkungan pengembangan yang konsisten.

### Prerequisites
- Docker Desktop
- WSL2 (Windows Subsystem for Linux) - *Jika menggunakan Windows*

### Steps

1. **Clone Repository**
   ```bash
   git clone [https://github.com/username-anda/toko-ku.git](https://github.com/username-anda/toko-ku.git)
   cd toko-ku

```

2. **Install Dependencies**
```bash
# Install PHP Dependencies
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs

# Copy Environment File
cp .env.example .env

```


3. **Start Application (Sail)**
```bash
./vendor/bin/sail up -d

```


4. **Setup Database & Storage**
```bash
# Generate App Key
./vendor/bin/sail artisan key:generate

# Run Migrations
./vendor/bin/sail artisan migrate

# Link Storage (Penting untuk gambar produk)
./vendor/bin/sail artisan storage:link

```


5. **Install Frontend Assets**
```bash
npm install
npm run dev

```


6. **Access the App**
Buka browser dan kunjungi: `http://localhost` (atau `http://localhost:8085` sesuai konfigurasi port Anda).

## 🔒 Security

* **Authentication:** Menggunakan Laravel Breeze untuk sistem login/register yang aman.
* **Data Sanitization:** Input harga dan teks dibersihkan sebelum disimpan ke database.
* **File Protection:** Mekanisme penyimpanan file private/public yang terstruktur.

## 📄 License

Project ini dilisensikan di bawah [MIT license](https://opensource.org/licenses/MIT).

---

<p align="center">
Built with ❤️ by <b>[saya]</b>
</p>

```

### 💡 Tips Tambahan agar Makin Keren:

1.  **Ambil Screenshot:** Buka dashboard dan halaman produk Anda, lalu *screenshot* (Print Screen).
2.  **Simpan Gambar:** Buat folder baru bernama `docs` di dalam folder proyek Anda, lalu simpan gambar tadi di sana (misal: `dashboard.png`).
3.  **Un-comment:** Di bagian `## 📸 Screenshots`, hapus tanda \`\` lalu sesuaikan nama filenya. Ini akan memunculkan gambar di halaman depan GitHub Anda.

Dengan README ini, orang yang melihat repo Anda akan berpikir: *"Wah, ini sistem yang matang dan menggunakan teknologi terkini (Docker/Alpine/Tailwind)."*

```

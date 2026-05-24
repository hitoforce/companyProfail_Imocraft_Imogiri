<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtisanCraft - Kerajinan Tangan Berkualitas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Playfair Display', serif;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/1bba08c4-7d44-4f22-b835-c0a2e0ae2ac1.png') no-repeat center center;
            background-size: cover;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            transition: all 0.3s ease;
        }

        .craft-process {
            background: #f9f5f0;
        }

        .testimonial-card {
            background: rgba(255, 255, 255, 0.9);
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #0e033f;
            transition: width 0.3s;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-primary {
            background: #c17a4a;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background: #a5683e;
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- Navigation -->
    <nav class="bg-white shadow-md py-4 sticky top-0 z-50">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-brown-800">
                <img src="{{ asset('admin/img/imc.png') }}" style="width: 100px" alt="">
            </a>

            <div class="hidden md:flex space-x-8">
                <a href="#home" class="nav-link">Beranda</a>
                <a href="#produk" class="nav-link">Produk</a>
                <a href="#tentang" class="nav-link">Tentang Kami</a>
                <a href="#kontak" class="nav-link">UMKM</a>
            </div>


        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section h-screen flex items-center justify-center text-white">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Kerajinan Tangan Berkualitas</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">Setiap produk dibuat dengan penuh ketelitian dan
                dedikasi oleh pengrajin lokal terbaik kami.</p>

        </div>
    </section>

    <!-- Produk Unggulan -->
    <section id="produk" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Produk Unggulan</h2>
                <div class="w-20 h-1 bg-yellow-500 mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                    Temukan koleksi produk kerajinan tangan eksklusif yang dibuat dengan bahan berkualitas dan desain
                    unik.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse ($Product as $p)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                        <img src="{{ Storage::url($p->foto) }}" alt="{{ $p->nama }}"
                            class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-xl text-gray-800">{{ $p->nama }}</h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-3">{{ $p->deskripsi }}</p>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-lg font-bold text-c17a4a">Rp
                                    {{ number_format($p->harga, 0, ',', '.') }}</span>
                                <span class="text-sm text-gray-500">Stok: {{ $p->stok }}</span>
                            </div>
                            <div class="flex gap-2">
                                <button
                                    class="bg-c17a4a text-white px-4 py-2 rounded-full hover:bg-yellow-600 transition">
                                    + Keranjang
                                </button>
                                <button
                                    onclick="openOrderForm('{{ $p->nama }}', '{{ number_format($p->harga, 0, ',', '.') }}', '{{ $p->id }}')"
                                    class="bg-green-600 text-white px-4 py-2 rounded-full hover:bg-green-700 transition">
                                    Beli via WA
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-center text-gray-500">
                        <p>Belum ada produk yang tersedia.</p>
                    </div>
                @endforelse
            </div>


        </div>
    </section>

    <!-- Script WA Order -->
    <script>
        function openOrderForm(namaProduk, hargaProduk, idProduk) {
            const nomorWA = '6285864314526'; // Tidak perlu simpan nomor, ini tetap bisa jalan
            const pesan = `Halo, saya tertarik dengan produk berikut:\n\n` +
                `📦 Nama Produk: ${namaProduk}\n` +
                `🆔 ID Produk: ${idProduk}\n` +
                `💰 Harga: Rp ${hargaProduk}\n` +
                `🔢 Jumlah yg mau di beli: [jumlah yang diinginkan]\n\n` +
                `📍 Alamat: [alamat lengkap Anda]\n` +
                `✍️ Catatan: [tambahan jika ada]`;

            const encodedPesan = encodeURIComponent(pesan);
            const linkWA = `https://wa.me/${nomorWA}?text=${encodedPesan}`;
            window.open(linkWA, '_blank');
        }
    </script>



    <!-- About Section -->
    <section id="tentang" class="craft-process py-16">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Tentang Pengrajin Kami</h2>
                <div class="w-20 h-1 bg-c17a4a mx-auto"></div>
            </div>

            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e80695be-b229-4822-b92c-e353ad0bf5cf.png"
                        alt="Pengrajin sedang membuat kerajinan di workshop tradisional dengan alat-alat tangan"
                        class="rounded-lg shadow-lg">
                </div>
                <div class="lg:w-1/2">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Dibuat Dengan Penuh Dedikasi</h3>
                    <p class="text-gray-600 mb-4">ArtisanCraft adalah wadah bagi pengrajin lokal untuk menampilkan karya
                        terbaik mereka. Setiap produk kami dibuat secara manual dengan teknik tradisional yang telah
                        turun temurun.</p>
                    <p class="text-gray-600 mb-6">Kami berkomitmen untuk melestarikan budaya kerajinan tangan sambil
                        memberikan nilai tambah bagi masyarakat lokal.</p>
                    <ul class="space-y-2 mb-8">
                        <li class="flex items-center"><i class="fas fa-check-circle text-c17a4a mr-2"></i> <span
                                class="text-gray-600">Bahan baku lokal berkualitas</span></li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-c17a4a mr-2"></i> <span
                                class="text-gray-600">Proses pembuatan tradisional</span></li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-c17a4a mr-2"></i> <span
                                class="text-gray-600">Ramah lingkungan</span></li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-c17a4a mr-2"></i> <span
                                class="text-gray-600">Setiap produk unik dan berbeda</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Craft Process -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Proses Pembuatan</h2>
                <div class="w-20 h-1 bg-c17a4a mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Setiap produk melewati berbagai tahapan pengerjaan yang
                    dilakukan dengan ketelitian dan keahlian khusus.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6">
                    <div class="bg-gray-100 rounded-full h-20 w-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tree text-3xl text-c17a4a"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Pemilihan Bahan</h3>
                    <p class="text-gray-600">Bahan baku terbaik dipilih dan dipersiapkan dengan cermat.</p>
                </div>

                <div class="text-center p-6">
                    <div class="bg-gray-100 rounded-full h-20 w-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hands text-3xl text-c17a4a"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Proses Kerajinan</h3>
                    <p class="text-gray-600">Pengrajin bekerja secara manual dengan teknik tradisional.</p>
                </div>

                <div class="text-center p-6">
                    <div class="bg-gray-100 rounded-full h-20 w-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-paint-brush text-3xl text-c17a4a"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Finishing</h3>
                    <p class="text-gray-600">Produk diberikan sentuhan akhir untuk kesempurnaan.</p>
                </div>

                <div class="text-center p-6">
                    <div class="bg-gray-100 rounded-full h-20 w-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check-circle text-3xl text-c17a4a"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Quality Check</h3>
                    <p class="text-gray-600">Setiap produk diperiksa ketat sebelum dikirim.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->

    <!-- Newsletter -->
    <section id="kontak" class="py-16 bg-gray-800 text-white">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">Ingin Produkmu Tampil di Website Kami?</h2>
                <p class="text-gray-300 mb-8">
                    Kami membuka kesempatan bagi para pengrajin untuk memasarkan produk di platform kami.
                    Cukup kirimkan data berikut: <br>
                    <span class="text-yellow-400 font-semibold">Foto Produk, Nama Produk, Deskripsi, Harga, Stok, dan
                        Jenis Kerajinan</span>.
                </p>

                <div class="bg-gray-700 p-6 rounded-xl shadow-lg text-left max-w-xl mx-auto">
                    <form action="https://wa.me/6281234567890" method="get" onsubmit="return kirimWA()">
                        <div class="space-y-4">
                            <input type="text" id="nama" placeholder="Nama Produk" required
                                class="w-full px-4 py-2 rounded bg-white text-gray-800">
                            <textarea id="deskripsi" placeholder="Deskripsi Produk" required
                                class="w-full px-4 py-2 rounded bg-white text-gray-800"></textarea>
                            <input type="text" id="harga" placeholder="Harga Produk" required
                                class="w-full px-4 py-2 rounded bg-white text-gray-800">
                            <input type="text" id="stok" placeholder="Jumlah Stok" required
                                class="w-full px-4 py-2 rounded bg-white text-gray-800">
                            <input type="text" id="jenis"
                                placeholder="Jenis Kerajinan (contoh: Batik Kayu, Anyaman)" required
                                class="w-full px-4 py-2 rounded bg-white text-gray-800">
                            <input type="text" id="foto"
                                placeholder="Link Foto Produk (Google Drive, Dropbox, dll)" required
                                class="w-full px-4 py-2 rounded bg-white text-gray-800">
                            <button type="submit"
                                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded">
                                Kirim via WhatsApp
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function kirimWA() {
                const nama = document.getElementById('nama').value;
                const deskripsi = document.getElementById('deskripsi').value;
                const harga = document.getElementById('harga').value;
                const stok = document.getElementById('stok').value;
                const jenis = document.getElementById('jenis').value;
                const foto = document.getElementById('foto').value;

                const pesan = `Halo, saya ingin menjual produk:\n\n` +
                    `📌 *Nama Produk*: ${nama}\n` +
                    `📝 *Deskripsi*: ${deskripsi}\n` +
                    `💰 *Harga*: Rp${harga}\n` +
                    `📦 *Stok*: ${stok} pcs\n` +
                    `🎨 *Jenis Kerajinan*: ${jenis}\n` +
                    `🖼️ *Foto*: ${foto}`;

                const url = `https://wa.me/6285864314526?text=${encodeURIComponent(pesan)}`;
                window.open(url, '_blank');
                return false;
            }
        </script>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 pt-16 pb-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Kolom 1: Logo & Tentang -->
                <div>
                    <img src="{{ asset('admin/img/imc.png') }}" alt="Logo Imocraft" class="w-52 mb-4">
                    <p class="mb-4 leading-relaxed">
                        Imocraft adalah website yang menampilkan kerajinan tradisional Indonesia
                        sekaligus sebagai media edukasi untuk melestarikan dan mengenalkan budaya
                        kerajinan kepada semua kalangan.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="text-white hover:text-[#25D366] transition duration-200">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                        <a href="https://www.instagram.com/imocraft.jogja/" target="_blank"
                            class="text-white hover:text-[#E1306C] transition duration-200">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="https://wahyuandalan.com/" target="_blank"
                            class="text-white hover:text-blue-500 transition duration-200">
                            <i class="fas fa-globe text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Kolom 2: Link Cepat -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Link Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#beranda" class="hover:text-white">Product</a></li>
                        <li><a href="#produk" class="hover:text-white">Tentang Kami</a></li>
                        <li><a href="#tentang" class="hover:text-white">UMKM</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Kontak -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Kontak Kami</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-2">
                            <i class="fas fa-map-marker-alt mt-1"></i>
                            <span>Jl. Kerajinan No. 123, Yogyakarta</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-phone-alt mt-1"></i>
                            <span>+6281326170009</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fas fa-envelope mt-1"></i>
                            <span>info@artisancraft.com</span>
                        </li>
                    </ul>
                </div>

                <!-- Kolom 4: Lokasi Maps -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Lokasi Kami</h3>
                    <div class="w-full h-48 rounded overflow-hidden shadow-md">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.7455146355674!2d110.3753294!3d-7.921628500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5574aaf0bb99%3A0xa4432acdcc31082a!2sWahyu%20Andalan%20Contractor!5e0!3m2!1sid!2sid!4v1753769017370!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

            </div>

            <div class="border-t border-gray-800 pt-6 text-center text-sm text-gray-500">
                © 2025 Imocraft.
            </div>
        </div>
    </footer>




</body>

</html>

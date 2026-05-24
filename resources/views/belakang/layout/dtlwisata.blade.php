<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Blog Kerajinan - Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;500&display=swap");

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #9c5a1a;
            min-height: 100vh;
            margin: 0;
            color: #f3f3f3;
            display: flex;
            flex-direction: column;
        }

        h1,
        h2 {
            font-family: 'Playfair Display', serif;
        }

        .full-width-section {
            background-color: #4a5a2a;
            padding: 2.5rem 1.5rem;
            width: 100%;
        }

        @media (min-width: 768px) {
            .full-width-section {
                padding: 2.5rem 5rem;
            }
        }

        .text-truncate {
            display: -webkit-box;
            -webkit-line-clamp: 6;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        p.full-content {
            -webkit-line-clamp: unset !important;
            max-height: unset !important;
            overflow: visible !important;
        }

        p {
            color: #e0e0d1 !important;
            margin: 0;
        }

        button {
            background-color: #7a6a2a;
            color: #d9d9d9 !important;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 500;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        }

        button:hover {
            background-color: #6a5a2a;
            color: #ffffff !important;
        }
    </style>
</head>

<body>
    <header class="relative w-full flex-shrink-0">
        <img alt="Header background" class="w-full h-[180px] object-cover"
            src="{{ asset('admin/img/wis.png') }}" />
        <h1
            class="absolute inset-0 flex items-center justify-center text-4xl md:text-5xl text-[#b9c9d9] font-playfair-display font-semibold drop-shadow-lg text-center px-4">
            BLOG Desa Wisata
        </h1>
        <div class="absolute top-4 left-4 flex space-x-2 z-10">
            <button onclick="location.href='/Wisata'"
                class="bg-gray-700 hover:bg-gray-800 text-white px-3 py-1 rounded-md text-sm">
                <i class="fas fa-home mr-1"></i> Keluar
            </button>

        </div>
    </header>

    <main class="full-width-section flex-grow flex flex-col space-y-10">
        @forelse ($Dswisata as $index => $p)
            <article class="flex flex-col md:flex-row md:space-x-8">
                <img alt="Kerajinan" class="rounded-lg w-full md:w-1/3 object-cover mb-6 md:mb-0 shadow-lg max-h-[250px]"
                    src="{{ Storage::url($p->foto) }}" />
                <div class="flex flex-col flex-grow">
                    <h2 class="text-3xl md:text-4xl font-playfair-display font-bold mb-4 text-[#d9d9d9] drop-shadow-md">
                        {{ $p->judul }}
                    </h2>
                    <p class="text-sm md:text-base leading-relaxed text-[#e0e0d1] text-truncate"
                        id="content-{{ $index }}">
                        {{ $p->deskripsi }}
                    </p>
                    <button class="mt-4 self-start hidden" data-target="content-{{ $index }}">Selengkapnya</button>
                </div>
            </article>
            <hr class="border-t border-[#7a6a2a] my-6">
        @empty
            <div class="text-center py-5 text-white">
                <h2>Belum ada data beranda yang ditampilkan.</h2>
                <p>Silakan tambahkan konten melalui panel admin.</p>
            </div>
        @endforelse
    </main>

    <footer class="bg-[#4a5a2a] text-[#d9d9d9] text-center p-4">
        © 2025 Imocraft.
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('article').forEach(article => {
                const p = article.querySelector('p');
                const btn = article.querySelector('button');
                if (!p || !btn) return;

                const checkTruncation = () => {
                    p.classList.remove('text-truncate', 'full-content');
                    p.classList.add('text-truncate');

                    setTimeout(() => {
                        const style = window.getComputedStyle(p);
                        const lineHeight = parseFloat(style.lineHeight) || 20;
                        const height = p.offsetHeight;
                        const lines = Math.round(height / lineHeight);

                        if (lines > 6) {
                            btn.classList.remove('hidden');
                            btn.textContent = 'Selengkapnya';
                        } else {
                            p.classList.remove('text-truncate');
                            btn.classList.add('hidden');
                        }
                    }, 50);
                };

                checkTruncation();

                btn.addEventListener('click', () => {
                    if (p.classList.contains('text-truncate')) {
                        p.classList.remove('text-truncate');
                        p.classList.add('full-content');
                        btn.textContent = 'Tutup';
                    } else {
                        p.classList.remove('full-content');
                        p.classList.add('text-truncate');
                        btn.textContent = 'Selengkapnya';
                    }
                });

                window.addEventListener('resize', checkTruncation);
            });
        });
    </script>
</body>

</html>

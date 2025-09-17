@php
    $brand = config('app.name');
    $username = Auth::user()->name ?? 'Tamu';
@endphp

<div id="dynamic-text" class="text-xl font-bold text-center transition-opacity duration-500"></div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // List teks yang akan ditampilkan
        const texts = [
            "Selamat datang di {{ $brand }} {{ $username }}",
            "Semoga harimu menyenangkan, {{ $username }}",
            "Tetap semangat belajar di {{ $brand }}",
            "Jangan lupa istirahat ya, {{ $username }}",
        ];

        let index = 0;
        const el = document.getElementById("dynamic-text");

        function updateText() {

            el.classList.add("opacity-0");
            setTimeout(() => {
                el.textContent = texts[index];
                index = (index + 1) % texts.length;
                el.classList.remove("opacity-0");
            }, 500); // waktu animasi 
        }

        updateText(); // tampilkan teks pertama
        setInterval(updateText, 30000); // Interval (milisekon)
    });
</script>

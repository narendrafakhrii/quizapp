<section class="flex items-center justify-center min-h-screen bg-gray-50 p-6">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8 border">
        <h2 class="text-2xl font-bold mb-4">Simulasi UTBK</h2>
        <p class="text-gray-600 mb-6">
            Sebelum memulai, perhatikan informasi berikut:
        </p>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="p-4 rounded-lg bg-gray-50 border text-center">
                <p class="text-xs text-gray-500">Waktu Pengerjaan</p>
                <p class="text-lg font-semibold">45 menit</p>
            </div>
            <div class="p-4 rounded-lg bg-gray-50 border text-center">
                <p class="text-xs text-gray-500">Jumlah Soal</p>
                <p class="text-lg font-semibold">{{ count($questionsJson) }}</p>
            </div>
        </div>

        <div class="mb-6">
            <h4 class="font-semibold mb-2">Aturan Pengerjaan</h4>
            <ul class="list-disc pl-5 text-sm text-gray-700 space-y-1">
                <li>Jawaban tidak bisa diubah setelah waktu habis.</li>
                <li>Dilarang keluar dari halaman simulasi.</li>
                <li>Pastikan koneksi internet stabil.</li>
            </ul>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg border text-gray-700 hover:bg-gray-50">
                Batal
            </a>
            <x-button.primary-button @click="showMainContent = true; startTimer(); loadCurrentQuestion();"
                class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700">
                {{ __('START SIMULATION') }}
            </x-button.primary-button>
        </div>
    </div>
</section>

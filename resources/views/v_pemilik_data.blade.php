<div class="bg-white p-6 rounded-xl shadow mt-6">
    <h2 class="text-xl font-bold mb-4">Data Sapi</h2>
    <ul class="space-y-2">
        @foreach ($sapi as $s)
            <li class="border p-2 rounded-lg">{{ $s->nama }} - Berat: {{ $s->berat }} kg</li>
        @endforeach
    </ul>
</div>

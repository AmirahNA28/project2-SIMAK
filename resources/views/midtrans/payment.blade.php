@extends('layout.app')

@section('content')
<div class="max-w-xl mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Pembayaran</h1>
    <p class="mb-4">Silakan lanjutkan pembayaran dengan Midtrans:</p>
    <div id="snap-container"></div>
</div>
@endsection

@section('scripts')
<script src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function (result) {
                console.log('Payment Success:', result);
                window.location.href = "{{ route('dashboard.pelanggan') }}?status=success&order_id={{ $orderId }}";
            },
            onPending: function (result) {
                console.log('Payment Pending:', result);
                window.location.href = "{{ route('dashboard.pelanggan') }}?status=pending&order_id={{ $orderId }}";
            },
            onError: function (result) {
                console.error('Payment Error:', result);
                alert('Terjadi kesalahan saat memproses pembayaran: ' + result.status_message);
            },
            onClose: function () {
                console.log('Payment popup closed');
                alert('Anda menutup pembayaran tanpa menyelesaikannya.');
                window.location.href = "{{ route('dashboard.pelanggan') }}?status=canceled&order_id={{ $orderId }}";
            }
        });
    });
</script>
@endsection

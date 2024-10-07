
    <div class="container">
{{--        <h1>Konfirmasi Pembayaran</h1>--}}
        <form id="payment-form">
            <input type="hidden" id="snap-token" value="{{ $snapToken }}">
        </form>

        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var snapToken = document.getElementById('snap-token').value;
                snap.pay(snapToken, {
                    onSuccess: function(result) {
                        // Handle success
                        alert('Pembayaran sukses!');
                    },
                    onPending: function(result) {
                        // Handle pending
                        alert('Pembayaran masih pending.');
                    },
                    onError: function(result) {
                        // Handle error
                        alert('Terjadi kesalahan saat melakukan pembayaran.');
                    }
                });
            });
        </script>

    </div>

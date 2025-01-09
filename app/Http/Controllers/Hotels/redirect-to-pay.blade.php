<form id="paymentForm" action="{{ route('hotel.pay.process') }}" method="POST">
    @csrf
    <input type="hidden" name="price" value="{{ $price }}">
</form>

<script>
    // Auto-submit the form immediately when the page loads
    document.getElementById('paymentForm').submit();
</script>


<form action="{{ url('payment/' . $booking->id .'/pay')}}" method="POST">
    @csrf
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_jvtIai7ITVq2ZSJXeSoq2YAp"
        data-amount="{{$booking->total_charge * 100}}"
        data-name="{{config('app.name')}}"
        data-description="Pay for {{$booking->room->hotel_name}}"
        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
        data-locale="auto">
    </script>
</form>
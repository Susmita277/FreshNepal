<!DOCTYPE html>
<html>
<head><title>Redirecting to eSewa...</title></head>
<body>
    <p style="text-align:center; margin-top: 50px; font-family: sans-serif;">
        Redirecting to eSewa payment...
    </p>

    <form id="esewaForm" action="{{ $paymentUrl }}" method="POST">
        @foreach ($paymentData as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    </form>

    <script>
        document.getElementById('esewaForm').submit();
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS - LaravelTuts</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Send SMS using Twilio and Laravel 10 - LaravelTuts</h1>
    <form action="{{ url('/send-sms') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number:</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea name="message" id="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send SMS</button>
    </form>
</div>
</body>
</html>

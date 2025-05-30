<div>
    <h1 style="color: #2D3748; font-size: 24px; margin-bottom: 16px;">Order Placed Successfully</h1>

    <p style="font-size: 16px; color: #4A5568; line-height: 1.6;">
        Thank you for your order. Your order number is:
        <strong style="color: #4F46E5; font-weight: 600;">#{{ $order->id }}</strong>.
    </p>

    <div style="background-color: #F9FAFB; border-left: 4px solid #4F46E5; padding: 16px; margin-top: 24px;">
        We’ll send you an email confirmation once your order has shipped.
    </div>

    <x-mail::button :url="$url">
        View Order Details
    </x-mail::button>

    <p style="margin-top: 32px; font-size: 14px; color: #718096;">
        Thanks,<br>
        <strong>{{ config('app.name') }}</strong>
    </p>
</div>
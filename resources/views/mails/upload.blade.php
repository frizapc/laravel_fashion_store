<h1>
    Anda telah mengupload produk fashion terbaru bernama {{$title}}
</h1>

<div>
    <img width="200" src="{{ $message->embed(public_path('sertif_friza.jpg')) }}">
</div>

<div>
    <x-mail::button :url="$url" color="success">
        View Order
    </x-mail::button>
</div>

<div>
    <x-mail::panel>
        This is the panel content.
    </x-mail::panel>
</div>

<div class="p-6 text-center bg-white rounded-lg shadow-lg">
    <h2 class="mb-4 text-2xl font-bold">العداد: {{ $count }}</h2>

    <div class="space-x-2" dir="ltr">
        <button wire:click="increment"
                class="px-6 py-2 text-white bg-green-500 rounded hover:bg-green-600">
            زيادة +
        </button>

        <button wire:click="decrement"
                class="px-6 py-2 text-white bg-red-500 rounded hover:bg-red-600">
            نقصان -
        </button>

    </div>
</div>

@props(['trigger'])
<div x-data="{show: false}" @click.away="show = false" {{ $attributes(['class' => 'border-2 rounded-xl border-black-800 p-2']) }}>

    <div @click="show = !show">
        {{ $trigger }}
    </div>

    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-40 z-50 overflow-auto max-h-52">
        {{ $slot }}
    </div>

</div>
<button {{$attributes->merge([
        'class' => 'inline-flex items-center justify-center p-2 text-md font-semibold tracking-wide text-white rounded-lg bg-gradient-to-r from-lime-600 to-green-800 hover:from-green-800 hover:to-lime-600 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none'
                            ])
        }}>
    {{ $slot }}
</button>

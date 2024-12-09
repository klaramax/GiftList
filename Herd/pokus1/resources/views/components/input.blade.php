<div class="w-full mx-auto">
    <input {{$attributes->merge([
        'class' => 'flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-lg border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50'
         .($errors->has($attributes['name']) ? ' border-red-500' : '')
    ])}} />

    @error($attributes['name'])
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
    @enderror
</div>

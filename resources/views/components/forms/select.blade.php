<select 
    {{ $attributes->class('appearance-none w-full h-12 2xl:h-16 text-[10px] 2xl:text-sm font-medium text-dark/60 px-4 bg-ash-gray rounded-md')
        ->merge() }}
    name="{{ $name }}" 
>
    <option value="">Select {{ $title }}</option>
    @foreach ($options as $key => $value)
        <option 
            value="{{ $key }}" 
            {{ $isSelected($key) ? 'selected' : '' }}
        >{{ $value }}</option>
    @endforeach
</select>
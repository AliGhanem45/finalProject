@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'my-3 w-full h-20 bg-grey-2000 border-black border rounded-md text-s text-black shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2']) }}>

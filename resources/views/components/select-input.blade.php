@props(['options' => [], 'empty' => false])

<select {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
    @if($empty)<option value>{{ __('Select value') }}</option> @endif
    @foreach($options as $key => $sort)
        <option value="{{ $key }}">{{ __($sort) }}</option>
    @endforeach
</select>
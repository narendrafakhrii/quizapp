@props(['name', 'value', 'correct'])

<div class="flex items-center gap-3 p-3 rounded-xl border cursor-pointer hover:bg-gray-50 option-div"
    data-value="{{ $value }}" data-correct="{{ $correct ? 'true' : 'false' }}">
    <span>{{ $value }}</span>
</div>

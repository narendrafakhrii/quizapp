@php
    $brand = config('app.name');
    $username = Auth::user()->name ?? 'Tamu';
@endphp

<div {{ $attributes->merge(['class' => 'sm:w-3/4 md:w-1/2 lg:w-1/3  mx-auto']) }}>
    <div id="dynamic-text" class="text-xl font-bold text-center transition-opacity duration-500"></div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const texts = [
            @json(__('Nice to see you again,')) + " {{ $username }} \uD83D\uDC4B",
            @json(__('Thanks for coming back to')) + " {{ $brand }}, {{ $username }}!",
            @json(__("A new day, a new spirit! Let's learn with")) + " {{ $brand }}",
            @json(__('Hope your learning experience at')) + " {{ $brand }} " + @json(__('is enjoyable,')) +
            " {{ $username }}",
            @json(__('Keep chasing your dreams with')) + " {{ $brand }}",
            @json(__('Remember, every small step at')) + " {{ $brand }} " + @json(__('matters,')) +
            " {{ $username }}",
            @json(__('We believe in you!')) + " {{ $username }}! " + @json(__('Keep going with your study')),
            @json(__('Learning is an adventure, enjoy the journey at')) + " {{ $brand }}",
            @json(__('Welcome back, knowledge seeker')) + " {{ $username }} \uD83D\uDCA1",
            @json(__('May today be full of inspiration for you,')) + " {{ $username }}",
            @json(__('Keep growing with')) + " {{ $brand }}, {{ $username }}",
            @json(__("Let's conquer new challenges today,")) + " {{ $username }}",
            @json(__('A little learning is better than none,')) + " {{ $username }}",
            @json(__('Every day is a new chance to learn,')) + " {{ $username }}",
            @json(__('We are happy to support your journey,')) + " {{ $username }} \uD83D\uDE80",
            @json(__('Keep going!')) + " {{ $username }}! " + @json(__("You're awesome")) +
            " \uD83D\uDCAA",
            @json(__('Hello')) + " {{ $username }}, " + @json(__('hope today will be productive!')),
            @json(__('Welcome back to')) + " {{ $brand }}! " + @json(__("It's time for fun learning")) +
            " \uD83C\uDF89",
            @json(__('May your day be full of positive energy,')) + " {{ $username }}",
            @json(__('Show your skills at')) + " {{ $brand }}, {{ $username }}!",
            @json(__('Keep exploring new things,')) + " {{ $username }}"
        ];

        let index = 0;
        const el = document.getElementById("dynamic-text");

        function updateText() {
            el.classList.add("opacity-0");
            setTimeout(() => {
                el.textContent = texts[index];
                index = (index + 1) % texts.length;
                el.classList.remove("opacity-0");
            }, 500);
        }

        updateText();
        setInterval(updateText, 30000);
    });
</script>

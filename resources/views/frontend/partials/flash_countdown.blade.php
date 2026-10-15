@php $label = $label ?? 'Ends in'; @endphp
<div class="fc" data-end="{{ $end->getTimestamp() * 1000 }}" role="timer" aria-live="off" aria-label="Time left in this flash deal">

    <span class="fc__label">
        <svg viewBox="0 0 24 24" width="14" height="14" aria-hidden="true">
            <path fill="currentColor" d="M13 2 4 14h6l-1 8 9-12h-6z" />
        </svg>
        {{ $label }}
    </span>

    <span class="fc__box">
        <b data-fc="h">00</b>
        <small>h</small>
    </span>

    <span class="fc__sep" aria-hidden="true"></span>

    <span class="fc__box">
        <b data-fc="m">00</b>
        <small>m</small>
    </span>

    <span class="fc__sep" aria-hidden="true"></span>

    <span class="fc__box fc__box--s">
        <b data-fc="s">00</b>
        <small>s</small>
    </span>

</div>

<tr>
    <td class="header">
        <a href="{{ url('/') }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ '/images/G.jpg' }}" class="logo" alt="E-Shopping">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>

@props(['url'])
<tr>
    <td class="header">
        <a href="http://127.0.0.1:8000/" style="display: inline-block;">
            @if (trim($slot) === 'Presto.it')
                <img src="{{ asset('img/presto-logo.png') }}" class="logo" alt="Presto.it">
            @else
                <img src="{{ asset('img/presto-logo.png') }}" class="logo" alt="Presto.it">
                <div class="">Presto.it</div>
            @endif
        </a>
    </td>
</tr>

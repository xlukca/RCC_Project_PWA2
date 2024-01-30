<p>
    Dobrý deň {{ $result->first_name }} {{ $result->last_name }},
</p>
<p> 
<br>    
za mesiac  {{ $selectedMonths[0] }} evidujeme spotrebu kávy v počte  {{ $coffee_num[$result->id] }}.
<br>
        @if(($result->payment->sum('income') - ($result->consumption->count() * 0.3)) < 0)
            Sumu {{ $coffee_num[$result->id] * 0.3 }} € musíte uhradiť do {{ now()->add('+7 days')->format('Y-m-d') }}.
<br>
            Váš aktuálny zostatok na účte je {{ $result->payment->sum('income') - $result->consumption->count() * 0.3 }} €.
        @else
            Sumu {{ $coffee_num[$result->id] * 0.3 }} € nemusíte uhradiť do {{ now()->add('+7 days')->format('Y-m-d') }}, keďže váš zostatok na účte je kladný.
<br>
            Váš aktuálny zostatok na účte je {{ $result->payment->sum('income') - $result->consumption->count() * 0.3 }} €.
        @endif 
</p>
<p>
    S pozdravom, Administrátor. 
</p>

<p>
    Dobrý deň {{ $result->first_name }} {{ $result->last_name }},
</p>
<p> 
<br>    
za mesiac  {{ $selectedMonths[0] }} evidujeme spotrebu kávy v počte  {{ $coffee_num[$result->id] }}.
<br>
    Sumu {{ $coffee_num[$result->id] * 0.3 }} € musíte uhradiť do {{ now()->add('+7 days')->format('Y-m-d') }}.
<br> 
    Váš aktuálny zostatok na účte je {{ $result->payment->sum('income') - $result->consumption->count() * 0.3 }} €. 
</p>
<p>
    S pozdravom, Administrátor. 
</p>

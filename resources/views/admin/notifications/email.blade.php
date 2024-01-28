
    <p>
        Dobrý deň {{ $result->first_name }} {{ $result->last_name }},
    </p>
    <p> 
    <br>    
        za mesiac  {{ $result->consumption->last()->month_of_order }} evidujeme spotrebu kávy v počte {{ $result->consumption->count() }}.
    <br>
        Sumu {{ $result->consumption->count() * 0.3 }} € musíte uhradiť do {{ now()->add('+7 days')->format('Y-m-d') }}.
    <br> 
        Váš aktuálny zostatok na účte je {{ $result->payment->sum('income') - $result->consumption->count() * 0.3 }} €. 
    </p>
    <p>
        S pozdravom, Administrátor. 
    </p>


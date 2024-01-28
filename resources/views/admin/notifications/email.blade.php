
    <p>
        Dobrý deň {{ $result->employee->employee_full_name }},
    </p>
    <p> 
    <br>    
        za mesiac {{ $result->month_of_order }} evidujeme spotrebu kávy v počte {{ $results->count() }}.
    <br>
        Sumu {{ $results->count() * 0.3 }} € musíte uhradiť do {{ now()->add('+7 days')->format('Y-m-d') }}.
    <br> 
        Váš aktuálny zostatok na účte je ***zostatok***. 
    </p>
    <p>
        S pozdravom, Administrátor. 
    </p>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>* 
        {font-family: DejaVu Sans}
        </style>
        <style>
            th, td {
                    padding: 4px 5px;
                    text-align: center
                }
        </style>
    </head>
    <body>
        <h1>{{ $array['title'] }}</h1>
        <table>
            <thead>
                <tr>
                    <th>Employee</th>
                    <th>Income</th>
                    <th>Expenses</th>
                    <th>Difference</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($managements as $m)
                <tr>
                    <td>{{ $m->last_name }} {{ $m->first_name }}</td>
                    <td>{{ $m->payment->sum('income') }} €</td>
                    <td>{{ $m->consumption->count() * 0.3 }} €</td>
                    <td>{{ $m->payment->sum('income') - $m->consumption->count() * 0.3 }} €</td>
                </tr>
                @endforeach
            </tbody>    
        </table>
    </body>
</html>
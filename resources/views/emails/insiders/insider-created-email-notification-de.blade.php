<h2 style="text-align:center">myInsider</h2>

<p>
    Sehr  {{ $insider->title === 'Ms' || $insider->title === 'Ms Dr' ? 'geehrte' : 'geehrter' }} <b> {{ $insider->title ?? '' }} {{ $insider->user->first_name ?? '' }}  {{  $insider->user->last_name ?? '' }}</b>,
</p>

<p>
    Sie wurden in eine Insiderliste aufgenommen.
</p>

<p>
    Gemäß Artikel 18 Abs. 1 Marktmissbrauchsverordnung (MAR) ist die 
    <b>{{ isset($client->company->company_name) ? $client->company->company_name : 'company' }}</b> (die "Emittentin") dazu verpflichtet, eine 
    Liste aller Personen zu erstellen, die Zugang zu Insiderinformationen 
    haben, wenn diese Personen für sie auf Grundlage eines Arbeitsvertrages 
    oder anderweitig Aufgaben wahrnehmen, durch die diese Zugang zu 
    Insiderinformationen haben. Dies schließt auch Berater, Agenturen 
    und sonstige Dienstleister ein.
</p>

<p>
    Diese Insiderliste ist gemäß Artikel 18 Abs. 4 MAR unverzüglich zu 
    aktualisieren und der zuständigen Aufsichtsbehörde auf deren 
    Ersuchen möglichst rasch zur Verfügung zu stellen.
</p>

<p>
    Wir bitten Sie, sich die angehängte Insideraufklärung und 
    Datenschutzerklärung sorgfältig durchzulesen und zu bestätigen, 
    dass Sie deren Inhalt zur Kenntnis genommen haben und die daraus 
    erwachsenden Pflichten anerkennen. Nutzen Sie den Bestätigungslink 
    bitte auch zur Prüfung und allfälligen Komplettierung Ihrer Daten.
</p>

<a href="{!! route('updateInsiderInfo', ['token' => $insider->token->token]) !!}">BESTÄTIGUNGSLINK</a>

<p>
    Bei Rückfragen rufen Sie mich gerne an oder kontaktieren Sie mich per E-Mail.
</p>

<p>
    <b>Vielen Dank im Voraus und beste Grüße</b> <br>
    <b>{{ $client->user->first_name . ' ' . $client->user->last_name }}</b>
</p>



<p>
    {!! isset($client->contact->mobile_number) ? 'Tel.: ' . $client->contact->mobile_number . '<br>' : '' !!} 
    {{ isset($client->user->email) ? 'E-Mail: ' . $client->user->email : '' }}
</p>

<p>
    {!! isset($client->company->company_name) ? $client->company->company_name . '<br>' : '' !!}
    {!! isset($client->company->address->street_address) ? $client->company->address->street_address . '<br>' : '' !!}
    {!! isset($client->company->address->zip_code) ? $client->company->address->zip_code . ' ' : '' !!}
    {!! isset($client->company->address->city) ? $client->company->address->city . '<br>' : '' !!}
    {!! isset($client->company->contact->telephone_number) ? 'Tel.: ' . $client->company->contact->telephone_number. '<br>' : '' !!}
    {!! isset($client->company->contact->fax_number) ? 'Fax: ' . $client->company->contact->fax_number. '<br>' : '' !!}
</p>




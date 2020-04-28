<h2 style="text-align:center">myInsider</h2>

<p>
    Dear <b>{{ $insider->title . ' ' . $insider->user->first_name . ' ' . $insider->user->last_name }} </b>
</p>

<p>
    you have been added to the insider list.
</p>

<p>
    According to art. 18 para 1 of the Market Abuse Regulation (MAR) the 
    <b>{{ isset($client->company->company_name) ? $client->company->company_name : 'company' }}</b> is obligated to create a list of any persons who 
    have access to inside information, if these persons on the basis of 
    an employment contract or carry out additional tasks alongside by 
    which they gain access to inside information. This includes any 
    consultants, agencies and service providers.
</p>

<p>
    According to MAR, art. 18 para 4 this insider list has to be updated 
    immediately and has to be provided to the responsible supervisory 
    authority upon request.
</p>

<p>
    We ask you to read the information and the privacy statement attached 
    carefully and to confirm that you acknowledge the content and the 
    duties arising from it. For the purpose of reviewing and the possible 
    completion of your data please use the confirmation link, too.
</p>

<a href="{!! route('updateInsiderInfo', ['token' => $insider->token->token]) !!}">CONFIRMATION LINK</a>

<p>
    For further questions, do not hesitate to call me or send an email.
</p>

<p>
    <b>Best regards</b> <br>
    <b>{{ $client->user->first_name . ' ' . $client->user->last_name }}</b>
</p>



<p>
    {!! isset($client->contact->mobile_number) ? 'Tel.: ' . $client->contact->mobile_number . '<br>' : '' !!} 
    {{ isset($client->user->email) ? 'Mail: ' . $client->user->email : '' }}
</p>

<p>
    {!! isset($client->company->company_name) ? $client->company->company_name . '<br>' : '' !!}
    {!! isset($client->company->address->street_address) ? $client->company->address->street_address . '<br>' : '' !!}
    {!! isset($client->company->address->zip_code) ? $client->company->address->zip_code . ' ' : '' !!}
    {!! isset($client->company->address->city) ? $client->company->address->city . '<br>' : '' !!}
    {!! isset($client->company->contact->telephone_number) ? 'Tel.: ' . $client->company->contact->telephone_number. '<br>' : '' !!}
    {!! isset($client->company->contact->fax_number) ? 'Fax: ' . $client->company->contact->fax_number. '<br>' : '' !!}
</p>




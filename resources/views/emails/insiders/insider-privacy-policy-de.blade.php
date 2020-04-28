<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>


        body {
            padding: 16px;
        }

        
        p {
            text-align: justify;
            text-justify: inter-word;
        }

        .lstyle-none {
            list-style: none;
        }

        .lstyle-none li {
            margin-top: 4px;
        }
        
        .company-info {
            margin-bottom: 8px;
            font-size: 17px;
        }

    </style>

</head>
<body>

    <div>

        <h2>Datenschutzerklärung zu Insiderlisten</h2>
        <p>
            <b>Ihre personenbezogenen Daten sind uns wichtig.</b>
        </p>

        
        <div style="margin-top:6px;"> {!! isset($insider->title) ? 'Titel: ' . $insider->title : '' !!}</div>
        <div> {!! isset($insider->user->first_name) ? 'Vorname: ' . $insider->user->first_name : '' !!}</div>
        <div> {!! isset($insider->user->last_name) ? 'Nachname: ' . $insider->user->last_name : '' !!}</div>
        
        <div> {!! isset($insider->user->email) ? 'Email: ' . $insider->user->email : '' !!}</div>
        <div> {!! isset($insider->company->company_name) ? 'Unternehmen: ' . $insider->company->company_name : '' !!}</div>
        
        
        <p>
            Die <em>{!!$client->company->company_name ?? ''!!}</em> nimmt den 
            Schutz Ihrer Daten sehr ernst. Diese Datenschutzerklärung 
            erläutert, wie und welche Daten erhoben werden, weshalb diese 
            erhoben werden und wem gegenüber diese mitgeteilt oder offengelegt
            werden. Bitte lesen Sie sich diese Erklärung daher sehr 
            sorgfältig durch.
        </p>

    
        <ol>
            <li>
                <b>Wer ist der für die Verarbeitung Verantwortliche?</b>
                <p>

                    „Verantwortlicher“ bezeichnet die natürliche oder juristische Person, Behörde, Einrichtung oder andere Stelle, die allein oder gemeinsam mit anderen über die Zwecke und Mittel der Verarbeitung von personenbezogenen Daten entscheidet. Wir sind für die Verarbeitung Verantwortlicher gemäß Europäischer Datenschutz-Grundverordnung
                    (DSGVO) sowie anderer relevanter Datenschutz-Gesetzgebungen und Verordnungen.

                </p>
            </li>
            <li>
                <b>Welche personenbezogenen Daten werden erfasst?</b>
                <p>
                    Wir erheben und verarbeiten verschiedene Arten personenbezogener Daten über Sie, in Abhängigkeit der rechtlichen Anforderungen der Europäischen Union sowie nationaler Anforderungen. Weitere Informationen hierzu erhalten Sie im Insider-Belehrungsschreiben oder von unserem Datenschutzbeauftragten (siehe Punkt 8).
                </p>
            
            </li>
            <li>
                <b>Wie erheben und verwenden wir Ihre personenbezogenen Daten?</b>
                <p>
                    Wir erheben und verwenden die von Ihnen zur Verfügung gestellten personenbezogenen Daten für verschiedene, spezifische Zwecke oder mit Ihrer expliziten Einwilligung, es sei denn die anwendbaren Gesetze und Verordnungen erfordern keine Einholung einer expliziten Einwilligung wie
                    zu folgendem Zweck:

                </p>
                <ul class="lstyle-none">
                    <li>- Um Listen zu führen, von Personen mit Zugriff auf vertrauliche Insiderinformationen. </li>
                    <li>- Um die Einhaltung von Wertpapier/Kapitalmarkt-rechtlichen Anforderungen sowie Anforderungen für öffentlich-gelistete Unternehmen und damit verbundenen Gesetzen and Verordnungen sicherzustellen. </li>
                </ul>
                <p>
                    Zu diesem angezeigten Zweck verarbeiten wir Ihre Daten auf der Grundlage unseres berechtigten Interesses und/oder zur Einhaltung gesetzlicher Pflichten. Wo wir auf Grundlage unseres berechtigten Interesses personenbezogene Daten verarbeiten, dienen diese dazu, Maßnahmen zu ergreifen, um Insiderhandel zu verhindern.
                </p>
            
            </li>
            <li>
                <b>Wer wird Zugriff auf Ihre personenbezogenen Daten erhalten?</b>
                <p>  
                    Wir werden dabei sicherstellen, dass Ihre personenbezogenen Daten in einer Weise verarbeitet werden, die mit dem oben genannten Zweck konform sind.   
                </p>
                <p>
                    Für den genannten Zweck:
                </p>
                <ul class="lstyle-none">
                    <li>- Dürfen Ihre personenbezogenen Daten Behörden gegenüber offengelegt werden und anderen Gruppen-Unternehmen, die als für die Datenverarbeitung Verantwortlicher für Dritte agieren. </li>
                    <li>- Dürfen wir Ihre personenbezogenen Daten an Dienstleister und Gruppen-Unternehmen weitergeben, die gemäß unserer Weisung für uns als Verarbeiter tätig werden.</li>
                </ul>
                <p>
                    Abschließend dürfen wir Ihre personenbezogenen Daten weitergeben, um rechtlichen Verpflichtungen nachzukommen. Dies beinhaltet die Weitergabe an die zuständige Aufsichtsbehörde.
                </p>
            </li>
            <li>
                <b>Wo werden Ihre personenbezogenen Daten verarbeitet?</b>
                <p>
                    Ihre personenbezogenen Daten können im Europäischen Wirtschaftsraum (EWR) verarbeitet werden von den unter Punkt 4 benannten Verarbeitern, immer unter der Maßgabe vertraglicher Einschränkungen in Bezug auf Vertraulichkeit und Sicherheit, die im Einklang mit den Anforderungen des anwendbaren Datenschutz-Rechts und -Verordnungen stehen. Wir leiten Ihre personenbezogenen Daten nicht an zur Verarbeitung unberechtigte Personen weiter.
                </p>
            </li>
            <li>
                <b>Welche Rechte haben Sie im Hinblick auf Ihre personenbezogenen Daten?</b>
                <ul class="lstyle-none">
                    <li>- Zugriff auf Ihre personenbezogenen Daten.</li>
                    <li>- Information über die Herkunft der Daten, den Zweck und das Ende der Verarbeitung, die Details der zur Verarbeitung Verantwortlichen, der Auftragsverarbeiter und der Parteien denen die Daten offengelegt werden.</li>
                    <li>- Berichtigung und Aktualisierung Ihrer personenbezogenen Daten sowie Vervollständigung unvollständiger personenbezogener Daten.</li>
                    <li>- Datenübertragbarkeit durch das Zugänglichmachen in elektronischer Form.</li>
                    <li>- Widerruf Ihrer Einwilligung zur Verarbeitung von personenbezogenen Daten jederzeit möglich, sofern die Verarbeitung auf Ihrer expliziten Zustimmung/Einwilligung basiert.</li>
                    <li>- Löschung Ihrer personenbezogenen Daten aus unseren Akten, sofern diese nicht länger zur Erfüllung des oben benannten Zwecks benötigt werden. </li>
                    <li>- Widerspruch gegen die Verarbeitung Ihrer personenbezogenen Daten, oder uns mitzuteilen, dass wir diese nicht weiterverarbeiten sollen. Sobald Sie uns über Ihre Anfrage informiert haben, werden wir Ihre personenbezogenen Daten nicht weiterverarbeiten, sofern eine Verarbeitung nicht unter den anwendbaren Gesetzten und Verordnungen gestattet oder notwendig sein sollte.</li>
                    <li>- Beschwerde bei uns und/oder der zuständigen Datenschutzbehörde einzureichen.</li>
                </ul>
                <p>
                    Um von Ihren Rechten Gebrauch zu machen, kontaktieren Sie uns bitte unter den unter Punkt 8 angegebenen Kontaktdaten.
                </p>
            </li>
            <li>
                <b>Wie lange halten wir Ihre personenbezogenen Daten vor?</b>
                <p>
                    Wir halten Ihre personenbezogenen Daten so lange vor, wie sich für uns ein Haftungsrisiko aus der anwendbaren Gesetzgebung ergibt. Wir halten Ihre personenbezogenen Daten nicht länger vor als zur Erfüllung des benannten Zwecks notwendig ist.
                </p>
            </li>
            <li>
                <b>Wie können Sie mit uns Kontakt aufnehmen?</b>
                <p>   
                    Informationsanforderungen dazu, wie wir Ihre personenbezogenen Daten verwenden, richten Sie bitte an:        
                </p>

                <div class="company-info"> {!! isset($client->company->company_name) ? '<b>Unternehmen:</b> ' . $client->company->company_name : ' '  !!} </div>
                <div class="company-info"> {!! isset($client->company->contact->mobile_number) ? '<b>Ansprechpartner:</b>' . $client->company->contact->mobile_number : ' '  !!}</div>
                <div class="company-info"> {!! isset($client->company->contact->telephone_number) ? '<b>Telefon:</b> ' . $client->company->contact->telephone_number : ' ' !!}</div>
                <div class="company-info"> {!! isset($client->company->contact->fax_number) ? '<b>Fax:</b> ' . $client->company->contact->fax_number : ' ' !!}</div>
                <div class="company-info"> {!! isset($client->user->email) ? '<b>E-Mail-Adresse:</b> ' . $client->user->email : ' ' !!}</div>

                
                   
            </li>
        </ol>

    </div>

</body>
</html>






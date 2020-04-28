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

        ol {
            list-style: none;
        }

        h2 {
            text-align:center;
            margin: 0;
        }

    </style>

</head>
<body>

    <div>

        <h2>
            Erfassung Ihrer Person in der Insiderliste -
            Aufklärung nach Artikel 18 Abs. 2 der Verordnung (EU) Nr. 596/2014 des Europäischen Parlaments und des Rates über Marktmissbrauch (Marktmissbrauchsverordnung, MAR)
        </h2>

        <p>
            <b>Sehr {{ $insider->title === 'Ms' || $insider->title === 'Ms Dr' ? 'geehrte' : 'geehrter' }} {{ $insider->user->first_name ?? '' }}  {{  $insider->user->last_name ?? '' }},</b>
        </p>

        <p>
            gem. Artikel 18 Abs. 1 Marktmissbrauchsverordnung (MAR) ist die 
            {{ $client->company->company_name ?? '' }} dazu verpflichtet, eine Liste aller Personen aufzustellen, 
            die Zugang zu Insiderinformationen haben, wenn diese Personen für sie auf 
            Grundlage eines Arbeitsvertrages oder anderweitig Aufgaben wahrnehmen, 
            durch die diese Zugang zu Insiderinformationen haben.
        </p>

        <p>
            Diese Insiderliste ist der zuständigen Aufsichtsbehörde 
            auf deren Ersuchen möglichst rasch zur Verfügung zu stellen.
        </p>

        <p>Wir möchten Sie darauf hinweisen, dass wir Sie in diese Insiderliste aufgenommen haben.</p>

        <p>
            Aus diesem Grund obliegt uns Ihnen gegenüber eine besondere Aufklärungspflicht 
            über die rechtlichen Pflichten, die sich aus dem Zugang zu Insiderinformationen 
            ergeben sowie über die Rechtsfolgen bei Verstößen, der wir mit diesem Merkblatt nachkommen.
        </p>

        <p>
            Wir bitten Sie, sich die nachfolgenden Normen der Marktmissbrauchsverordnung 
            und der Sanktionen bei Verstoß gegen die entsprechenden Normen der 
            Marktmissbrauchsverordnung 
            sorgfältig durchzulesen und die Kenntnisnahme zu bestätigen.
        </p>

        <p>
            Wir machen Sie darauf aufmerksam, dass durch das Verbot von Insidergeschäften und Verbot der unrechtmäßigen Offenlegung von Insiderinformationen die Funktionsfähigkeit des Kapitalmarkts 
            geschützt wird und ein Verstoß gegen dieses Verbot als Straftat verfolgt werden kann.
        </p>

        <p>Sollten Sie Fragen haben, wenden Sie sich bitte telefonisch oder per E-Mail-Adresse an:</p>
        
        
        
        <div class="company-info"> {!! isset($client->company->company_name) ? '<b>Unternehmen:</b> ' . $client->company->company_name : ' '  !!} </div>
        <div class="company-info"> {!! isset($client->company->contact->mobile_number) ? '<b>Ansprechpartner:</b>' . $client->company->contact->mobile_number : ' '  !!}</div>
        <div class="company-info"> {!! isset($client->company->contact->telephone_number) ? '<b>Telefon:</b> ' . $client->company->contact->telephone_number : ' ' !!}</div>
        <div class="company-info"> {!! isset($client->company->contact->fax_number) ? '<b>Fax:</b> ' . $client->company->contact->fax_number : ' ' !!}</div>
        <div class="company-info"> {!! isset($client->user->email) ? '<b>E-Mail-Adresse:</b> ' . $client->user->email : ' ' !!}</div>

        

        

        <h2>Marktmissbrauchsverordnung (EU) Nr. 596/2014</h2>
        <h2>Artikel 2</h2>
        <h2>Anwendungsbereich</h2>

        <ol>
            <li>
                (1) Diese Verordnung gilt für
                <ul class="lstyle-none">
                    <li> <p>a) Finanzinstrumente, die zum Handel auf einem geregelten Markt zugelassen sind oder für die ein Antrag auf Zulassung zum Handel auf einem geregelten Markt gestellt wurde;</p> </li>
                    <li> <p>b) Finanzinstrumente, die in einem multilateralen Handelssystem gehandelt werden, zum Handel in einem multilateralen Handelssystem zugelassen sind oder für die ein Antrag auf Zulassung zum Handel in einem multilateralen Handelssystem gestellt wurde; </p> </li>
                    <li> <p>c) Finanzinstrumente, die in einem organisierten Handelssystem gehandelt werden;</p></li>
                    <li> <p>d) Finanzinstrumente, die nicht unter die Buchstaben a, b oder c fallen, deren Kurs oder Wert jedoch von dem Kurs oder Wert eines unter diesen Buchstaben genannten Finanzinstruments abhängt oder sich darauf auswirkt; sie umfassen Kreditausfall-Swaps oder Differenzkontrakte, sind jedoch nicht darauf beschränkt.</p></li>
                </ul>
            </li>
            
            <li>(...)</li>
           
            <li>
                <p>(3) Diese Verordnung gilt für alle Geschäfte, Aufträge und Handlungen, die eines der 
                in den Absätzen 1 und 2 genannten Finanzinstrumente betreffen, unabhängig davon, 
                ob ein solches Geschäft, ein solcher Auftrag oder eine solche 
                Handlung auf einem Handelsplatz getätigt wurden.</p>
                
            </li>

            <li>
                
                <p>(4) Die Verbote und Anforderungen dieser Verordnung 
                gelten für Handlungen und Unterlassungen in der Union und in 
                Drittländern in Bezug auf die in den Absätzen 1 und 2 genannten Instrumente.</p>
                
            </li>
        </ol>

        <h2>Artikel 3</h2>
        <h2>Begriffsbestimmungen</h2>

        <ol>
            <li><p>(1) Für die Zwecke dieser Verordnung gelten folgende Begriffsbestimmungen:</p></li>
            <li><p>1.„Finanzinstrument“ bezeichnet ein Finanzinstrument im Sinne von Artikel 4 Absatz 1 Nummer 15 der Richtlinie 2014/65/EU;</p></li>

            <li>(...)</li>

            <li><p>6. „geregelter Markt“ bezeichnet einen geregelten Markt im Sinne von Artikel 4 Absatz 1 Nummer 21 der Richtlinie 2014/65/EU;</p></li>
            
            <li><p>7. „multilaterales Handelssystem“ bezeichnet ein multilaterales System in der Union im Sinne von Artikel 4 Absatz 1 Nummer 22 der Richtlinie 2014/65/EU;</p></li>

            <li><p>8. „organisiertes Handelssystem“ bezeichnet ein System oder eine Fazilität in der Union im Sinne von Artikel 4 Absatz 1 Nummer 23 der Richtlinie 2014/65/EU;</p></li>

            <li>(…)</li>

            <li><p>21. „Emittent“ bezeichnet eine juristische Person des privaten oder öffentlichen Rechts, die Finanzinstrumente emittiert oder deren Emission vorschlägt, wobei der Emittent im Fall von Hinterlegungsscheinen, die Finanzinstrumente repräsentieren, der Emittent des repräsentierten Finanzinstruments ist;</p></li>

            <li>(…)</li>

        </ol>

        <h2>Artikel 7</h2>
        <h2>Insiderinformationen</h2>
        
        <ol>
            <li><p>(1) Für die Zwecke dieser Verordnung umfasst der Begriff „Insiderinformationen“ folgende Arten von Informationen:</p></li>
            <li><p>a) nicht öffentlich bekannte präzise Informationen, die direkt oder indirekt einen oder mehrere Emittenten oder ein oder mehrere Finanzinstrumente betreffen und die, wenn sie öffentlich bekannt würden, geeignet wären, den Kurs dieser Finanzinstrumente oder den Kurs damit verbundener derivativer Finanzinstrumente erheblich zu beeinflussen;</p></li>

            <li>(…)</li>

            <li><p>d) für Personen, die mit der Ausführung von Aufträgen in Bezug auf Finanzinstrumente beauftragt sind, bezeichnet der Begriff auch Informationen, die von einem Kunden mitgeteilt wurden und sich auf die noch nicht ausgeführten Aufträge des Kunden in Bezug auf Finanzinstrumente beziehen, die präzise sind, direkt oder indirekt einen oder mehrere Emittenten oder ein oder mehrere Finanzinstrumente betreffen und die, wenn sie öffentlich bekannt würden, geeignet wären, den Kurs dieser Finanzinstrumente, damit verbundener Waren-Spot-Kontrakte oder zugehöriger derivativer Finanzinstrumente erheblich zu beeinflussen.</p></li>

            <li>

                <p>(2)  Für die Zwecke des Absatzes 1 sind Informationen dann als präzise anzusehen, 
                wenn damit eine Reihe von Umständen gemeint ist, die bereits gegeben sind oder
                bei denen man vernünftigerweise erwarten kann, dass sie in Zukunft gegeben 
                sein werden, oder ein Ereignis, das bereits eingetreten ist oder von den 
                vernünftigerweise erwarten kann, dass es in Zukunft eintreten wird, und diese
                Informationen darüber hinaus spezifisch genug sind, um einen Schluss auf 
                die mögliche Auswirkung dieser Reihe von Umständen oder dieses Ereignisses 
                auf die Kurse der Finanzinstrumente oder des damit verbundenen derivativen 
                Finanzinstruments, der damit verbundenen Waren-Spot-Kontrakte oder der auf 
                den Emissionszertifikaten beruhenden Auktionsobjekte zuzulassen. So können 
                im Fall eines zeitlich gestreckten Vorgangs, der einen bestimmten Umstand 
                oder ein bestimmtes Ereignis herbeiführen soll oder hervorbringt, dieser 
                betreffende zukünftige Umstand bzw. das betreffende zukünftige Ereignis und 
                auch die Zwischenschritte in diesem Vorgang, die mit der Herbeiführung oder 
                Hervorbringung dieses zukünftigen Umstandes oder Ereignisses verbunden sind, 
                in dieser Hinsicht als präzise Information betrachtet werden.</p>

            
            </li>

            <li>
               <p> (3) Ein Zwischenschritt in einem gestreckten Vorgang wird als eine Insiderinformation 
                betrachtet, falls er für sich genommen die Kriterien für Insiderinformationen gemäß diesem Artikel erfüllt.</p>
            </li>

            <li>
               <p> 
                (4) Für die Zwecke des Absatzes 1 ist sind unter „Informationen, die, 
                    wenn sie öffentlich bekannt würden, geeignet wären, den Kurs von Finanzinstrumenten, 
                    derivativen Finanzinstrumenten, damit verbundenen Waren-Spot-Kontrakten oder auf 
                    Emissionszertifikaten beruhenden Auktionsobjekten spürbar zu beeinflussen“ 
                    Informationen zu verstehen, die ein verständiger Anleger wahrscheinlich als 
                    Teil der Grundlage seiner Anlageentscheidungen nutzen würde.
                </p>
            </li>

            <li><br>(…)</li>
        
        </ol>


        <h2>Artikel 8</h2>
        <h2>Insidergeschäfte</h2>
        
        <ol>
            <li>
               <p> (1) Für die Zwecke dieser Verordnung liegt ein Insidergeschäft vor, wenn 
                eine Person über Insiderinformationen verfügt und unter Nutzung derselben 
                für eigene oder fremde Rechnung direkt oder indirekt Finanzinstrumente, 
                auf die sich die Informationen beziehen, erwirbt oder veräußert. 
                Die Nutzung von Insiderinformationen in Form der Stornierung oder 
                Änderung eines Auftrags in Bezug auf ein Finanzinstrument, auf das 
                sich die Informationen beziehen, gilt auch als Insidergeschäft, wenn 
                der Auftrag vor Erlangen der Insiderinformationen erteilt wurde. (…)</p>
            </li>

            <li>
                <p>
                    (2) Für die Zwecke dieser Verordnung liegt eine Empfehlung zum Tätigen 
                        von Insidergeschäften oder die Verleitung Dritter hierzu vor, 
                        wenn eine Person über Insiderinformationen verfügt und
                </p>
            </li>

            <li>

               <p>
                    a) auf der Grundlage dieser Informationen Dritten empfiehlt, Finanzinstrumente, 
                    auf die sich die Informationen beziehen, zu erwerben oder zu veräußern, 
                    oder sie dazu verleitet, einen solchen Erwerb oder eine solche Veräußerung vorzunehmen, oder
               </p>
            
            </li>

            <li>
               <p>
                b) auf der Grundlage dieser Informationen Dritten empfiehlt, einen Auftrag, 
                    der ein Finanzinstrument betrifft, auf das sich die Informationen beziehen, 
                    zu stornieren oder zu ändern, oder sie dazu verleitet, eine solche 
                    Stornierung oder Änderung vorzunehmen.
               </p>
            </li>

            <li>
               <p>
                (3) Die Nutzung von Empfehlungen oder Verleitungen gemäß Absatz 2 
                    erfüllt den Tatbestand des Insidergeschäfts im Sinne dieses Artikels, 
                    wenn die Person, die die Empfehlung nutzt oder der Verleitung folgt, 
                    weiß oder wissen sollte, dass diese auf Insiderinformationen beruht.
               </p>
            </li>

            <li><p>
                (4) Dieser Artikel gilt für jede Person, die über Insiderinformationen verfügt, weil sie
            </p></li>

            <li>
                <p>
                a) dem Verwaltungs-, Leitungs- oder Aufsichtsorgan des Emittenten oder des Teilnehmers am Markt für Emissionszertifikate angehört;
                </p>
            </li>

            <li>
                <p>b) am Kapital des Emittenten oder des Teilnehmers am Markt für Emissionszertifikate beteiligt ist;</p>
            </li>

            <li>
              <p> c) aufgrund der Ausübung einer Arbeit oder eines Berufs oder der Erfüllung von Aufgaben Zugang zu den betreffenden Informationen hat oder</p>
            </li>

            <li><p>d) an kriminellen Handlungen beteiligt ist.</p></li>

            <li>
                <p>Dieser Artikel gilt auch für jede Person, die Insiderinformationen unter anderen Umständen als nach Unterabsatz 1 besitzt und weiß oder wissen müsste, dass es sich dabei um Insiderinformationen handelt.</p>
            </li>

            <li>
              <p>
                (5) Handelt es sich bei der in diesem Artikel genannten Person um eine juristische 
                    Person, so gilt dieser Artikel nach Maßgabe des nationalen Rechts auch für 
                    die natürlichen Personen, die an dem Beschluss, den Erwerb, die Veräußerung, 
                    die Stornierung oder Änderung eines Auftrags für Rechnung der betreffenden 
                    juristischen Person zu tätigen, beteiligt sind oder diesen beeinflussen.
              </p>
            </li>
            
        </ol>

        <h2>Artikel 10</h2>
        <h2>Unrechtmäßige Offenlegung von Insiderinformationen</h2>

        <p>Folgende Handlungen sind verboten:</p>

        <ol>
            <li>
                <p> a) das Tätigen von Insidergeschäften und der Versuch hierzu,</p>
            </li>
            <li>
               <p> b) Dritten zu empfehlen, Insidergeschäfte zu tätigen, oder Dritte verleitet, Insidergeschäfte zu tätigen, oder</p>
            </li>
            <li>
                <p>c) die unrechtmäßige Offenlegung von Insiderinformationen.</p>
            </li>
        </ol>

        <h2>Rechtsfolgen bei Verstoß gegen die Normen der Marktmissbrauchsverordnung</h2>

        <p>
            Verstöße gegen die Marktmissbrauchsverordnung können mit einer Strafe von bis zu 
            fünf Millionen Euro, oder im Fall einer juristischen Person mit einer darüber 
            hinausgehenden höheren Strafe bestraft werden. Zusätzlich können über natürliche 
            Personen bei Zuwiderhandlung beträchtliche Freiheitsstrafen verhängt werden. 
            Die Behörden sind berechtigt, Entscheidungen über Maßnahmen und Sanktionen wegen 
            (schwerwiegenden) Verstößen gegen die Normen der Marktmissbrauchsverordnung auf 
            ihrer Internetseite bekannt zu geben.
        </p>

        <p>(Ende)</p>

        <p>
            <em>
                Autoren dieser Insideraufklärung: <br>
                Bundesanstalt für Finanzdienstleistungen (BaFin) <br>
                Dr. Christian Temmel, DLA Piper - Kapital- und Wertpapier-Rechtsexperte
            </em>
        </p>

        <p>
            <em>

                Rechtsgrundlagen: <br>
                (1) Artikel 18 Abs. 2 der Verordnung (EU) Nr. 596/2014 des Europäischen Parlaments und des
                Rates über Marktmissbrauch (Marktmissbrauchsverordnung, MAR) <br>
                (2) Richtlinie 2014/57/EU des Europäischen Parlaments und des Rates vom 16. April 2014 über
                strafrechtliche Sanktionen bei Marktmanipulation (Marktmissbrauchsrichtlinie)

            </em>
        </p>

    </div>

</body>
</html>






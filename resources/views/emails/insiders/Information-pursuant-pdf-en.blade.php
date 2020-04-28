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
            Registration of your person in the insider list -
            Information pursuant to Article 18 Paragraph 2 of Regulation (EU) No. 596/2014 of the European Parliament and of the Council on market abuse (Market Abuse Regulation, MAR)
        </h2>

        <p>
            <b>Very Dear {{ $insider->title ?? '' }}. {{ $insider->user->first_name ?? '' }}  {{  $insider->user->last_name ?? '' }},</b>
        </p>

        <p>
            gem. Article 18 (1) Market Abuse Regulation (MAR) is the
            {{ $client->company->company_name ?? '' }} obliged to draw up a list of all persons
            who have access to inside information when these people are on it for them
            Perform the basis of an employment contract or perform other tasks,
            through which they have access to inside information.
        </p>

        <p>
            This insider list is the responsible supervisory authority
            to make them available as quickly as possible upon their request.
        </p>

        <p>We would like to point out that we have included you in this insider list.</p>

        <p>
            For this reason, we have a special obligation to inform you
            on the legal obligations arising from access to inside information
            as well as the legal consequences in the event of violations, which we comply with with this information sheet.
        </p>

        <p>
            We ask you to look at the following standards of the Market Abuse Regulation
            and the sanctions for violating the relevant standards of the
            Market Abuse Regulation
            read carefully and confirm that you have taken note of them.
        </p>

        <p>
            We draw your attention to the fact that the prohibition of insider trading and the prohibition of unlawful disclosure of inside information make the capital market work
            is protected and a violation of this prohibition can be prosecuted as a criminal offense.
        </p>

        <p>If you have any questions, please contact us by phone or email:</p>
        
        <div class="company-info"> {!! isset($client->company->company_name) ? '<b>Company Name:</b> ' . $client->company->company_name : '' !!} </div>
        <div class="company-info"> {!! isset($client->company->contact->mobile_number) ? '<b>Company Mobile Number:</b> ' . $client->company->contact->mobile_number : ''  !!}</div>
        <div class="company-info"> {!! isset($client->company->contact->telephone_number) ? '<b>Company Phone Number:</b> ' . $client->company->contact->telephone_number : '' !!}</div>
        <div class="company-info"> {!! isset($client->company->contact->fax_number) ? '<b>Company Fax Number:</b> ' . $client->company->contact->fax_number : '' !!}</div>
        <div class="company-info"> {!! isset($client->user->email) ? '<b>Company E-Email Address:</b> ' . $client->user->email : ''!!}</div>

        <h2>Market Abuse Regulation (EU) No. 596/2014</h2>
        <h2>Article 2</h2>
        <h2>scope of application</h2>

        <ol>
            <li>
                (1) This regulation applies to
                <ul class="lstyle-none">
                    <li> <p>a) Financial instruments admitted to trading on a regulated market or for which an application for admission to trading on a regulated market has been made;;</p> </li>
                    <li> <p>b) Financial instruments that are traded in a multilateral trading system, are admitted to trading in a multilateral trading system or for which an application for admission to trading in a multilateral trading system has been submitted; </p> </li>
                    <li> <p>c) Financial instruments traded in an organized trading system;</p></li>
                    <li> <p>d) Financial instruments that do not fall under letters a, b or c, but whose price or value depends on or affects the price or value of a financial instrument mentioned under these letters; they include, but are not limited to, credit default swaps or contracts for difference.</p></li>
                </ul>
            </li>
            
            <li>(...)</li>
           
            <li>
                <p>(3) This regulation applies to all transactions, orders and actions that one of the
                financial instruments referred to in paragraphs 1 and 2, regardless of
                whether such a business, such an order or such
                Act on a trading venue.</p>
                
            </li>

            <li>
                
                <p>(4) 
                    The prohibitions and requirements of this regulation
                    apply to acts and omissions in the Union and in
                    Third countries in relation to the instruments referred to in paragraphs 1 and 2.</p>
                
            </li>
        </ol>

        <h2>Article 3</h2>
        <h2>definitions</h2>

        <ol>
            <li><p>(1) The following definitions apply for the purposes of this regulation:</p></li>
            <li><p>1.Financial instrument ”means a financial instrument as defined in Article 4 paragraph 1 number 15 of Directive 2014/65 / EU;</p></li>

            <li>(...)</li>

            <li><p>6."Regulated market" means a regulated market as defined in Article 4 (1) number 21 of Directive 2014/65 / EU;</p></li>
            
            <li><p>7. “Multilateral trading system” means a multilateral system in the Union within the meaning of Article 4 (1) number 22 of Directive 2014/65 / EU;</p></li>

            <li><p>8. 'Organized trading system' means a system or facility in the Union within the meaning of Article 4 (1) (23) of Directive 2014/65 / EU;</p></li>

            <li>(…)</li>

            <li><p>21. “Issuer” means a legal entity under private or public law that issues or proposes to issue financial instruments, whereby in the case of depository receipts that represent financial instruments, the issuer of the financial instrument represented is the issuer;</p></li>

            <li>(…)</li>

        </ol>

        <h2>Article 7</h2>
        <h2>insider information</h2>
        
        <ol>
            <li><p>(1) For the purposes of this Regulation, the term "inside information" includes the following types of information:</p></li>
            <li><p>a) Precise information not publicly known that directly or indirectly relates to one or more issuers or one or more financial instruments and which, if publicly known, would be capable of significantly influencing the price of these financial instruments or the price of related derivative financial instruments;</p></li>

            <li>(…)</li>

            <li><p>d) for persons who are tasked with executing orders relating to financial instruments, the term also refers to information which has been communicated by a customer and relates to the customer's orders that have not yet been executed in relation to financial instruments that are precise, direct or indirectly affect one or more issuers or one or more financial instruments and which, if publicly known, would be likely to have a significant impact on the price of these financial instruments, related commodity spot contracts or related derivative financial instruments.</p></li>

            <li>

                <p>(2) For the purposes of paragraph 1, information is then to be regarded as precise,
                if it means a number of circumstances that already exist or
                which you can reasonably expect to be given in the future
                will be, or an event that has already occurred or of which
                can reasonably expect it to happen in the future, and this
                Furthermore, information is specific enough to draw a conclusion
                the possible impact of this series of circumstances or event
                on the prices of the financial instruments or the related derivative
                Financial instrument, the related commodity spot contracts or the
                to allow auction objects based on the emission certificates. So can
                in the case of a time-stretched process that a certain circumstance
                or to bring about or bring about a certain event, this
                relevant future circumstance or future event and
                also the intermediate steps in this process, that of bringing about or
                Bringing about this future circumstance or event,
                can be considered as precise information in this regard.</p>

            
            </li>

            <li>
               <p> (3) An intermediate step in a stretched process is called inside information
                considered if it, by itself, meets the criteria for inside information according to this article.</p>
            </li>

            <li>
               <p> 
                (4) For the purposes of paragraph 1, “Information that
                    if they were publicly known, were likely to change the price of financial instruments,
                    derivative financial instruments, related commodity spot contracts or on
                    Noticeably influence emissions certificates based auction objects "
                    Understand information that a sensible investor is likely to understand
                    Part of the basis of his investment decisions.
                </p>
            </li>

            <li><br>(…)</li>
        
        </ol>


        <h2>Article 8</h2>
        <h2>insider Trading</h2>
        
        <ol>
            <li>
               <p> (1) An insider deal exists for the purposes of this Regulation if
                a person has inside information and uses it
                for own or third-party accounts, directly or indirectly financial instruments,
                to which the information relates, acquires or sells.
                The use of inside information in the form of cancellation or
                Change an order related to a financial instrument on which
                referring to the information is also considered insider trading if
                the order was placed before the inside information was obtained. (…)</p>
            </li>

            <li>
                <p>
                    (2) 
                        For the purposes of this regulation, there is a recommendation to do so
                        of insider trading or the temptation of third parties to do so,
                        if a person has inside information and
                </p>
            </li>

            <li>

               <p>
                    a) 
                    Based on this information, recommends third parties to financial instruments,
                    to which the information relates, to acquire or to sell,
                    or induces them to undertake such an acquisition or sale, or
               </p>
            
            </li>

            <li>
               <p>
                b)
                    based on this information, recommends a third party to place an order
                    that concerns a financial instrument to which the information relates,
                    to cancel or change, or mislead them to do so
                    Make cancellation or change.
               </p>
            </li>

            <li>
               <p>
                (3) 
                    The use of recommendations or entices in accordance with paragraph 2
                    fulfills the facts of the insider business within the meaning of this article,
                    if the person using the recommendation or following the seduction
                    knows or should know that this is based on inside information.
               </p>
            </li>

            <li><p>
                (4) This article applies to anyone who has inside information because of them
            </p></li>

            <li>
                <p>
                    a) belongs to the administrative, management or supervisory body of the issuer or of the participant in the market for emission certificates;
                </p>
            </li>

            <li>
                <p>b) participates in the capital of the issuer or of the participant in the market for emission certificates;</p>
            </li>

            <li>
              <p> c) has access to the information in question due to the exercise of a job or profession or the performance of tasks, or</p>
            </li>

            <li><p>d) is involved in criminal acts.</p></li>

            <li>
                <p>This Article also applies to any person who has inside information other than under the first subparagraph and who knows or should know that it is inside information.</p>
            </li>

            <li>
              <p>
                (5) Is the person named in this article a legal
                    Person, this article also applies to national law
                    the natural persons involved in the decision, the acquisition, the sale,
                    the cancellation or modification of an order for the account of the concerned
                    legal entity, are involved or influence them.
              </p>
            </li>
            
        </ol>

        <h2>Article 10</h2>
        <h2>Unrechtmäßige Offenlegung von Insiderinformationen</h2>

        <p>Illegal disclosure of inside information:</p>

        <ol>
            <li>
                <p> a) doing insider trading and trying to do so,</p>
            </li>
            <li>
               <p> b) To recommend to third parties to do insider dealing, or to tempt third parties to do insider dealing, or</p>
            </li>
            <li>
                <p>c) the illegal disclosure of inside information.</p>
            </li>
        </ol>

        <h2>Legal consequences if the standards of the Market Abuse Regulation are violated</h2>

        <p>
            Violations of the Market Abuse Regulation can result in a penalty of up to
            five million euros, or in the case of a legal person with one above
            higher penalty will be punished. You can also use natural
            Considerable imprisonment can be imposed on people who violate the law.
            The authorities are authorized to take decisions on measures and sanctions
            (serious) violations of the norms of the Market Abuse Regulation
            announce their website.
        </p>

        <p>(Ende)</p>

        <p>
            <em>
                Authors of this insider education: <br>
                Federal Financial Services Agency (BaFin) <br>
                Dr. Christian Temmel, DLA Piper - capital and securities legal expert
            </em>
        </p>

        <p>
            <em>
                Legal Basis: <br>
                (1) Article 18 (2) of Regulation (EU) No 596/2014 of the European Parliament and of the
                Market Abuse Council (Market Abuse Regulation, MAR)<br>
                (2) Directive 2014/57 / EU of the European Parliament and of the Council of April 16, 2014 on
                criminal sanctions for market manipulation (market abuse directive)
            </em>
        </p>

    </div>

</body>
</html>






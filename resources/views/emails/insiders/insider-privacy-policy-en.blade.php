<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        p{
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
            font-size: 19px;
        }

    </style>

</head>
<body>

    <div>

        <h2>Privacy policy for insider lists</h2>
        <p>
            <b>Your personal data is important to us.</b>
        </p>


        <div style="margin-top:6px;"> {!! isset($insider->title) ? 'Title: ' . $insider->title : '' !!}</div>
        <div> {!! isset($insider->user->first_name) ? 'First Name: ' . $insider->user->first_name : '' !!}</div>
        <div> {!! isset($insider->user->last_name) ? 'Last Name: ' . $insider->user->last_name : '' !!}</div>
        
        <div> {!! isset($insider->user->email) ? 'Email:' . $insider->user->email : '' !!}</div>
        <div> {!! isset($insider->company->company_name) ? 'Company: ' . $insider->company->company_name : '' !!}</div>

        
        <p>
            The <em>{!!$client->company->company_name ?? ''!!}</em> takes the protection of your data very seriously. 
            This data protection declaration explains how and which data is collected, 
            why it is collected and to whom it is communicated or disclosed. 
            Please read this declaration very carefully.
        </p>

        <ol>
            <li>
                <b>Who is the controller?</b>
                <p>
                    “Responsible person” means the natural or legal person, authority, 
                    facility or other body that alone or together with others decides on the 
                    purposes and means of processing personal data. We are responsible for the 
                    processing according to the European General Data Protection Regulation
                    (GDPR) as well as other relevant data protection legislation and regulations
                </p>
            </li>
            <li>
                <b>Which personal data are collected?</b>
                <p>
                    We collect and process various types of personal data about you, depending on the 
                    legal requirements of the European Union and national requirements. For more information, 
                    please refer to the insider letter or our data protection officer (see point 8).
                </p>
            
            </li>
            <li>
                <b>How do we collect and use your personal data?</b>
                <p>
                    We collect and use the personal data provided by you for various, specific 
                    purposes or with your explicit consent, unless the applicable laws and 
                    regulations do not require obtaining explicit consent such as
                    for the following purpose:
                </p>
                <ul class="lstyle-none">
                    <li>- To keep lists of people with access to confidential inside information. </li>
                    <li>- To ensure compliance with securities / capital market law requirements as well as requirements for publicly listed companies and related laws and regulations. </li>
                </ul>
                <p>
                    For this indicated purpose, we process your data on the basis of our 
                    legitimate interest and / or to comply with legal obligations. 
                    here we process personal data based on our legitimate interest, 
                    this serves to take measures to prevent insider trading.
                </p>
            
            </li>
            <li>
                <b>Who will have access to your personal data?</b>
                <p>  
                    We will ensure that your personal data are processed in a manner 
                    that is in conformity with the above-mentioned purpose.   
                </p>
                <p>
                    For the stated purpose:
                </p>
                <ul class="lstyle-none">
                    <li>- Your personal data may be disclosed to authorities and other group companies that act as data controllers for third parties. </li>
                    <li>- We may pass on your personal data to service providers and group companies that work for us as processors in accordance with our instructions.</li>
                </ul>
                <p>
                    Finally, we may pass on your personal data in order to comply with legal obligations. This includes disclosure to the responsible supervisory authority.
                </p>
            </li>
            <li>
                <b>Where is your personal data processed?</b>
                <p>
                    Your personal data can be processed in the European Economic Area (EEA) by 
                    the processors named under point 4, always subject to contractual restrictions 
                    with regard to confidentiality and security, which are in accordance with the 
                    requirements of the applicable data protection law and regulations. 
                    We do not pass on your personal data to unauthorized persons for processing.
                </p>
            </li>
            <li>
                <b>What rights do you have with regard to your personal data?</b>
                <ul class="lstyle-none">
                    <li>- Access to your personal data.</li>
                    <li>- Information about the origin of the data, the purpose and end of the processing, the details of the data controller, the processor and the parties to whom the data will be disclosed.</li>
                    <li>- Correction and update of your personal data as well as completion of incomplete personal data.</li>
                    <li>- Data portability by making it accessible in electronic form.</li>
                    <li>- You can withdraw your consent to the processing of personal data at any time, provided the processing is based on your explicit consent / consent.</li>
                    <li>- Deletion of your personal data from our files, provided that they are no longer required to fulfill the purpose stated above. </li>
                    <li>- Objection to the processing of your personal data, or to inform us that we should not process them further. As soon as you have informed us of your request, we will not process your personal data unless processing is permitted or necessary under the applicable laws and regulations.</li>
                    <li>- Submit a complaint to us and / or the responsible data protection authority.</li>
                </ul>
                <p>
                    To exercise your rights, please contact us using the contact details given under point 8.     
                </p>
            </li>
            <li>
                <b>How long do we keep your personal data?</b>
                <p>
                    We keep your personal data for as long as there is a liability risk for us from the applicable legislation. 
                    We do not keep your personal data longer than is necessary to fulfill the stated purpose.
                </p>
            </li>
            <li>
                <b>How can you contact us?</b>
                <p>   
                    Please send information requests about how we use your personal data to:        
                </p>

                <div class="company-info"> {!! isset($client->company->company_name) ? '<b>Company Name:</b> ' . $client->company->company_name : '' !!} </div>
                <div class="company-info"> {!! isset($client->company->contact->mobile_number) ? '<b>Company Mobile Number:</b> ' . $client->company->contact->mobile_number : ''  !!}</div>
                <div class="company-info"> {!! isset($client->company->contact->telephone_number) ? '<b>Company Phone Number:</b> ' . $client->company->contact->telephone_number : '' !!}</div>
                <div class="company-info"> {!! isset($client->company->contact->fax_number) ? '<b>Company Fax Number:</b> ' . $client->company->contact->fax_number : '' !!}</div>
                <div class="company-info"> {!! isset($client->user->email) ? '<b>Company E-Email Address:</b> ' . $client->user->email : ''!!}</div>
                   
            </li>
        </ol>

    
    </div>

</body>
</html>






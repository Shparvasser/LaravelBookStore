const swe = {
        custom: {
            attach_purchase_document: {
              required: 'Köpedokument är obligatoriskt.',
              ext: 'Köpedokument behöver vara giltigt filformat: jpeg, jpg, png, bmp, pdf, heic, heif.',
              size: (field, args) => 'Köpedokument filstorlek behöver vara mindre än ' + args + ' KB.'
            },
            vehicle_registration_country: {
                required: 'Fordonets registreringsland är obligatoriskt.',
            },
            vat_deposit_amount: {
                required: 'Momsdepostionssumma är obligatoriskt.',
                max_value: (field, args) => 'Momsdepostionssumma behöver vara ' + args + ' eller mindre.',
                min_value: (field, args) => 'Momsdepostionssumma behöver vara ' + args + ' eller mer.',
                numeric: 'Momsdepostionssumma anges med endast siffror.',
                greaterThanZero: 'Momsdepostionssumma behöver vara större än 0.',
                customRegex: 'Momsdepostionssumma anges med endast siffror.'
            },
            vehicle_vin: {
                required: 'VIN-numret är obligatoriskt.',
                customRegex: 'VIN-numret är ogiltigt.',
                max: (field, args) => 'VIN-numret består av ' + args + ' tecken.'
            },
            first_registration_date: {
                required: 'Vänligen fyll i första registreringsdatum.',
                customRestriction: 'Vi erbjuder inte finansiering på VMB bilar som är yngre än 6 månader.'
            },
            transport_fee: {
                required: 'Transportavgiften är obligatorisk.',
                max_value: (field, args) => 'Transportavgiften måste vara ' + args + ' eller mindre.',
                min_value: (field, args) => 'Transportavgiften behöver vara ' + args + ' eller mer.',
                numeric: 'Transportavgiften anges med endast siffror.',
                greaterThanZero: 'Transportavgiften behöver vara större än 0.',
                customRegex: 'Transportavgiften anges med endast siffror.'
            },
            vehicle_registration_number: {
                required: 'Vänligen ange registreringsnummer.',
                regex: 'Registreringsnummer har formatet AAA11X. Där "AAA" är bokstäver A-Z, "11" är siffror 0-9 och "X" kan vara bokstav eller siffra.',
                customRegex: 'Registreringsnummer har formatet AAA11X. Där "AAA" är bokstäver A-Z, "11" är siffror 0-9 och "X" kan vara bokstav eller siffra.',
                max: (field, args) => 'Registreringsnummer består av ' + args + ' tecken.'
            },
            price: {
                required: 'Pris ink moms är obligatoriskt.',
                max_value: (field, args) => 'Pris ink moms behöver vara ' + args + ' eller mindre.',
                min_value: (field, args) => 'Pris ink moms behöver vara ' + args + ' eller mer.',
                numeric: 'Pris ink moms kan anges med endast siffror.',
                greaterThanZero: 'Priset behöver vara större än 0.',
                customRegex: 'Pris ink moms kan anges med endast siffror.'
            },
            bid: {
                required: 'Bud är obligatoriskt.',
                numeric: 'Ditt bud måste anges med siffror.',
                customRegex: 'Budet måste vara i jämna steg om 500 SEK.',
                max_value: (field, args) => 'Amount får inte vara större än ' + args + '.',
            },
            vehicle_price_with_vat: {
                required: 'Inköpspris är obligatoriskt.',
                max_value: (field, args) => 'Inköpspris behöver vara ' + args + ' eller mindre.',
                min_value: (field, args) => 'Inköpspris behöver vara ' + args + ' eller mer.',
                numeric: 'Inköpspris kan anges med endast siffror.',
                greaterThanZero: 'Inköpspris behöver vara större än 0.',
                customRegex: 'Inköpspris kan anges med endast siffror.'
            },
            purchase_fee: {
                required: 'Säljarens köpavgift är obligatoriskt.',
                max_value: (field, args) => 'Säljarens köpavgift behöver vara ' + args + ' eller mindre.',
                min_value: (field, args) => 'Säljarens köpavgift behöver vara ' + args + ' eller mer.',
                numeric: 'Säljarens köpavgift anges med endast siffror.',
                greaterThanZero: 'Säljarens köpavgift behöver vara större än 0.',
                customRegex: 'Säljarens köpavgift anges med endast siffror.'
            },
            vehicle_advance_payment: {
                required: 'Ange om du har betalat handpenning till säljaren.',
                numeric: 'Handpenningen moms anges med endast siffror.',
                max_value: (field, args) => 'Handpenningen måste vara ' + args + ' eller mindre.',
                min_value: (field, args) => 'Handpenningen måste vara ' + args + ' eller mer.',
                greaterThanZero: 'Handpenningen moms behöver vara större än 0.',
                customRegex: 'Handpenningen moms anges med endast siffror.'
            },
            dealer_vehicle_mileage: {
                required: 'Vänligen ange miltal.',
                numeric: 'Miltal kan anges med enbart siffror.',
                max_value: (field, args) => 'Miltal måste vara ' + args + ' eller mindre.',
                min_value: (field, args) => 'Miltal måste vara ' + args + ' eller mer.',
                greaterThanZero: 'Miltal måste vara större än 0.',
                customRegex: 'Miltal kan anges med enbart siffror.',
                customRestriction: 'Vi erbjuder inte finansiering på VMB bilar som har ett miltal mindre än 6000 km.',
            },
            mileage_unit: {
                required: 'Var vänlig fyll i miltalet.',
            },
            vat: {
                required: 'Momsstatus är obligatoriskt.',
                included: 'Vänligen ange fordonets momsstatus.'
            },
            purchase_receipt_type: {
                required: 'Val av inköpsunderlag är obligatoriskt.',
                included: 'Vänligen ange vilken typ av inköpsunderlag som kommer användas.'
            },
            seller_type: {
                required: 'Fältet typ av säljare är obligatoriskt.',
                included: 'Vänligen uppge om säljaren är privatperson eller företag.'
            },
            attach_invoice: {
                required: 'Faktura är obligatoriskt.',
                required_if: 'Faktura är obligatoriskt.',
                mimes: 'Fakturan behöver vara giltigt filformat: jpeg, jpg, png, bmp eller pdf.',
                ext: 'Fakturan behöver vara giltigt filformat: jpeg, jpg, png, bmp, heic, heif eller pdf.',
                size: (field, args) => 'Fakturans filstorlek behöver vara mindre än ' + args + ' KB.'
            },
            attach_purchase_fee_invoice: {
                required: 'Fakturan för köpavgiften är obligatoriskt.',
                required_if: 'Fakturan för köpavgiften är obligatoriskt.',
                mimes: 'Fakturan för köpavgiften behöver vara giltigt filformat: jpeg, jpg, png, bmp eller pdf.',
                ext: 'Fakturan för köpavgiften behöver vara giltigt filformat: jpeg, jpg, png, bmp, heic, heif eller pdf.',
                size: (field, args) => 'Fakturan för köpavgiften filstorlek behöver vara mindre än ' + args + ' KB.'
            },
            seller_phone: {
                required: 'Vänligen ange säljarens mobilnummer.',
                required_if: 'Vänligen ange säljarens mobilnummer.',
                regex: 'Vänligen fyll i ett giltigt telefonnummer.',
                min: 'Vänligen fyll i ett giltigt telefonnummer.',
                max: 'Vänligen fyll i ett giltigt telefonnummer.'
            },
            new_phone: {
                required: 'Vänligen ange säljarens mobilnummer.',
                regex: 'Vänligen fyll i ett giltigt telefonnummer.',
                min: 'Vänligen fyll i ett giltigt telefonnummer.',
                max: 'Vänligen fyll i ett giltigt telefonnummer.'
            },
            phone: {
                required: 'Fältet mobilnummer är obligatoriskt.',
                regex: 'Vänligen fyll i ett giltigt telefonnummer.',
                numeric: 'Mobilnumret kan anges med endast siffror.',
                customRegex: 'Mobilnumret kan anges med endast siffror.',
                unique: 'Mobilnumret används redan.',
                min: 'Vänligen fyll i ett giltigt telefonnummer.',
                max: 'Vänligen fyll i ett giltigt telefonnummer.'
            },
            deal_time: {
                required: 'Vänligen ange affärens tidpunkt.',
                required_if: 'Vänligen ange affärens tidpunkt.',
                date_format: 'Använd följande format: yyyy-mm-dd hh.'
            },
            start_date: {
                required: 'Startdatum är obligatoriskt.'
            },
            organisation_number: {
                required: 'Organisationsnummer är obligatoriskt.',
                regex: 'Organisationsnummerfältet måste vara 10 siffror långt.',
                organisation_number_unique: 'Detta organisationsnummer är redan registrerat.',
                customRestriction: 'Tyvärr, denna affär kan inte genomföras via Handlarfinans.'
            },
            seller_organisation_number: {
                required: 'Organisationsnummer är obligatoriskt.',
                numeric: 'Organisationsnumret anges med enbart siffror.',
                regex: 'Fältet organisationsnummer måste vara 10 siffror långt.'
            },
            organisation_name: {
                required: 'Bolagsnamn är obligatoriskt.',
                max: (field, args) => 'Ange bolagsnamnet med maximalt ' + args + ' tecken.',
                customRegex: 'Bolagsnamn anges med latinska och svenska bokstäver.'
            },
            seller_person_first_name: {
                required: 'Förnamn är obligatoriskt.',
                max: (field, args) => 'Ange förnamn med maximalt ' + args + ' tecken.',
                customRegex: 'Förnamn kan anges med latinska och svenska bokstäver, mellanslag och bindestreck.'
            },
            seller_person_last_name: {
                required: 'Efternamn är obligatoriskt.',
                max: (field, args) => 'Ange efternamn med maximalt ' + args + ' tecken.',
                customRegex: 'Efternamn kan anges med latinska och svenska bokstäver, mellanslag och bindestreck.'
            },
            seller_person_name: {
                required: 'Säljarens namn är obligatoriskt.',
                max: (field, args) => 'Ange säljarens namn med maximalt ' + args + ' tecken.'
            },
            post_city: {
                required: 'Postort är obligatoriskt.',
                max: (field, args) => 'Ange postort med maximalt ' + args + ' tecken.',
                customRegex: 'Postort kan anges med latinska och svenska bokstäver, mellanslag och bindestreck.'
            },
            post_address: {
                required: 'Postadress är obligatoriskt.',
                max: (field, args) => 'Ange postadress med maximalt ' + args + ' tecken.',
                customRegex: 'Postadress kan anges med latinska och svenska bokstäver, mellanslag och bindestreck, komma, punkt, siffror.'
            },
            post_postal_code: {
                required: 'Postnummer är obligatoriskt.',
                numeric: 'Postnummer kan anges med enbart siffror.',
                regex: 'Använd följande format för postnummer: XXXXXXXXXX.',
                customRegex: 'Postnummer kan anges med enbart siffror.',
                max: (field, args) => 'Postnummer med maximalt ' + args + ' tecken.',
                min: (field, args) => 'Postnummer måste vara ' + args + ' tecken.'
            },
            social_security_number: {
                required: 'Personnummer är obligatoriskt.',
                regex: 'Använd följande format för personnummer: YYYYMMDDXXXX.',
                numeric: 'Säljarens personnummer anges med enbart siffror.',
                customRegex: 'Säljarens personnummer anges med enbart siffror.',
                customRestriction: 'Tyvärr, denna affär kan inte genomföras via Handlarfinans.',
                unique: 'Personnummer används redan.',
            },
            seller_social_security_number: {
                required: 'Säljarens personnummer är obligatoriskt.',
                regex: 'Använd följande format för personnummer: YYMMDDXXXX eller YYYYMMDDXXXX.',
                numeric: 'Säljarens personnummer anges med enbart siffror.',
                customRegex: 'Använd följande format för personnummer: YYMMDDXXXX eller YYYYMMDDXXXX.'
            },
            first_name: {
                required: 'Förnamn är obligatoriskt.',
                max: (field, args) => 'Angivet förnamn får inte vara mer än ' + args + ' tecken.',
                regex: 'Förnamn kan anges med latinska och svenska bokstäver, mellanslag och bindestreck.',
                customRegex: 'Förnamn kan anges med latinska och svenska bokstäver, mellanslag och bindestreck.'
            },
            last_name: {
                required: 'Efternamn är obligatoriskt.',
                max: (field, args) => 'Angivet efternamn får inte vara mer än ' + args + ' tecken.',
                regex: 'Efternamn kan anges med latinska och svenska bokstäver, mellanslag och bindestreck.',
                customRegex: 'Efternamn kan anges med latinska och svenska bokstäver, mellanslag och bindestreck.'
            },
            hf_bank_account: {
                required: 'Kontonummer är obligatoriskt.'
            },
            seller_bank_account: {
                required: 'Kontonummer är obligatoriskt.',
                numeric: 'Kontonummer anges med enbart siffror.'
            },
            certificate_code: {
                required: 'Kontrollnummer är obligatoriskt.',
                numeric: 'Kontrollnummer anges med enbart siffror.',
                regex: 'Ange kontrollnummer med formatet XXXXXXXXXX.'
            },
            attach_transfer_receipt: {
                required: 'Vänligen ladda upp bild på förskottsbetalningen.',
                mimes: 'Ladda upp bilden i något av dessa format: jpeg, jpg, png, bmp, pdf.',
                ext: 'Ladda upp bilden i något av dessa format: jpeg, jpg, png, bmp, pdf, heic, heif.',
                size: (field, args) => 'Förskottsbilden får inte vara större än ' + args + ' KB.'
            },
            attach_paid_transfer_receipt: {
                required: 'Fältet ladda upp betalningskvittens är obligatoriskt.',
                mimes: 'Kvittensen måste vara en giltig filtyp: jpeg, jpg, png, bmp, pdf.',
                ext: 'Kvittensen måste vara en giltig filtyp: jpeg, jpg, png, bmp, pdf, heic, heif.',
                size: (field, args) => 'Den uppladdade betalningskvittensen får inte vara större än ' + args + ' KB.'
            },
            attach_import_cmr: {
              required: 'CMR är obligatoriskt',
              mimes: 'CMR måste vara en giltig filtyp: jpeg, jpg, png, bmp, pdf.',
              ext: 'CMR måste vara en giltig filtyp: jpeg, jpg, png, bmp, pdf, heic, heif.',
              size: (field, args) => 'Den uppladdade CMR får inte vara större än ' + args + ' KB.'
            },
            attach_import_entry_certificate: {
              mimes: 'The import entry certificate måste vara en giltig filtyp: jpeg, jpg, png, bmp, pdf.',
              ext: 'The import entry certificate måste vara en giltig filtyp: jpeg, jpg, png, bmp, pdf,heic, heif.',
              size: (field, args) => 'Den uppladdade import entry certificate får inte vara större än ' + args + ' KB.'
            },
            attach_vehicle_debt: {
                required: 'Vänligen ladda upp lösenofferten.',
                mimes: 'Ladda upp lösenofferten i något av dessa filformat: jpeg, jpg, png, bmp, pdf.',
                ext: 'Ladda upp lösenofferten i något av dessa filformat: jpeg, jpg, png, bmp, pdf, heic, heif.',
                size: (field, args) => 'Lösenoffertens filstorlek måste vara mindre än ' + args + ' KB.'
            },
            vehicle_debt_remaining: {
                required: 'Lösenbelopp är obligatoriskt.',
                numeric: 'Lösenbelopp anges med enbart siffror.',
                max_value: (field, args) => 'Lösenbelopp brukar vara ' + args + ' eller mindre.'
            },
            vehicle_debt_transfer_message: {
                required: 'Vänligen ange vad vi ska använda som betalningsmeddelande.',
                max: (field, args) => 'Betalningsmeddelandet får inte vara mer än ' + args + ' tecken.'
            },
            account_number_iban: {
                max: (field, args) => 'IBANkontonumret med maximalt ' + args + ' tecken.',
                min: (field, args) => 'IBANkontonumret får inte vara mindre än ' + args + '  tecken.',
                required: 'IBANkontonumret är obligatoriskt.',
                customRegex: 'IBANkontonumret ej gilti.',
            },
            transfer_message: {
                required: 'Vänligen ange vad vi ska använda som betalningsmeddelande.',
                max: (field, args) => 'Betalningsmeddelandet får inte var fler än ' + args + ' tecken.',
                customRegex: 'Betalningsmeddelandet kan anges med latinska och svenska bokstäver, siffror och bindestreck.'
            },
            bank_number: {
                required: 'Vänligen ange clearingnummer.',
                numeric: 'Clearingnummer får endast innehålla siffror.',
                max: (field, args) => 'Clearingnummer får inte vara längre än ' + args + ' siffror.'
            },
            debt_account_number: {
                debt_account_number: 'Fältet BG kontonummer anges med formatet XXX-XXXX eller XXXX-XXXX.',
                required: 'Fältet BG kontonummer är obligatoriskt.',
                between: 'Fältet BG kontonummer anges med formatet XXX-XXXX eller XXXX-XXXX.'
            },
            account_number: {
                required: 'Vänligen ange kontonummer.',
                account_number_bg: 'Fältet BG kontonummer anges med formatet XXX-XXXX eller XXXX-XXXX.',
                numeric: 'Kontonumret anges med endast siffror.',
                max: (field, args) => 'Fältet kontonummer kan inte vara längre än ' + args + ' siffror.'
            },
            clearing_house: {
                required: 'Vänligen ange clearinghus.'
            },
            account_type: {
                required: 'Kontoyp är obligatoriskt.'
            },
            dealer_comment: {
                required: 'Meddelande är obligatoriskt.',
                max: (field, args) => 'Kommentarsfältet kan inte vara längre än ' + args + ' tecken.',
                customRegex: 'Fältet kommentarsfältet kan anges med latinska och svenska bokstäver, siffror, bindestreck, ampersands och mellanslag.'
            },
            dealer_select: {
                customRegex: 'Vänligen välj anledning'
            },
            email: {
                required: 'Fältet mejl är obligatoriskt.',
                email: 'Mejladressen är inte giltigt format.',
                max: (field, args) => 'Mejladressen får inte vara längre än ' + args + ' tecken.',
                unique: 'Mejladressen används redan.'
            },
            new_email: {
                required: 'Fältet mejl är obligatoriskt.',
                email: 'Mejladressen är inte giltigt format.',
                max: (field, args) => 'Mejladressen får inte vara längre än ' + args + ' tecken.'
            },
            document_signer: {
                required: 'Behörig person för signatur behöver anges.',
            },
            bank_name: {
                required: 'Bank är obligatoriskt.',
            },
            deal_type: {
                required: 'Vänligen välj typ av inköp.'
            },
            dealer: {
                required: 'Bolagsnamnis är obligatoriskt.',
                customRegex: 'Bolagsnamnis kan anges med latinska och svenska bokstäver, siffror, bindestreck, ampersands och mellanslag.',
                selectedDealer: 'Bolagsnamn får endast innehålla handlare från denna lista.'
            },
            import_seller: {
                required: 'Säljare är obligatoriskt.',
                customRegex: 'Säljare kan endast innehålla latinska och svenska bokstäver, siffror, bindestreck, ampersands och mellanslag.',
                selectedSeller: 'Välj säljare eller kryssa i rutan nedan',
            },
            financing_rate: {
                required: 'Finansieringsgrad är obligatoriskt.',
                decimal: (field, args) => 'Finansieringsgrad måste vara numerisk och kan innehålla max ' + args + ' decimaler.',
                between: (field, args) => 'Financing rate måste vara en siffra mellan ' + args[0] + ' och ' + args[1] + '.',
                customRegex: 'Finansieringsgrad anges med endast siffror.',
                max: 'Affären överstiger maximalt kreditbelopp per objekt.'
            },
            administrative_fee: {
                required: 'Uppläggningsavgift är obligatoriskt.',
                max_value: (field, args) => 'Uppläggningsavgift behöver vara ' + args + ' eller mindre.',
                customRegex: 'Uppläggningsavgift anges med endast siffror.'
            },
            credit_amount: {
                required: 'Kreditbelopp är obligatoriskt.',
            },
            insurer_number: {
                required: 'Försäkringsbolagets organisationsnummer är obligatoriskt.',
                numeric: 'Försäkringsbolagets organisationsnummer kan anges med endast siffror.',
                digits: 'Försäkringsbolagets organisationsnummer måste vara 10 siffror långt.'
            },
            insurer_name: {
                required: 'Försäkringsbolag namn är obligatoriskt.',
                max: (field, args) => 'Försäkringsbolag namn med maximalt ' + args + ' tecken.',
                min: (field, args) => 'Försäkringsgivarens namn måste vara ' + args + ' tecken.',
                customRegex: 'Försäkringsbolag namn kan anges med latinska och svenska bokstäver, siffror, bindestreck, ampersands och mellanslag.'
            },
            amount: {
                required: 'Försäkringsbelopp är obligatoriskt.',
                numeric: 'Försäkringsbelopp kan anges med endast siffror.',
                max_value: (field, args) => 'Försäkringsbelopp behöver vara ' + args + ' eller mindre.',
                min_value: (field, args) => 'Försäkringsbelopp behöver vara ' + args + ' eller mer.',
            },
            amount_payment: {
                required: 'Betalningsbelopp är obligatoriskt.',
                numeric: 'Betalningsbelopp till säljaren kan anges med endast siffror',
            },
            premium: {
                required: 'Försäkringspremie är obligatoriskt.',
                customRegex: 'Försäkringspremie kan anges med endast siffror.',
                max_value: (field, args) => 'Försäkringspremie behöver vara ' + args + ' eller mindre.',
                min_value: (field, args) => 'Försäkringspremie behöver vara ' + args + ' eller mer.',
                decimal: (field, args) => 'Försäkringspremie måste vara numerisk och kan innehålla max ' + args + ' decimaler.',
            },
            assigneed_to: {
                required: 'Trafikförsäkring är obligatoriskt.',
            },
            attach_vehicle_insurance: {
                required: 'Försäkringsbrev är obligatoriskt.',
                mimes: 'Ladda upp bilden i något av dessa format: jpeg, jpg, png, bmp, pdf.',
                ext: 'Ladda upp bilden i något av dessa format: jpeg, jpg, png, bmp, pdf, heic, heif.',
                size: (field, args) => 'Förskottsbilden får inte vara större än ' + args + ' KB.'
            },
            traffic_coverage: {
                required: 'Trafikförsäkring är obligatoriskt.',
            },
            end_date: {
                required: 'Försäkring slutdatum är obligatoriskt.',
            },
            attach_insurance_contract: {
                required: 'Ladda upp partnerskapsavtal är obligatoriskt.',
                mimes: 'Ladda upp bilden i något av dessa format: jpeg, jpg, png, bmp, pdf.',
                ext: 'Ladda upp bilden i något av dessa format: jpeg, jpg, png, bmp, pdf, heic, heif.',
                size: (field, args) => 'Förskottsbilden får inte vara större än ' + args + ' KB.'
            },
            vehicle_description: {
                required: 'Beskrivning är obligatoriskt.',
                customRegex: 'Fältet beskrivning får endast innehålla tecken från latinska och svenska alfabetet.',
                max: (field, args) => 'Fordonet beskrivning får inte var fler än ' + args + ' tecken.',
            },
            engine_description: {
                required: 'Kommentar av motor och växellåda är obligatorisk.',
                customRegex: 'Fältet kommentar av motor och växellåda får endast innehålla tecken från latinska och svenska alfabetet.',
                max: (field, args) => 'Kommentar av motor och växellåda får inte var fler än ' + args + ' tecken.',
            },
            breaks_description: {
                required: 'Kommentar av bromsar är obligatorisk.',
                customRegex: 'Fältet kommentar av bromsar får endast innehålla tecken från latinska och svenska alfabetet.',
                max: (field, args) => 'Kommentar av bromsar får inte var fler än ' + args + ' tecken.',
            },
            technology_description: {
                required: 'Kommentar av teknik och utrustning är obligatorisk.',
                customRegex: 'Fältet kommentar av teknik och utrustning får endast innehålla tecken från latinska och svenska alfabetet.',
                max: (field, args) => 'Kommentar av teknik och utrustning får inte var fler än ' + args + ' tecken.',
            },
            body_description: {
                required: 'Kommentar av kaross är obligatorisk.',
                customRegex: 'Fältet kommentar av kaross får endast innehålla tecken från latinska och svenska alfabetet.',
                max: (field, args) => 'Kommentar av kaross får inte var fler än ' + args + ' tecken.',
            },
            interior_description: {
                required: 'Kommentar av interiör är obligatorisk.',
                customRegex: 'Fältet kommentar av interiör får endast innehålla tecken från latinska och svenska alfabetet.',
                max: (field, args) => 'Kommentar av interiör får inte var fler än ' + args + ' tecken.',
            },
            tire_description: {
                required: 'Däck beskrivning är obligatoriskt.',
                customRegex: 'Däck beskrivning anges med endast siffror',
                greaterThanZero: 'Mönsterdjupet måste vara större än 0 mm.',
                between: (field, args) => 'Mönsterdjupet kan inte vara större än ' + args[1] + ' mm.',
            },
            mileage_begin: {
                customRegex: (field, arg) =>  '‘Från‘ - fältet måste vara mindre än ' + arg+ '.' ,
                numeric: '‘Från‘ - fältet anges med enbart siffror.',
                max_value: '‘Från‘ - fältet får inte var fler än 999999',
            },
            mileage_end: {
                customRegex: (field, arg) =>  '‘Till‘ - fältet måste vara större än ' + arg+'.' ,
                numeric: '‘Till‘ - fältet anges med enbart siffror.',
                max_value: '‘Till‘ - fältet får inte var fler än 999999',
            },
            price_begin: {
                customRegex: (field, arg) =>  '‘Från‘-fältet måste vara mindre än ' + arg+ '.' ,
                numeric: '‘Från‘ - fältet anges med enbart siffror.',
                min_value: '‘Från‘ - fältet måste vara större än 1000.',
                max_value: '‘Till‘ - fältet får inte var fler än 99999999.',
            },
            price_end: {
                customRegex: (field, arg) =>  '‘Till‘ - fältet måste vara större än ' + arg+'.' ,
                numeric: '‘Till‘ - fältet anges med enbart siffror.',
                min_value: '‘Till‘ - fältet måste vara större än 1000.',
                max_value: '‘Till‘ - fältet får inte var fler än 99999999.',
            },
            upload_photo_advertisement: {
                customRegex: (field, arg) => 'Antalet bifogade bilder får max vara ' + arg + 'st.'
            },
            password: {
                required: 'Fältet lösenord är obligatoriskt.',
            },
            online_store_url: {
                url: 'Online-shop URL har ett ogiltigt format.',
                required: 'Online-shop URL är obligatoriskt.',
                customRegex: 'Online-shop URL kan anges med latinska bokstäver, siffror och bindestreck.',
                max: (field, args) => 'Online-shop URL får max innehålla ' + args + ' tecken.'
            },
            purpose_of_using: {
                required: 'Syfte med att använda är obligatoriskt.',
            },
            vehicle_types: {
                required: 'Typer av fordon är obligatoriskt.',
            },
            price_range: {
                required: 'Prisklass köper är obligatoriskt.',
            },
            dealership_address_option: {
                required: 'Adressen är obligatoriskt.',
            },
            extent_of_control: {
                required: 'Omfattning av kontroll  är obligatoriskt.',
            },
            type_of_control: {
                required: 'Typ av kontroll  är obligatoriskt.',
            },
        }
}

export { swe }

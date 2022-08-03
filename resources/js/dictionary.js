const dictionary = {
    eng: {
        custom: {
          attach_purchase_document: {
            required: 'The purchase document field is required.',
            ext: 'The purchase document field must have a valid file type: jpeg, jpg, png, bmp, pdf, heic, heif.',
            size: (field, args) => 'The purchase document size must be less than ' + args + ' KB.'
          },
          vehicle_registration_country: {
                required: 'The vehicle registration country field is required.',
            },
            vat_deposit_amount: {
                required: 'The vat deposit amount field is required.',
                max_value: (field, args) => 'The VAT deposit amount field must be ' + args + ' or less.',
                min_value: (field, args) => 'The VAT deposit amount field must be ' + args + ' or more.',
                numeric: 'The VAT deposit amount field may contain only numeric characters.',
                greaterThanZero: 'The VAT deposit amount field needs to be greater than zero.',
                customRegex: 'The VAT deposit amount field may contain only numeric characters.'
            },
            vehicle_vin: {
                required: 'The vehicle vin code field is required.',
                customRegex: 'The vehicle vin code is invalid',
                max: (field, args) => 'The vehicle vin code field must be ' + args + ' characters.'
            },
            first_registration_date: {
                required: 'The first registration date field is required.',
                customRestriction: 'We don\'t provide financing to Non-VAT cars that are younger 6 month.'
            },
            transport_fee: {
                required: 'The transport fee field is required.',
                max_value: (field, args) => 'The transport fee field must be ' + args + ' or less.',
                min_value: (field, args) => 'The transport fee field must be ' + args + ' or more.',
                numeric: 'The transport fee field may contain only numeric characters.',
                greaterThanZero: 'The transport fee field needs to be greater than zero.',
                customRegex: 'The transport fee field may contain only numeric characters.'
            },
            vehicle_registration_number: {
                required: 'The vehicle registration number field is required.',
                regex: 'The vehicle registration number field format should be AAA11X. Where "AAA" - Latin letters A-Z, "11" - numbers 0-9, "X" can be Latin letter or number.',
                customRegex: 'The vehicle registration number field format should be AAA11X. Where "AAA" - Latin letters A-Z, "11" - numbers 0-9, "X" can be Latin letter or number.',
                max: (field, args) => 'The vehicle registration number field must be ' + args + ' characters.'
            },
            price: {
                required: 'The price with VAT field is required.',
                max_value: (field, args) => 'The price with VAT field must be ' + args + ' or less.',
                min_value: (field, args) => 'The price with VAT field must be ' + args + ' or more.',
                numeric: 'The price with VAT field may contain only numeric characters.',
                greaterThanZero: 'The price with VAT field needs to be greater than zero.',
                customRegex: 'The price with VAT field may contain only numeric characters.'
            },
            bid: {
                required: 'The bid field is required.',
                numeric: 'The place your bid field may contain only numeric characters.',
                customRegex: 'The bid must be a multiple of 500 SEK.',
                max_value: (field, args) => 'The amount may not be greater than ' + args + '.',
            },
            vehicle_price_with_vat: {
                required: 'The price field is required.',
                max_value: (field, args) => 'The price field must be ' + args + ' or less.',
                min_value: (field, args) => 'The price field must be ' + args + ' or more.',
                numeric: 'The price field may contain only numeric characters.',
                greaterThanZero: 'The price field needs to be greater than zero.',
                customRegex: 'The price field may contain only numeric characters.'
            },
            purchase_fee: {
                required: 'The seller\'s purchase fee field is required.',
                max_value: (field, args) => 'The seller\'s purchase fee field must be ' + args + ' or less.',
                min_value: (field, args) => 'The seller\'s purchase fee field must be ' + args + ' or more.',
                numeric: 'The seller\'s purchase fee field may contain only numeric characters.',
                greaterThanZero: 'The seller\'s purchase fee field needs to be greater than zero.',
                customRegex: 'The seller\'s purchase fee field may contain only numeric characters.'
            },
            vehicle_advance_payment: {
                required: 'The vehicle advance payment field is required.',
                numeric: 'The vehicle advance payment field may contain only numeric characters.',
                max_value: (field, args) => 'The vehicle advance payment field must be ' + args + ' or less.',
                min_value: (field, args) => 'The vehicle advance payment field must be ' + args + ' or more.',
                greaterThanZero: 'The vehicle advance payment field needs to be greater than zero.',
                customRegex: 'The vehicle advance payment field may contain only numeric characters.'
            },
            dealer_vehicle_mileage: {
                required: 'The mileage field is required.',
                numeric: 'The mileage field may contain only numeric characters.',
                max_value: (field, args) => 'The mileage field must be ' + args + ' or less.',
                min_value: (field, args) => 'The mileage field must be ' + args + ' or more.',
                greaterThanZero: 'The mileage field needs to be greater than zero.',
                customRegex: 'The mileage field may contain only numeric characters.',
                customRestriction: 'We don\'t provide financing to Non-VAT cars that are mileage less than 6000 km.',
            },
            mileage_unit: {
                required: 'The mileage units field is required.',
            },
            vat: {
                required: 'Please select VAT option.',
                included: 'Please select VAT option.'
            },
            purchase_receipt_type: {
                required: 'The purchase receipt type field is required.',
                included: 'Please choose the purchase receipt type.'
            },
            seller_type: {
                required: 'The seller type field is required.',
                included: 'Please choose the seller type.'
            },
            attach_invoice: {
                required: 'The invoice field is requred.',
                required_if: 'The invoice field is requred.',
                mimes: 'The attach invoice field must have a valid file type: jpeg, jpg, png, bmp, pdf.',
                ext: 'The attach invoice field must have a valid file type: jpeg, jpg, png, bmp, pdf, heic, heif.',
                size: (field, args) => 'The attach invoice size must be less than ' + args + ' KB.'
            },
            attach_purchase_fee_invoice: {
                required: 'The purchase fee invoice field is required.',
                required_if: 'The purchase fee invoice field is required.',
                mimes: 'The purchase fee invoice field must have a valid file type: jpeg, jpg, png, bmp, pdf.',
                ext: 'The purchase fee invoice field must have a valid file type: jpeg, jpg, png, bmp, pdf, heic, heif.',
                size: (field, args) => 'The purchase fee invoice size must be less than ' + args + ' KB.'
            },
            seller_phone: {
                required: 'The phone field is required.',
                required_if: 'The phone field is required.',
                regex: 'Please enter a valid phone number.',
                min: 'Please enter a valid phone number.',
                max: 'Please enter a valid phone number.'
            },
            new_phone: {
                required: 'The phone field is required.',
                regex: 'Please enter a valid phone number.',
                min: 'Please enter a valid phone number.',
                max: 'Please enter a valid phone number.'
            },
            phone: {
                required: 'The phone field is required.',
                regex: 'Please enter a valid phone number.',
                numeric: 'The phone field may contain only numeric characters.',
                customRegex: 'The phone field may contain only numeric characters.',
                unique: 'The phone has already been taken.',
                min: 'Please enter a valid phone number.',
                max: 'Please enter a valid phone number.'
            },
            deal_time: {
                required: 'The deal time field is required.',
                required_if: 'The deal time field is required.',
                date_format: 'The deal time must be in the format yyyy-mm-dd hh-mm.'
            },
            start_date: {
                required: 'The start date field is required.'
            },
            organisation_number: {
                required: 'The organisation number field is required.',
                regex: 'The organisation number field must be 10 digits long.',
                organisation_number_unique: 'The organisation number has already been taken.',
                customRestriction: 'Sorry, this deal can not be processed through Handlarfinans.'
            },
            seller_organisation_number: {
                required: 'The seller organisation number field is required.',
                numeric: 'The seller organisation number field may contain only numeric characters.',
                regex: 'The seller organisation number field must be 10 digits long.'
            },
            organisation_name: {
                required: 'The organisation name field is required.',
                max: (field, args) => 'The organisation name field may not be greater than ' + args + ' characters.',
                customRegex: 'The organisation name field may contain only Latin and Swedish letters.'
            },
            seller_person_first_name: {
                required: 'The first name field is required.',
                max: (field, args) => 'The first name field may not be greater than ' + args + ' characters.',
                customRegex: 'The first name field may contain only Latin and Swedish letters, spaces and dashes.'
            },
            seller_person_last_name: {
                required: 'The last name field is required.',
                max: (field, args) => 'The last name field may not be greater than ' + args + ' characters.',
                customRegex: 'The last name field may contain only Latin and Swedish letters, spaces and dashes.'
            },
            seller_person_name: {
                required: 'The seller person name field is required.',
                max: (field, args) => 'The seller person name field may not be greater than ' + args + ' characters.'
            },
            post_city: {
                required: 'The post city field is required.',
                max: (field, args) => 'The post city field may not be greater than ' + args + ' characters.',
                customRegex: 'The post city field may contain only Latin and Swedish letters, spaces and dashes.'
            },
            post_address: {
                required: 'The post address field is required.',
                max: (field, args) => 'The post address field may not be greater than ' + args + ' characters.',
                customRegex: 'The post address field may contain only Latin and Swedish letters, spaces and dashes, commas, dots, digits.'
            },
            post_postal_code: {
                required: 'The zip code field is required.',
                numeric: 'The zip code field may contain only numeric characters.',
                regex: 'The zip code field format must be XXXXXXXXXX.',
                customRegex: 'The zip code field may contain only numeric characters.',
                max: (field, args) => 'The zip code field may not be greater than ' + args + ' characters.',
                min: (field, args) => 'The zip code field must be at least ' + args + ' characters.'
            },
            social_security_number: {
                required: 'The SSN field is required.',
                regex: 'The SSN field format must be YYYYMMDDXXXX.',
                numeric: 'The SSN field may contain only numeric characters.',
                customRegex: 'The SSN field may contain only numeric characters.',
                customRestriction: 'Sorry, this deal can not be processed through Handlarfinans.',
                unique: 'The SSN has already been taken.',
            },
            seller_social_security_number: {
                required: 'The SSN field is required.',
                regex: 'The SSN field format must be YYMMDDXXXX or YYYYMMDDXXXX.',
                numeric: 'The SSN field may contain only numeric characters.',
                customRegex: 'The SSN field format must be YYMMDDXXXX or YYYYMMDDXXXX.',
            },
            first_name: {
                required: 'The first name field is required.',
                max: (field, args) => 'The first name field may not be greater than ' + args + ' characters.',
                regex: 'The first name field may contain only Latin and Swedish letters, spaces and dashes.',
                customRegex: 'The first name field may contain only Latin and Swedish letters, spaces and dashes.'
            },
            last_name: {
                required: 'The last name field is required.',
                max: (field, args) => 'The last name field may not be greater than ' + args + ' characters.',
                regex: 'The last name field may contain only Latin and Swedish letters, spaces and dashes.',
                customRegex: 'The last name field may contain only Latin and Swedish letters, spaces and dashes.'
            },
            hf_bank_account: {
                required: 'The bank account field is required.'
            },
            seller_bank_account: {
                required: 'The seller bank account field is required.',
                numeric: 'The seller bank account field may contain only numeric characters.'
            },
            certificate_code: {
                required: 'The certificate code field is required.',
                numeric: 'The certificate code field may contain only numeric characters.',
                regex: 'The certification code should be 10 digits long.'
            },
            attach_transfer_receipt: {
                required: 'The attach prepayment transfer receipt field is required.',
                mimes: 'The attach prepayment transfer receipt field must have a valid file type: jpeg, jpg, png, bmp, pdf.',
                ext: 'The attach prepayment transfer receipt field must have a valid file type: jpeg, jpg, png, bmp, pdf, heic, heif.',
                size: (field, args) => 'The attach prepayment transfer receipt size must be less than ' + args + ' KB.'
            },
            attach_paid_transfer_receipt: {
                required: 'The attach paid transfer receipt field is required.',
                mimes: 'The attach paid transfer receipt field must have a valid file type: jpeg, jpg, png, bmp, pdf.',
                ext: 'The attach paid transfer receipt field must have a valid file type: jpeg, jpg, png, bmp, pdf,heic, heif.',
                size: (field, args) => 'The attach paid transfer receipt size must be less than ' + args + ' KB.'
            },
            attach_import_cmr: {
              required: 'The import CMR field is required.',
              mimes: 'The import CMR field must have a valid file type: jpeg, jpg, png, bmp, pdf.',
              ext: 'The import CMR field must have a valid file type: jpeg, jpg, png, bmp, pdf,heic, heif.',
              size: (field, args) => 'The import CMR size must be less than ' + args + ' KB.'
            },
            attach_import_entry_certificate: {
              mimes: 'The import entry certificate field must have a valid file type: jpeg, jpg, png, bmp, pdf.',
              ext: 'The import entry certificate field must have a valid file type: jpeg, jpg, png, bmp, pdf,heic, heif.',
              size: (field, args) => 'The import entry certificate size must be less than ' + args + ' KB.'
            },
            attach_vehicle_debt: {
                required: 'The attach redemption instruction field is required.',
                mimes: 'The attach redemption instruction field must have a valid file type: jpeg, jpg, png, bmp, pdf.',
                ext: 'The attach redemption instruction field must have a valid file type: jpeg, jpg, png, bmp, pdf, heic, heif.',
                size: (field, args) => 'The attach redemption instruction size must be less than ' + args + ' KB.'
            },
            vehicle_debt_remaining: {
                required: 'The redemption amount field is required.',
                numeric: 'The redemption amount field may contain only numeric characters.',
                max_value: (field, args) => 'The redemption amount field must be ' + args + ' or less.'
            },
            vehicle_debt_transfer_message: {
                required: 'The redemption transfer message field is required.',
                max: (field, args) => 'The redemption transfer message field may not be greater than ' + args + ' characters.',
                customRegex: 'The redemption transfer message field may contain only Latin and Swedish letters.'
            },
            account_number_iban: {
                max: (field, args) => 'The IBAN field may not be greater than ' + args + ' characters.',
                min: (field, args) => 'The IBAN field may not be less than ' + args + ' characters.',
                required: 'The IBAN field is required.',
                customRegex: 'The IBAN number field not valid.',
            },
            transfer_message: {
                required: 'The payment transfer message field is required.',
                max: (field, args) => 'The payment transfer message field may not be greater than ' + args + ' characters.',
                customRegex: 'The payment transfer message may contain only Latin and Swedish letters, numbers and dashes.'
            },
            bank_number: {
                required: 'The bank number field is required.',
                numeric: 'The bank number field may contain only numeric characters.',
                max: (field, args) => 'The bank number field may not be greater than ' + args + ' digits.'
            },
            debt_account_number: {
                debt_account_number: 'The BG bank account number field must be XXX-XXXX or XXXX-XXXX.',
                required: 'The BG bank account number field is required.',
                between: 'The BG bank account number field must be XXX-XXXX or XXXX-XXXX.'
            },
            account_number: {
                required: 'The account number field is required.',
                account_number_bg: 'The account number field must be XXX-XXXX or XXXX-XXXX.',
                numeric: 'The account number field may contain only numeric characters.',
                max: (field, args) => 'The account number field may not be greater than ' + args + ' digits.'
            },
            clearing_house: {
                required: 'The clearing house field is required.'
            },
            account_type: {
                required: 'The account type field is required.'
            },
            dealer_comment: {
                required: 'The message field is required.',
                max: (field, args) => 'The dealer comment field may not be greater than ' + args + ' characters.',
                customRegex: 'The dealer comment field may contain only Latin and Swedish letters, numbers, dashes, ampersands and underscores.'
            },
            dealer_select: {
                customRegex: 'Please choose an option'
            },
            email: {
                required: 'The email field is required.',
                email: 'The email value is not valid.',
                max: (field, args) => 'The email field may not be greater than ' + args + ' characters.',
                unique: 'The email has already been taken.'
            },
            new_email: {
                required: 'The email field is required.',
                email: 'The email value is not valid.',
                max: (field, args) => 'The email field may not be greater than ' + args + ' characters.'
            },
            document_signer: {
                required: 'The document signer field is required.',
            },
            bank_name: {
                required: 'The bank name field is required.',
            },
            deal_type: {
                required: 'Please choose the type of purchase.'
            },
            dealer: {
                required: 'The dealer organisation field is required.',
                customRegex: 'The dealer organisation field may contain only Latin and Swedish letters, numbers, dashes, ampersands and underscores.',
                selectedDealer: 'The dealer organisation field may only contain a dealer from the present list.'
            },
            import_seller: {
              required: 'The seller organisation field is required.',
              customRegex: 'The seller organisation field may contain only Latin and Swedish letters, numbers, dashes, ampersands and underscores.',
              selectedSeller: 'Choose organisation or mark checkbox',
            },
            financing_rate: {
                required: 'The financing rate field is required.',
                decimal: (field, args) => 'The financing rate field must be numeric and may contain ' + args + ' decimal points.',
                between: (field, args) => 'The financing rate must be between ' + args[0] + ' and ' + args[1] + '.',
                customRegex: 'The financing rate field may contain only numeric characters.',
                max: 'The deal exceeds maximum credit amount per vehicle.'
            },
            administrative_fee: {
                required: 'The administrative fee field is required.',
                max_value: (field, args) => 'The administrative fee field must be ' + args + ' or less.',
                customRegex: 'The administrative fee field may contain only numeric characters.'
            },
            credit_amount: {
                required: 'The credit amount field is required.',
            },
            insurer_number: {
                required: 'The insurer company number field is required.',
                numeric: 'The insurer number field may contain only numeric characters.',
                digits: 'The insurer company number field must be 10 digits long.',
            },
            insurer_name: {
                required: 'The insurer company name field is required.',
                max: (field, args) => 'The insurer company name field may not be greater than ' + args + ' characters.',
                min: (field, args) => 'The insurer name field must be at least ' + args + ' characters.',
                customRegex: 'The insurer company name may contain only Latin and Swedish letters, numbers, dashes, ampersands and underscores.'
            },
            amount: {
                required: 'The insurance amount field is required.',
                numeric: 'The insurance amount field may contain only numeric characters.',
                max_value: (field, args) => 'The insurance amount field must be ' + args + ' or less.',
                min_value: (field, args) => 'The insurance amount field must be ' + args + ' or more.',
            },
            amount_payment: {
                required: 'The payment amount field is required.',
                numeric: 'The payment amount to seller field may contain only numeric characters.',
            },
            premium: {
                required: 'The insurance premium field is required.',
                customRegex: 'The insurance premium field may contain only numeric characters.',
                max_value: (field, args) => 'The insurance premium field must be ' + args + ' or less.',
                min_value: (field, args) => 'The insurance premium field must be ' + args + ' or more.',
                decimal: (field, args) => 'The insurance premium field must be numeric and may contain ' + args + ' decimal points.',
            },
            assigneed_to: {
                required: 'The assigned to field is required.',
            },
            attach_vehicle_insurance: {
                required: 'The insurance letter field is required.',
                mimes: 'The insurance letter field must have a valid file type: jpeg, jpg, png, bmp, pdf.',
                ext: 'The insurance letter must have a valid file type: jpeg, jpg, png, bmp, pdf, heic, heif.',
                size: (field, args) => 'The insurance letter size must be less than ' + args + ' KB.'
            },
            traffic_coverage: {
                required: 'The traffic coverage field is required.',
            },
            end_date: {
                required: 'The insurance end date field is required.',
            },
            attach_insurance_contract: {
                required: 'The upload partnership contract field is required.',
                mimes: 'The upload partnership contract field must have a valid file type: jpeg, jpg, png, bmp, pdf.',
                ext: 'The upload partnership contract must have a valid file type: jpeg, jpg, png, bmp, pdf, heic, heif.',
                size: (field, args) => 'The upload partnership contract size must be less than ' + args + ' KB.'
            },
            vehicle_description: {
                required: 'The vehicle description field is required.',
                customRegex: 'The vehicle description field may contain only Latin and Swedish letters.',
                max: (field, args) => 'The vehicle description field may not be greater than ' + args + ' characters.'
            },
            engine_description: {
                required: 'The engine and gearbox comment field is required.',
                customRegex: 'The engine and gearbox comment field may contain only Latin and Swedish letters.',
                max: (field, args) => 'The engine and gearbox comment field may not be greater than ' + args + ' characters.'
            },
            breaks_description: {
                required: 'The brakes comment field is required.',
                customRegex: 'The brakes comment field may contain only Latin and Swedish letters.',
                max: (field, args) => 'The brakes comment field may not be greater than ' + args + ' characters.'
            },
            technology_description: {
                required: 'The technology and equipment comment field is required.',
                customRegex: 'The technology and equipment comment field may contain only Latin and Swedish letters.',
                max: (field, args) => 'The technology and equipment comment field may not be greater than ' + args + ' characters.'
            },
            body_description: {
                required: 'The body comment field is required.',
                customRegex: 'The body comment field may contain only Latin and Swedish letters.',
                max: (field, args) => 'The body comment field may not be greater than ' + args + ' characters.'
            },
            interior_description: {
                required: 'The interior comment field is required.',
                customRegex: 'The interior comment field may contain only Latin and Swedish letters.',
                max: (field, args) => 'The interior comment field may not be greater than ' + args + ' characters.',
            },
            tire_description: {
                required: 'The tire description field is required.',
                customRegex: 'The tire description field may contain only numeric characters.',
                greaterThanZero: 'Tire tread depth must be greater than 0 mm.',
                between: (field, args) => 'Tire tread depth can not be bigger than ' + args[1] + ' mm.',
            },
            mileage_begin: {
                customRegex: (field, arg) =>  'The ‘from’ field must be ' + arg+ ' or less' ,
                numeric: 'The ‘from‘ field may contain only numeric characters.',
                max_value: 'The ‘from‘ field may not be greater than 999999.',
            },
            mileage_end: {
                customRegex: (field, arg) =>  'The ‘to‘ field must be ' + arg +' or more.' ,
                numeric: 'The ‘to‘ field may contain only numeric characters.',
                max_value: 'The ‘to‘ field may not be greater than 999999.',
            },
            price_begin: {
                customRegex: (field, arg) =>  'The ‘from’ field must be ' + arg+ ' or less' ,
                numeric: 'The ‘from‘ field may contain only numeric characters.',
                min_value: 'The ‘from‘ field may not be less then 1000.',
                max_value: 'The ‘from‘ field may not be greater than 99999999.',
            },
            price_end: {
                customRegex: (field, arg) =>  'The ‘to‘ field must be ' + arg +' or more.' ,
                numeric: 'The ‘to‘ field may contain only numeric characters.',
                min_value: 'The ‘to‘ field may not be less then 1000.',
                max_value: 'The ‘to‘ field may not be greater than 99999999.',
            },
            upload_photo_advertisement: {
                customRegex: (field, arg) => 'The number of attachments can not be more than ' + arg + '.'
            },
            password: {
                required: 'The password field is required.',
            },
            online_store_url: {
                url: 'The online store URL format is invalid.',
                required: 'The online store URL field is required.',
                customRegex: 'The online store URL field may contain only Latin letters, numbers and hyphens',
                max: (field, args) => 'The online store URL may not be greater than ' + args + ' characters.',
            },
            purpose_of_using: {
                required: 'The purpose of using field is required.',
            },
            vehicle_types: {
                required: 'The vehicles types field is required.',
            },
            price_range: {
                required: 'The price range field is required.',
            },
            dealership_address_option: {
                required: 'The address field is required.',
            },
            extent_of_control: {
                required: 'Extent of control field is required.',
            },
            type_of_control: {
                required: 'Type of control field is required.',
            },
        }
    },
    swe: {
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
}

export { dictionary }

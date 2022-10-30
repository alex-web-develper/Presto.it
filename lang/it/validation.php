<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Il :attribute deve essere accettato.',
    'accepted_if' => 'Il :attribute deve esserre accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute must have between :min and :max items.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute must be between :min and :max.',
        'string' => 'The :attribute must be between :min and :max characters.',
    ],
    'boolean' => 'Il :attribute campo dovrebbe essere vero o falso',
    'confirmed' => ':attribute e :attribute conferma non sono uguali',
    'current_password' => 'La password è sbagliata',
    'date' => 'IL :attribute non è una data valida',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'Dimensione dell\'immagine non supportata o non valida.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'doesnt_end_with' => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute may not start with one of the following: :values.',
    'email' => 'Deve essere una email valida.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'il selezionato :attribute è invalido.',
    'file' => 'il :attribute deve essere un file',
    'filled' => 'Deve avere almeno un valore',
    'gt' => [
        'array' => ':attribute deve avere più di :value oggetti.',
        'file' => ':attribute deve essere più di :value kilobytes.',
        'numeric' => ':attribute deve essere più di :value.',
        'string' => ':attribute deve essere più grande di :value caratteri.',
    ],
    'gte' => [
        'array' => ':attribute deve avere :value oggetti o più.',
        'file' => ':attribute deve essere :value kilobytes o più.',
        'numeric' => ':attribute deve essere :value o maggiore.',
        'string' => ':attribute deve essere di :value caratteri o più.',
    ],
    'image' => 'Il:attribute deve essere un immagine.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'Deve essere un valore intero.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'array' => ':attribute deve avere meno di :value oggetti.',
        'file' => ':attribute deve essere meno di :value kilobytes.',
        'numeric' => ':attribute deve essere meno di :value.',
        'string' => ':attribute deve essere più piccolo di :value caratteri.',
    ],
    'lte' => [
        'array' => ':attribute deve avere :value oggetti o meno.',
        'file' => ':attribute deve essere :value kilobytes o meno.',
        'numeric' => ':attribute deve essere :value o minore.',
        'string' => ':attribute deve essere di :value caratteri o meno.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC characters.',
    'max' => [
        'array' => 'Deve essere al massimo di :max oggetti.',
        'file' => 'Deve essere al massimo di :max kilobytes.',
        'numeric' => 'Deve essere al massimo di :max.',
        'string' => 'Deve essere al massimo di :max caratteri.',
    ],
    'max_digits' => 'il :attribute non deve avere oltre :max digitazioni.',
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'Deve essere di almeno di :min oggetti.',
        'file' => 'Deve essere di almeno di :min kilobytes.',
        'numeric' => 'Deve essere di almeno di :min.',
        'string' => 'Deve essere di almeno di :min caratteri.',
    ],
    'min_digits' => 'Deve avere almeno :min digitazione.',
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'Deve essere un numero',
    'password' => [
        'letters' => 'Deve contenere almeno una lettera',
        'mixed' => 'Deve contenere almeno una miuscola ed una minuscola.',
        'numbers' => 'Deve contenere almeno un numero.',
        'symbols' => 'Deve contenere almeno un simbolo',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'Il campo deve essere presente.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'Il campo è richiesto.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'Il :attribute e :other devono combaciare.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'Il :attribute deve essere di :size kilobytes.',
        'numeric' => 'Il :attribute deve essere di :size.',
        'string' => 'IL :attribute deve essere di :size caratteri.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'Deve essere una frase.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];

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

    'accepted'        => 'O  :attribute precisa ser aceitável.',
    'active_url'      => 'O :attribute não é uma URL válida.',
    'after'           => 'O :attribute precisa ser uma data posterior a :date.',
    'after_or_equal'  => 'O :attribute precisa ser uma data posterior ou igual a :date.',
    'alpha'           => 'O :attribute deve conter apenas letras.',
    'alpha_dash'      => 'O :attribute deve conter apenas letras, números, hífens e underline.',
    'alpha_num'       => 'O :attribute deve conter apenas letras e números.',
    'array'           => 'O :attribute precisa ser um array.',
    'before'          => 'O :attribute precisa ser uma data anterior a :date.',
    'before_or_equal' => 'O :attribute precisa ser uma data anterior ou igual a :date.',

    'between' => [
        'numeric'     => 'The :attribute must be between :min and :max.',
        'file'        => 'The :attribute must be between :min and :max kilobytes.',
        'string'      => 'The :attribute must be between :min and :max characters.',
        'array'       => 'The :attribute must have between :min and :max items.',
    ],

    'boolean'        => 'O :attribute precisa ser verdadeiro ou falso.',
    'confirmed'      => 'A confirmação do :attribute não corresponde.',
    'date'           => 'O :attribute não é uma data válida.',
    'date_equals'    => 'O :attribute precisa ser uma ta igual a :date.',
    'date_format'    => 'O :attribute não corresponde com o formato :format.',
    'different'      => 'O :attribute e :other precisam ser diferentes.',
    'digits'         => 'O :attribute precisa ter :digits dígitos.',
    'digits_between' => 'O :attribute precisa ter entre :min e :max dígitos.',
    'dimensions'     => 'O :attribute tem dimensões inválidas de imagem.',
    'distinct'       => 'O :attribute tem valor duplicado.',
    'email'          => 'O :attribute precisa ser um endereço de email válido.',
    'ends_with'      => 'O :attribute precisa terminar com um dos seguintes valores: :values.',
    'exists'         => 'O campo selecionado :attribute é inválido.',
    'file'           => 'O :attribute precisa ser um arquivo.',
    'filled'         => 'O :attribute precisa ter um valor.',

    'gt' => [
        'numeric'   => 'O campo :attribute deve ter no máximo :value caracteres.',
        'file'      => 'O campo :attribute deve ter no máximo :value kilobytes.',
        'string'    => 'O campo :attribute deve ter no máximo :value caracteres.',
        'array'     => 'O campo :attribute deve ter no máximo :value items.',
    ],

    'gte' => [
        'numeric' => 'O campo :attribute deve ter no máximo :value caracteres.',
        'file'    => 'O campo :attribute deve ter no máximo :value kilobytes.',
        'string'  => 'O campo :attribute deve ter no máximo :value caracteres.',
        'array'   => 'O campo :attribute deve ter no máximo :value items.',
    ],

    'image'    => 'O :attribute precisa ser uma imagem.',
    'in'       => 'O item selecionado :attribute é inválido.',
    'in_array' => 'O :attribute não existe em :other.',
    'integer'  => 'O :attribute precisa ser um valor inteiro.',
    'ip'       => 'O :attribute precisa ser um endereço IP válido.',
    'ipv4'     => 'O :attribute precisa ser um endereço IPv4 válido.',
    'ipv6'     => 'O :attribute precisa ser um endereço IPv6 válido.',
    'json'     => 'O :attribute precisa ser um texto JSON válido.',

    'lt' => [
        'numeric' => 'O campo :attribute deve ter no mínimo :value caracteres.',
        'file'    => 'O campo :attribute deve ter no mínimo :value kilobytes.',
        'string'  => 'O campo :attribute deve ter no mínimo :value caracteres.',
        'array'   => 'O campo :attribute deve ter no mínimo :value items.',
    ],

    'lte' => [
        'numeric' => 'O campo :attribute deve ter no mínimo :value caracteres.',
        'file'    => 'O campo :attribute deve ter no mínimo :value kilobytes.',
        'string'  => 'O campo :attribute deve ter no mínimo :value caracteres.',
        'array'   => 'O campo :attribute deve ter no mínimo :value items.',
    ],

    'max' => [
        'numeric' => 'O campo :attribute deve ter no máximo :max caracteres',
        'file'    => 'O campo :attribute deve ter no máximo :max kilobytes.',
        'string'  => 'O campo :attribute deve ter no máximo :max caracteres.',
        'array'   => 'O campo :attribute deve ter no máximo :max items.',
    ],

    'mimes'     => 'O :attribute precisa ser um arquivo do tipo: :values.',
    'mimetypes' => 'O :attribute precisa ser um arquivo do tipo: :values.',

    'min' => [
        'numeric' => 'O campo :attribute deve ter no mínimo :min caracteres.',
        'file'    => 'O campo :attribute deve ter no mínimo :min kilobytes.',
        'string'  => 'O campo :attribute deve ter no mínimo :min caracteres.',
        'array'   => 'O campo :attribute deve ter no mínimo :min items.',
    ],

    'not_in'                => 'O :attribute selecionado é inválido.',
    'not_regex'             => 'O formato :attribute é inválido.',
    'numeric'               => 'O :attribute precisa ser um número.',
    'password'              => 'A senha está incorreta.',
    'present'               => 'O :attribute precisa estar presente.',
    'regex'                 => 'O formato do :attribute é inválido.',
    'required'              => 'O campo :attribute é obrigatório.',
    'required_if'           => 'O :attribute é obrigatório quando o :other é :value.',
    'required_unless'       => 'O :attribute é obrigatório a menos que :other seja um :values.',
    'required_with'         => 'O :attribute é obrigatório quando o :values está presente.',
    'required_with_all'     => 'O :attribute é obrigatório quando o  :values está presente.',
    'required_without'      => 'O :attribute é obrigatório quando o  :values não está presente.',
    'required_without_all'  => 'O :attribute é obrigatório quando nenhum dos :values está presente.',
    'same'                  => 'Os atributos :attribute e :other precisam corresponder.',

    'size' => [
        'numeric' => 'O campo :attribute deve ter no mínimo :size caracteres.',
        'file'    => 'O campo :attribute deve ter no mínimo :size kilobytes.',
        'string'  => 'O campo :attribute deve ter no mínimo :size caracteres.',
        'array'   => 'O campo :attribute deve ter no mínimo :size items.',
    ],

    'starts_with' => 'O :attribute precisa começar com um dos seguintes valores: :values.',
    'string'      => 'O :attribute precisa ser uma string.',
    'timezone'    => 'O :attribute precisa ser uma zona válida.',
    'unique'      => 'O :attribute já foi cadastrado.',
    'uploaded'    => 'O :attribute falhou ao realizar o upload.',
    'url'         => 'O formato :attribute é inválido.',
    'uuid'        => 'O :attribute precisa ser um identificador únivo universal válido.',

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

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

    'accepted' => ':attributeを承認してください。',
    'active_url' => ':attributeは正しいURLではありません。',
    'after' => ':attributeは:date以降の日付にしてください。',
    'after_or_equal' => ':attributeは:date以降の日付にしてください。',
    'alpha' => ':attributeは英字のみ使用できます。',
    'alpha_dash' => ':attributeは英数字とハイフン、アンダースコアのみ使用できます。',
    'alpha_num' => ':attributeは英数字のみ使用できます。',
    'array' => ':attributeは配列でなければなりません。',
    'before' => ':attributeは:date以前の日付にしてください。',
    'before_or_equal' => ':attributeは:date以前の日付にしてください。',
    'between' => [
        'numeric' => ':attributeは:minから:maxの間で指定してください。',
        'file' => ':attributeは:min KBから:max KBの間で指定してください。',
        'string' => ':attributeは:min文字から:max文字の間で指定してください。',
        'array' => ':attributeは:min個から:max個の間で指定してください。',
    ],
    'boolean' => ':attributeはtrueかfalseを指定してください。',
    'confirmed' => ':attributeと確認用の入力が一致しません。',
    'date' => ':attributeは正しい日付ではありません。',
    'date_equals' => ':attributeは:dateと同じ日付にしてください。',
    'date_format' => ':attributeは:format形式で指定してください。',
    'different' => ':attributeと:otherには異なる内容を指定してください。',
    'digits' => ':attributeは:digits桁で指定してください。',
    'digits_between' => ':attributeは:min桁から:max桁の間で指定してください。',
    'dimensions' => ':attributeの画像サイズが無効です。',
    'distinct' => ':attributeの値が重複しています。',
    'email' => ':attributeは有効なメールアドレス形式で指定してください。',
    'ends_with' => ':attributeは次のいずれかで終わる必要があります: :values',
    'exists' => '選択された:attributeは正しくありません。',
    'file' => ':attributeはファイルでなければなりません。',
    'filled' => ':attributeは必須です。',
    'gt' => [
        'numeric' => ':attributeは:valueより大きい必要があります。',
        'file' => ':attributeは:value KBより大きい必要があります。',
        'string' => ':attributeは:value文字より多い必要があります。',
        'array' => ':attributeは:value個より多い必要があります。',
    ],
    'gte' => [
        'numeric' => ':attributeは:value以上である必要があります。',
        'file' => ':attributeは:value KB以上である必要があります。',
        'string' => ':attributeは:value文字以上である必要があります。',
        'array' => ':attributeは:value個以上である必要があります。',
    ],
    'image' => ':attributeは画像でなければなりません。',
    'in' => '選択された:attributeは正しくありません。',
    'in_array' => ':attributeは:otherの中に存在しません。',
    'integer' => ':attributeは整数で指定してください。',
    'ip' => ':attributeは有効なIPアドレスでなければなりません。',
    'ipv4' => ':attributeは有効なIPv4アドレスでなければなりません。',
    'ipv6' => ':attributeは有効なIPv6アドレスでなければなりません。',
    'json' => ':attributeは有効なJSON文字列でなければなりません。',
    'lt' => [
        'numeric' => ':attributeは:value未満である必要があります。',
        'file' => ':attributeは:value KB未満である必要があります。',
        'string' => ':attributeは:value文字未満である必要があります。',
        'array' => ':attributeは:value個未満である必要があります。',
    ],
    'lte' => [
        'numeric' => ':attributeは:value以下である必要があります。',
        'file' => ':attributeは:value KB以下である必要があります。',
        'string' => ':attributeは:value文字以下である必要があります。',
        'array' => ':attributeは:value個以下である必要があります。',
    ],
    'max' => [
        'numeric' => ':attributeは:max以下で指定してください。',
        'file' => ':attributeは:max KB以下のファイルにしてください。',
        'string' => ':attributeは:max文字以下で指定してください。',
        'array' => ':attributeは:max個以下指定してください。',
    ],
    'mimes' => ':attributeは:valuesタイプのファイルにしてください。',
    'mimetypes' => ':attributeは:valuesタイプのファイルにしてください。',
    'min' => [
        'numeric' => ':attributeは:min以上で指定してください。',
        'file' => ':attributeは:min KB以上のファイルにしてください。',
        'string' => ':attributeは:min文字以上で指定してください。',
        'array' => ':attributeは:min個以上指定してください。',
    ],
    'not_in' => '選択された:attributeは正しくありません。',
    'not_regex' => ':attributeの形式が正しくありません。',
    'numeric' => ':attributeは数字で指定してください。',
    'password' => 'パスワードが正しくありません。',
    'present' => ':attributeが存在していません。',
    'regex' => ':attributeの形式が正しくありません。',
    'required' => ':attributeは必須項目です。',
    'required_if' => ':otherが:valueの場合、:attributeは必須です。',
    'required_unless' => ':otherが:values以外の場合、:attributeは必須です。',
    'required_with' => ':valuesが指定されている場合、:attributeも指定してください。',
    'required_with_all' => ':valuesが全て指定されている場合、:attributeも指定してください。',
    'required_without' => ':valuesが指定されていない場合、:attributeは必須です。',
    'required_without_all' => ':valuesが全て指定されていない場合、:attributeは必須です。',
    'same' => ':attributeと:otherが一致しません。',
    'size' => [
        'numeric' => ':attributeは:sizeを指定してください。',
        'file' => ':attributeは:size KBにしてください。',
        'string' => ':attributeは:size文字で指定してください。',
        'array' => ':attributeは:size個指定してください。',
    ],
    'starts_with' => ':attributeは次のいずれかで始まる必要があります: :values',
    'string' => ':attributeは文字列で指定してください。',
    'timezone' => ':attributeは有効なタイムゾーンでなければなりません。',
    'unique' => ':attributeは既に使用されています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeは正しいURL形式で指定してください。',
    'uuid' => ':attributeは有効なUUIDでなければなりません。',

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
        'email' => [
            'required' => 'メールアドレスを入力してください',
            'email' => 'メールアドレスはメール形式で入力してください',
        ],
        'password' => [
            'required' => 'パスワードを入力してください',
            'min' => 'パスワードは8文字以上で入力してください',
            'confirmed' => 'パスワードと一致しません',
        ],
        'name' => [
            'required' => 'お名前を入力してください',
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

    'attributes' => [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード（確認用）',
        'name' => 'ユーザー名',
        'postal_code' => '郵便番号',
        'address' => '住所',
        'building' => '建物名',
        'profile_image' => 'プロフィール画像',
    ],
];

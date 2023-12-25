<?php

return [

    /*
    |--------------------------------------------------------------------------
    | バリデーション言語行
    |--------------------------------------------------------------------------
    |
    | 以下の言語行はバリデタークラスにより使用されるデフォルトのエラー
    | メッセージです。サイズルールのようにいくつかのバリデーションを
    | 持っているものもあります。メッセージはご自由に調整してください。
    |
    */

    'accepted'             => ':attributeを承認してください。',
    'accepted_if' => ':otherが:valueの場合、:attributeを承認してください。',
    'active_url'           => ':attributeが有効なURLではありません。',
    'after'                => ':attributeには、:dateより後の日付を指定してください。',
    'after_or_equal'       => ':attributeには、:date以降の日付を指定してください。',
    'alpha'                => ':attributeはアルファベットのみがご利用できます。',
    'alpha_dash'           => ':attributeはアルファベットとダッシュ(-)及び下線(_)がご利用できます。',
    'alpha_num'            => ':attributeはアルファベット数字がご利用できます。',
    'array'                => ':attributeは配列でなくてはなりません。',
    'before'               => ':attributeには、:dateより前の日付をご利用ください。',
    'before_or_equal'      => ':attributeには、:date以前の日付をご利用ください。',
    'between'              => [
        'numeric' => ':attributeは、:minから:maxの間で指定してください。',
        'file'    => ':attributeは、:min kBから、:max kBの間で指定してください。',
        'string'  => ':attributeは、:min文字から、:max文字の間で指定してください。',
        'array'   => ':attributeは、:min個から:max個の間で指定してください。',
    ],
    'boolean'              => ':attributeは、trueかfalseを指定してください。',
    'confirmed'            => ':attributeと、確認フィールドとが、一致していません。',
    'current_password'     => 'パスワードが正しくありません。',
    'date'                 => ':attributeには有効な日付を指定してください。',
    'date_equals'          => ':attributeには、:dateと同じ日付けを指定してください。',
    'date_format'          => ':attributeは:format形式で指定してください。',
    'different'            => ':attributeと:otherには、異なった内容を指定してください。',
    'digits'               => ':attributeは:digits桁で指定してください。',
    'digits_between'       => ':attributeは:min桁から:max桁の間で指定してください。',
    'dimensions'           => ':attributeの図形サイズが正しくありません。',
    'distinct'             => ':attributeには異なった値を指定してください。',
    'email'                => ':attributeには、有効なメールアドレスを指定してください。',
    'ends_with'            => ':attributeには、:valuesのどれかで終わる値を指定してください。',
    'exists'               => '選択された:attributeは正しくありません。',
    'file'                 => ':attributeにはファイルを指定してください。',
    'filled'               => ':attributeに値を指定してください。',
    'gt'                   => [
        'numeric' => ':attributeには、:valueより大きな値を指定してください。',
        'file'    => ':attributeには、:value kBより大きなファイルを指定してください。',
        'string'  => ':attributeは、:value文字より長く指定してください。',
        'array'   => ':attributeには、:value個より多くのアイテムを指定してください。',
    ],
    'gte'                  => [
        'numeric' => ':attributeには、:value以上の値を指定してください。',
        'file'    => ':attributeには、:value kB以上のファイルを指定してください。',
        'string'  => ':attributeは、:value文字以上で指定してください。',
        'array'   => ':attributeには、:value個以上のアイテムを指定してください。',
    ],
    'image'                => ':attributeには画像ファイルを指定してください。',
    'in'                   => '選択された:attributeは正しくありません。',
    'in_array'             => ':attributeには:otherの値を指定してください。',
    'integer'              => ':attributeは整数で指定してください。',
    'ip'                   => ':attributeには、有効なIPアドレスを指定してください。',
    'ipv4'                 => ':attributeには、有効なIPv4アドレスを指定してください。',
    'ipv6'                 => ':attributeには、有効なIPv6アドレスを指定してください。',
    'json'                 => ':attributeには、有効なJSON文字列を指定してください。',
    'lt'                   => [
        'numeric' => ':attributeには、:valueより小さな値を指定してください。',
        'file'    => ':attributeには、:value kBより小さなファイルを指定してください。',
        'string'  => ':attributeは、:value文字より短く指定してください。',
        'array'   => ':attributeには、:value個より少ないアイテムを指定してください。',
    ],
    'lte'                  => [
        'numeric' => ':attributeには、:value以下の値を指定してください。',
        'file'    => ':attributeには、:value kB以下のファイルを指定してください。',
        'string'  => ':attributeは、:value文字以下で指定してください。',
        'array'   => ':attributeには、:value個以下のアイテムを指定してください。',
    ],
    'max'                  => [
        'numeric' => ':attributeには、:max以下の数字を指定してください。',
        'file'    => ':attributeには、:max kB以下のファイルを指定してください。',
        'string'  => ':attributeは、:max文字以下で指定してください。',
        'array'   => ':attributeは:max個以下指定してください。',
    ],
    'mimes'                => ':attributeには:valuesタイプのファイルを指定してください。',
    'mimetypes'            => ':attributeには:valuesタイプのファイルを指定してください。',
    'min'                  => [
        'numeric' => ':attributeには、:min以上の数字を指定してください。',
        'file'    => ':attributeには、:min kB以上のファイルを指定してください。',
        'string'  => ':attributeは、:min文字以上で指定してください。',
        'array'   => ':attributeは:min個以上指定してください。',
    ],
    'multiple_of' => ':attributeには、:valueの倍数を指定してください。',
    'not_in'               => '選択された:attributeは正しくありません。',
    'not_regex'            => ':attributeの形式が正しくありません。',
    'numeric'              => ':attributeには、数字を指定してください。',
    'password'             => '正しいパスワードを指定してください。',
    'present'              => ':attributeが存在していません。',
    'regex'                => ':attributeに正しい形式を指定してください。',
    'required'             => ':attributeは必ず指定してください。',
    'required_if'          => ':otherが:valueの場合、:attributeも指定してください。',
    'required_unless'      => ':otherが:valuesでない場合、:attributeを指定してください。',
    'required_with'        => ':valuesを指定する場合は、:attributeも指定してください。',
    'required_with_all'    => ':valuesを指定する場合は、:attributeも指定してください。',
    'required_without'     => ':valuesを指定しない場合は、:attributeを指定してください。',
    'required_without_all' => ':valuesのどれも指定しない場合は、:attributeを指定してください。',
    'prohibited'           => ':attributeは入力禁止です。',
    'prohibited_if' => ':otherが:valueの場合、:attributeは入力禁止です。',
    'prohibited_unless'    => ':otherが:valueでない場合、:attributeは入力禁止です。',
    'prohibits'            => 'attributeは:otherの入力を禁じています。',
    'same'                 => ':attributeと:otherには同じ値を指定してください。',
    'size'                 => [
        'numeric' => ':attributeは:sizeを指定してください。',
        'file'    => ':attributeのファイルは、:sizeキロバイトでなくてはなりません。',
        'string'  => ':attributeは:size文字で指定してください。',
        'array'   => ':attributeは:size個指定してください。',
    ],
    'starts_with'          => ':attributeには、:valuesのどれかで始まる値を指定してください。',
    'string'               => ':attributeは文字列を指定してください。',
    'timezone'             => ':attributeには、有効なゾーンを指定してください。',
    'unique'               => ':attributeの値は既に存在しています。',
    'uploaded'             => ':attributeのアップロードに失敗しました。',
    'url'                  => ':attributeに正しい形式を指定してください。',
    'uuid'                 => ':attributeに有効なUUIDを指定してください。',

    /*
    |--------------------------------------------------------------------------
    | Custom バリデーション言語行
    |--------------------------------------------------------------------------
    |
    | "属性.ルール"の規約でキーを指定することでカスタムバリデーション
    | メッセージを定義できます。指定した属性ルールに対する特定の
    | カスタム言語行を手早く指定できます。
    |
    */

    'custom' => [
        '属性名' => [
            'ルール名' => 'カスタムメッセージ',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション属性名
    |--------------------------------------------------------------------------
    |
    | 以下の言語行は、例えば"email"の代わりに「メールアドレス」のように、
    | 読み手にフレンドリーな表現でプレースホルダーを置き換えるために指定する
    | 言語行です。これはメッセージをよりきれいに表示するために役に立ちます。
    |
    */

    'attributes' => [
        'entrant' => '入力者',
        'entrant_employee_no' => '入力者の社員番号',
        'entrant_name' => '氏名',
        'entrant_kana' => 'フリガナ',

        'related_employee_no' => '弔事当事者の社員番号',
        'related_name' => '氏名',
        'related_kana' => 'フリガナ',
        'classification' => '社員区分',
        'company' => '就業会社',
        'member1' => '所属①',
        'member2' => '所属②',
        'passed_away_name' => '故人様氏名',
        'passed_away_kana' => '故人様フリガナ',
        'passed_away_relationship' => '社員との続柄',
        'passed_away_date' => '逝去日時',

        'inlaws' => '社内親族',
        'inlaws_employee_no' => '社内親族の社員番号',
        'inlaws_name' => '氏名',
        'inlaws_kana' => 'フリガナ',
        'inlaws_company' => '就業会社',
        'inlaws_member1' => '所属①',
        'inlaws_member2' => '所属②',
        'inlaws_condolence' => '供花/弔電の手配',

        'wake' => '通夜を行う',
        'wake_date' => '通夜の日付',
        'wake_time' => '通夜の時間',
        'wake_ceremony' => '通夜の式場名',
        'wake_ceremony_zip' => '郵便番号',
        'wake_ceremony_addr1' => '住所 1',
        'wake_ceremony_addr2' => '住所 2',
        'wake_ceremony_tel' => '電話番号',
        'wake_ceremony_url' => 'URL',
        'wake_ceremony_access' => '交通手段',
        'wake_attendees1' => '参列予定者1',
        'wake_attendees2' => '参列予定者2',
        'wake_attendees3' => '参列予定者3',
        'wake_attendees' => '参列予定者',

        'funeral' => '告別式を行う',
        'funeral_date' => '告別式の日付',
        'funeral_time' => '告別式の時間',
        'funeral_same_ceremony' => '通夜と同じ式場',
        'funeral_ceremony' => '告別式の式場名',
        'funeral_ceremony_zip' => '郵便番号',
        'funeral_ceremony_addr1' => '住所 1',
        'funeral_ceremony_addr2' => '住所 2',
        'funeral_ceremony_tel' => '電話番号',
        'funeral_ceremony_url' => 'URL',
        'funeral_ceremony_access' => '交通手段',
        'funeral_attendees1' => '参列予定者1',
        'funeral_attendees2' => '参列予定者2',
        'funeral_attendees3' => '参列予定者3',
        'funeral_attendees' => '参列予定者',

        'chief_mourner' => '本人喪主',
        'chief_mourner_name' => '喪主の氏名',
        'chief_mourner_kana' => 'フリガナ',
        'chief_mourner_relationship' => '社員と喪主の続柄',

        'condolence' => '弔問を辞退',
        'floral_tribute' => '供花を辞退',
        'telegram' => '弔電を辞退',
        'fax_posting' => '全社FAX/Gネット掲示へ掲載を希望',
        'remarks' => '備考',

        'social_name1' => '福祉会差出人名1',
        'social_telegram1' => '福祉会弔電1',
        'social_floral_tribute1' => '福祉会供花1',
        'social_name2' => '福祉会差出人名2',
        'social_telegram2' => '福祉会弔電2',
        'social_floral_tribute2' => '福祉会供花2',
        'social_name3' => '福祉会差出人名3',
        'social_condolence_money3' => '弔慰金3',

        'company_name1' => '会社差出人名1',
        'company_attend1' => '会社差出人1が参列',
        'company_telegram1' => '会社弔電1',
        'company_floral_tribute1' => '会社供花1',
        'company_condolence_money1' => '会社弔慰金1',
        'company_name2' => '会社差出人名2',
        'company_attend2' => '会社差出人2が参列',
        'company_telegram2' => '会社弔電2',
        'company_floral_tribute2' => '会社供花2',
        'company_condolence_money2' => '会社弔慰金2',

        'reception' => '総務担当受付',
        'reception_datetime' => '受付日時',
        'general_affairs_confirmation' => '総務確認',
        'general_affairs_employee_no' => '総務社員番号',
        'general_affairs_name' => '氏名',
        'general_affairs_kana' => 'フリガナ',
        'general_affairs_company' => '総務就業会社',
        'general_affairs_member1' => '総務所属①',
        'general_affairs_member2' => '総務所属②',
        'general_affairs_contact_info' => '総務連絡先',
        'final_confirmation' => '最終確認',
        'supervisor_confirmation' => '所属長確認',
        'supervisor_employee_no' => '所属長社員番号',
        'supervisor_name' => '氏名',
        'supervisor_kana' => 'フリガナ',
        'branch_chief_confirmation' => '支部委員長確認',
        'branch_chief_employee_no' => '支部委員長社員番号',
        'branch_chief_name' => '氏名',
        'branch_chief_kana' => 'フリガナ',
        'status' => '連絡表ステイタス',
        'password' => 'パスワード',
        'create_user' => '作成者',
        'update_user' => '更新者',
        'sort' => 'ソート番号',
        'deleted_at' => '削除フラグ',
        'created_at' => '作成日時',
        'updated_at' => '更新日時',
    ],

];

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
    'accepted_if' => ':otherと:valueが等しい時、:attributeを承認してください。',
    'active_url' => ':attributeには有効なURLを指定してください。',
    'after' => ':attributeには:dateより後の日付を指定してください。',
    'after_or_equal' => ':attributeには:date以降の日付を指定してください。',
    'alpha' => ':attributeには英字のみからなる文字列を指定してください。',
    'alpha_dash' => ':attributeには英数字・ハイフン・アンダースコアのみからなる文字列を指定してください。',
    'alpha_num' => ':attributeには英数字のみからなる文字列を指定してください。',
    'array' => ':attributeには配列を指定してください。',
    'before' => ':attributeには:dateより前の日付を指定してください。',
    'before_or_equal' => ':attributeには:date以前の日付を指定してください。',
    'between' => [
        'array' => ':attributeには:min〜:max個の要素を持つ配列を指定してください。',
        'file' => ':attributeには:min〜:max KBのファイルを指定してください。',
        'numeric' => ':attributeには:min〜:maxまでの数値を指定してください。',
        'string' => ':attributeには:min〜:max文字の文字列を指定してください。',
    ],
    'boolean' => ':attributeには真偽値を指定してください。',
    'confirmed' => ':attributeが確認用の値と一致しません。',
    'current_password' => 'パスワードが違います。',
    'date' => ':attributeには正しい形式の日付を指定してください。',
    'date_equals' => ':attributeは:dateと同じ日付を指定してください。',
    'date_format' => '":format"という形式の日付を指定してください。',
    'declined' => ':attributeは異なる値を指定してください。',
    'declined_if' => ':otherと:valueが同じ値の時、:attributeは異なる値を指定してください。',
    'different' => ':attributeには:otherとは異なる値を指定してください。',
    'digits' => ':attributeには:digits桁の数値を指定してください。',
    'digits_between' => ':attributeには:min〜:max桁の数値を指定してください。',
    'dimensions' => ':attributeの画像サイズが不正です。',
    'distinct' => '指定された:attributeは既に存在しています。',
    'email' => ':attributeには正しい形式のメールアドレスを指定してください。',
    'ends_with' => ':attributeは:valuesで終わる必要があります。',
    'enum' => '指定された:attributeは存在しません。',
    'exists' => '指定された:attributeは存在しません。',
    'file' => ':attributeにはファイルを指定してください。',
    'filled' => ':attributeには空でない値を指定してください。',
    'gt' => [
        'array' => ':attributeには:max個より大きい要素を持つ配列を指定してください。',
        'file' => ':attributeには:max KBより大きいファイルを指定してください。',
        'numeric' => ':attributeには:maxより大きい数値を指定してください。',
        'string' => ':attributeには:max文字より大きい文字列を指定してください。',
    ],
    'gte' => [
        'array' => ':attributeには:max個以上の要素を持つ配列を指定してください。',
        'file' => ':attributeには:max KB以上のファイルを指定してください。',
        'numeric' => ':attributeには:max以上の数値を指定してください。',
        'string' => ':attributeには:max文字以上の文字列を指定してください。',
    ],
    'image' => ':attributeには画像ファイルを指定してください。',
    'in' => ':attributeには:valuesのうちいずれかの値を指定してください。',
    'in_array' => ':attributeが:otherに含まれていません。',
    'integer' => ':attributeには整数を指定してください。',
    'ip' => ':attributeには正しい形式のIPアドレスを指定してください。',
    'ipv4' => ':attributeにはIPv4形式のIPアドレスを指定してください。',
    'ipv6' => ':attributeにはIPv6形式のIPアドレスを指定してください。',
    'json' => ':attributeには正しい形式のJSON文字列を指定してください。',
    'lt' => [
        'array' => ':attributeには:min個より小さい要素を持つ配列を指定してください。',
        'file' => ':attributeには:min KBより小さいファイルを指定してください。',
        'numeric' => ':attributeは:valueより小さい数値を指定してください。',
        'string' => ':attributeは:value文字より小さい文字列を指定してください。',
    ],
    'lte' => [
        'array' => ':attributeには:min個以下の要素を持つ配列を指定してください。',
        'file' => ':attributeには:min KB以下のファイルを指定してください。',
        'numeric' => ':attributeは:value以下の数値を指定してください。',
        'string' => ':attributeは:value文字以下の文字列を指定してください。',
    ],
    'mac_address' => ':attributeには正しい形式のMACアドレスを指定してください。',
    'max' => [
        'array' => ':attributeには:max個以下の要素を持つ配列を指定してください。',
        'file' => ':attributeには:max KB以下のファイルを指定してください。',
        'numeric' => ':attributeには:max以下の数値を指定してください。',
        'string' => ':attributeには:max文字以下の文字列を指定してください。',
    ],
    'mimes' => ':attributeには:valuesのうちいずれかの形式のファイルを指定してください。',
    'mimetypes' => ':attributeには:valuesのうちいずれかの形式のファイルを指定してください。',
    'min' => [
        'array' => ':attributeには:min個以上の要素を持つ配列を指定してください。',
        'file' => ':attributeには:min KB以上のファイルを指定してください。',
        'numeric' => ':attributeには:min以上の数値を指定してください。',
        'string' => ':attributeには:min文字以上の文字列を指定してください。',
    ],
    'multiple_of' => ':attributeは:valueの倍数にする必要があります。',
    'not_in' => ':attributeには:valuesのうちいずれとも異なる値を指定してください。',
    'not_regex' => ':attributeの形式が無効です。',
    'numeric' => ':attributeには数値を指定してください。',
    'password' => [
        'letters' => ':attributeには、少なくとも1つの文字を含める必要があります。',
        'mixed' => ':attributeは大文字と小文字がを1文字づつ含める必要があります。',
        'numbers' => ':attributeは少なくとも1つの数字を含める必要があります。',
        'symbols' => ':attributeは少なくとも1つの記号を含める必要があります。',
        'uncompromised' => '指定された:attributeは、データリークに存在します。別の:attributeを選択してください。',
    ],
    'present' => ':attributeには現在時刻を指定してください。',
    'prohibited' => ':attributeフィールドは禁止されています。',
    'prohibited_if' => 'attributeフィールドは:otherと:valueが同じではいけません',
    'prohibited_unless' => ':attributeフィールドは:valuesに:otherを含まなければなりません。',
    'prohibits' => ':attributeフィールドは:valuesを含んではいけません。',
    'regex' => '正しい形式の:attributeを指定してください。',
    'required' => ':attributeは必須です。',
    'required_array_keys' => ':attributeフィールドは:valuesを含む必要があります。',
    'required_if' => ':otherが:valueの時:attributeは必須です。',
    'required_unless' => ':otherが:values以外の時:attributeは必須です。',
    'required_with' => ':valuesのうちいずれかが指定された時:attributeは必須です。',
    'required_with_all' => ':valuesのうちすべてが指定された時:attributeは必須です。',
    'required_without' => ':valuesのうちいずれかがが指定されなかった時:attributeは必須です。',
    'required_without_all' => ':valuesのうちすべてが指定されなかった時:attributeは必須です。',
    'same' => ':attributeが:otherと一致しません。',
    'size' => [
        'array' => ':attributeには:size個の要素を持つ配列を指定してください。',
        'file' => ':attributeには:size KBのファイルを指定してください。',
        'numeric' => ':attributeには:sizeを指定してください。',
        'string' => ':attributeには:size文字の文字列を指定してください。',
    ],
    'starts_with' => ':attributeは:valuesで始まらなければなりません。',
    'doesnt_start_with' => ':attributeは:valuesで始まることはできません。',

    'string' => ':attributeには文字列を指定してください。',
    'timezone' => ':attributeには正しい形式のタイムゾーンを指定してください。',
    'unique' => 'その:attributeはすでに使われています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeには正しい形式のURLを指定してください。',
    'uuid' => ':attributeには正しい形式のUUIDを指定してください。',

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

    'attributes' => [
        'id' => 'ID',
        'entrant'=>'入力者',
        'entrant_employee_no'=>'代理入力者の社員番号',
        'entrant_name'=>'氏名',
        'entrant_kana'=>'フリガナ',
        'related_employee_no'=>'弔事当事者の社員番号',
        'related_name'=>'氏名',
        'related_kana'=>'フリガナ',
        'classification'=>'社員区分',
        'company'=>'就業会社',
        'member1'=>'所属①',
        'member2'=>'所属②',
        'passed_away_name'=>'故人様氏名',
        'passed_away_kana'=>'故人様のフリガナ',
        'passed_away_date'=>'逝去日時',
        'inlaws' => '社内親族の有無',
        'inlaws_employee_no' => '社内親族の社員番号',
        'inlaws_name' => '氏名',
        'inlaws_kana' => 'フリガナ',
        'inlaws_company' => '就業会社',
        'inlaws_member1' => '所属①',
        'inlaws_member2' => '所属②',
        'inlaws_condolence' => '供花/弔電の手配',
        'wake' => '通夜実施の有無',
        'wake_date' => '通夜の日付',
        'wake_time' => '通夜の時間',
        'wake_ceremony' => '通夜の式場名',
        'wake_ceremony_zip' => '郵便番号',
        'wake_ceremony_addr1' => '住所',
        'wake_ceremony_addr2' => '番地以降',
        'wake_ceremony_tel' => '電話番号',
        'wake_ceremony_url' => '番地以降',
        'wake_ceremony_access' => '交通手段',
        'wake_attendees1' => '通夜の参列予定者①',
        'wake_attendees2' => '通夜の参列予定者②',
        'wake_attendees3' => '通夜の参列予定者③',
        'wake_attendees' => '通夜の参列予定者',
        'funeral' => '告別式を行う',
        'funeral_date' => '告別式の日付',
        'funeral_time' => '告別式の時間',
        'funeral_same_ceremony' => '通夜と同じ式場',
        'funeral_ceremony' => '告別式の式場名',
        'funeral_ceremony_zip' => '郵便番号',
        'funeral_ceremony_addr1' => '住所',
        'funeral_ceremony_addr2' => '番地以降',
        'funeral_ceremony_tel' => '電話番号',
        'funeral_ceremony_url' => 'URL',
        'funeral_ceremony_access' => '交通手段',
        'funeral_attendees1' => '告別式の参列予定者①',
        'funeral_attendees2' => '告別式の参列予定者②',
        'funeral_attendees3' => '告別式の参列予定者③',
        'funeral_attendees' => '告別式の参列予定者',
        'chief_mourner' => '本人喪主',
        'chief_mourner_name' => '喪主の氏名',
        'chief_mourner_kana' => '喪主のフリガナ',
        'chief_mourner_relationship' => '社員と喪主の続柄',
        'condolence' => '弔問を辞退',
        'floral_tribute' => '供花を辞退',
        'telegram' => '弔電を辞退',
        'fax_posting' => '全社FAX/Gネット掲示へ掲載',
        'remarks' => '備考',

        'superior' => '直属の上司確認',
        'superior_employee_no' => '直属の上司の社員番号',
        'superior_name' => '氏名',
        'superior_kana' => 'フリガナ',
        'superior_company' => '就業会社',
        'superior_member1' => '所属①',
        'superior_member2' => '所属②',

        'social_name1' => '福祉会規定 差出人①',
        'social_telegram1' => '福祉会規定 弔電①',
        'social_floral_tribute1' => '福祉会規定 供花①',
        'social_name2' => '福祉会規定 差出人②',
        'social_telegram2' => '福祉会規定 弔電②',
        'social_floral_tribute2' => '福祉会規定 供花②',
        'social_name3' => '福祉会規定 差出人③',
        'social_condolence_money3' => '福祉会規定 弔慰金',

        'company_name1' => '会社規定 差出人①',
        'company_attend1' => '会社規定 参列①',
        'company_telegram1' => '会社規定 弔電①',
        'company_floral_tribute1' => '会社規定 供花①',
        'company_condolence_money1' => '会社規定 弔慰金①',
        'company_name2' => '会社規定 差出人②',
        'company_attend2' => '会社規定 参列②',
        'company_telegram2' => '会社規定 弔電②',
        'company_floral_tribute2' => '会社規定 供花②',
        'company_condolence_money2' => '会社規定 弔慰金②',

        'reception' => '総務担当受付',
        'reception_datetime' => '総務担当受付日時',
        'general_affairs_confirmation' => '総務担当確認',
        'general_affairs_employee_no' => '総務担当の社員番号',
        'general_affairs_name' => '氏名',
        'general_affairs_kana' => 'フリガナ',
        'general_affairs_company' => '就業会社',
        'general_affairs_member1' => '所属①',
        'general_affairs_member2' => '所属②',
        'general_affairs_contact_info' => '総務担当の連絡先',
        'final_confirmation' => '総務担当の最終確認',
        'supervisor_confirmation' => '所属長確認',
        'supervisor_employee_no' => '所属長社員番号',
        'supervisor_name' => '氏名',
        'supervisor_kana' => 'フリガナ',
        'branch_chief_confirmation' => '支部委員長確認',
        'branch_chief_employee_no' => '支部委員長社員番号',
        'branch_chief_name' => '氏名',
        'branch_chief_kana' => 'フリガナ',
        'status' => 'ステイタス',
        'password' => 'パスワード',
        'create_user' => '作成者',
        'update_user' => '更新者',
        'deleted_at' => '削除',
        'created_at' => '作成日',
        'updated_at' => '更新日',

    ],

];

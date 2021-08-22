<?php

require_once(__DIR__ . '/ValidatorFactory.php');

$validator = ValidatorFactory::instance()->make(
    $_POST,
    [
        'name' => 'required|string|min:2|max:10',
        'amount' => 'required|integer|gte:1',
        'ref_url' => 'required|url',
    ],
    [
        'ref_url.url' => ':attributeが正しくない！',
    ],
    [
        'name' => '名前',
        'amount' => '数量',
        'ref_url' => '参考URL',
    ]
);
if ($validator->passes()) {
    echo 'success';
} else {
    echo 'failure';
    echo '<br><pre>';
    var_export($validator->errors()->toArray());
    echo '</pre>';
}

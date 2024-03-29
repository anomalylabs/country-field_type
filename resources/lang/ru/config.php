<?php

return [
    'mode'          => [
        'label'        => 'Внешний вид',
        'instructions' => 'Стиль отображения поля выбора страны.',
        'option'       => [
            'input'    => 'Простой текстовый ввод',
            'dropdown' => 'Выпадающее меню',
            'search'   => 'Поисковая строка',
        ],
    ],
    'top_options'   => [
        'name'         => 'Приоритетные страны',
        'instructions' => 'Перечень ISO Alpha-2 кодов стран, которые будут отображаться в самом верху выпадающего списка или поисковой выдачи. Каждый код должен быть указан в отдельной строке.',
        'placeholder'  => "RU\nBY\nUA\nKZ",
    ],
    'default_value' => [
        'name'         => 'Значение по умолчанию',
        'instructions' => 'Страна по умолчанию, которая будет указана в поле выбора.',
    ],
];

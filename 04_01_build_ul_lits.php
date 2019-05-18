<?php
/**
 * Created by PhpStorm.
 * User: rvck2
 * Date: 19/01/2019
 * Time: 11:42
 */

/*
 * 1 - LOOP with 1-dimentional Array :
 */

$skills = ['HTML', 'CSS', 'JavaScript', 'PHP', 'SQL'];

$list = '<ul>';
foreach ($skills as $skill) {
    $list .= "<li>$skill</li>";
}
$list .= '</ul>';

echo $list;
?>


<?php

/*
 * 2 - LOOP with Multidimentional Array :
 */
$wines = [
    'Red' => [
        'Burgundy' => [
            'Pinot noir', 'Gamay'
        ],
        'California' => [
            'Merlot', 'Zinfandel'
        ],
        'South Australia' => [
            'Shiraz', 'Grenache'
        ]
    ], 'White' => [
        'Burgundy' => [
            'Chardonnay', 'Pinot blanc'
        ],
        'California' => [
            'Chardonnay', 'Sauvignon blanc'
        ],
        'South Australia' => [
            'Lindeman', 'Penfold'
        ]
    ]
];

require './classes/ListBuilder.php';

$ul = new ListBuilder($wines);
echo $ul;

?>

<?php

namespace App\Http\Utilities;

define( 'DEFAULT_OPERATOR', '=' );

class FilteringHelper
{

    protected static $operatorMap = [
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
        'ne' => '!='
    ];

    public static function translateOperator ($operatorString) {
        $found = array_key_exists($operatorString, FilteringHelper::$operatorMap);
        return $found
            ? FilteringHelper::$operatorMap[$operatorString]
            : DEFAULT_OPERATOR;
    }

    public static function processField ($field, $queryParams) {
        // Define the found value
        $found = array_key_exists($field, $queryParams)
            ? $queryParams[$field]
            : false;

        // Exit if unable to find field
        if (!$found) {
            return false;
        }

        // Define default values
        $operator = DEFAULT_OPERATOR;
        $value = $found;

        // Set operator and value if the found value is an array
        if (is_array($found)) {
            $key = array_keys($found)[0];
            $operator = FilteringHelper::translateOperator($key);
            $value = $found[$key];
        }

        // Return clause
        return array(
            'field' => $field,
            'operator' => $operator,
            'value' => $value
        );
    }

    public static function create ($fields, $queryParams) {
        $clauses = [];
        for ($i=0; $i < count($fields); $i++) {
            $clause = FilteringHelper::processField($fields[$i], $queryParams);
            if ($clause !== false) {
                $clauses[] = $clause;
            }
        }
        return $clauses;
    }
}

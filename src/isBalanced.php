<?php

require 'Stack.php';

function isBalanced(string $value): bool
{
    $stack = new Stack();

    $value = str_split(trim($value));
    $countBrackets = array_count_values($value);

    if (array_diff_key($countBrackets, ['(' => 0, ')' => 1, '' => 2])) {
        throw new InvalidArgumentException('String is invalid');
    }

    foreach ($value as $char) {
        if ($char === '(') {
            $stack->push($char);
        } elseif ($char === ')') {
            if ($stack->isEmpty()) {
                return false;
            }
            $stack->pop();
        }
    }

    return $stack->isEmpty();

}
<?php

class Stack
{

    protected $stack;
    protected $limit;

    public function __construct(int $limit = 100)
    {
        $this->stack = [];
        $this->limit = $limit;
    }

    public function push($value): self
    {
        if (count($this->stack) >= $this->limit) {
            throw new RuntimeException('Stack overflow');
        }
        $this->stack[] = $value;
        return $this;
    }

    public function pop()
    {
        if (empty($this->stack)) {
            throw new RuntimeException('Stack underflow');
        }
        return array_pop($this->stack);
    }

    public function top()
    {
        if (empty($this->stack)) {
            throw new RuntimeException('Stack is empty');
        }
        return end($this->stack);
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }
}
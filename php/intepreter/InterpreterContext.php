<?php


namespace php\intepreter;


class InterpreterContext
{
    private $expressionsore = array();

    function replace(Expression $exp, $value)
    {
        $this->expressionsore[$exp->getKey()] =$value;
    }

    function lookup(Expression $exp)
    {
        return $this->expressionsore[$exp->getKey()];
    }
}

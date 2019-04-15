<?php


namespace php\intepreter;


class BooleanOrExpression extends OperandExpression
{
    protected function doInterpret(InterpreterContext $context, $result_l, $result_r)
    {
        $context->replace($this, $result_l || $result_l);
    }
}

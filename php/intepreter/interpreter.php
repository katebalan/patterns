<?php


namespace php\intepreter;


include "Expression.php";
include "InterpreterContext.php";
include "LiteralExpression.php";
include "VariableExpression.php";


$context = new InterpreterContext();

// Test LiteralExpresion
$literal = new LiteralExpression("Two");
$literal->interpret($context);
print $context->lookup($literal) . "\n";

// Test VariableExpresion
$onevar = new VariableExpression('input', 'Cat');
$onevar->interpret($context);
print $context->lookup($onevar) . "\n";
$onevar->setValue('Dog');
print $context->lookup($onevar) . "\n";
$onevar->interpret($context);
print $context->lookup($onevar) . "\n";
$newvar = new VariableExpression('input');
$newvar->interpret($context);
print "New var : " . $context->lookup($newvar) . "\n";
print "Old var : " . $context->lookup($onevar) . "\n";



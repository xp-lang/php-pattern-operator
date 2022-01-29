<?php namespace lang\ast\syntax\php;

use lang\ast\nodes\{ArrayLiteral, InvokeExpression, Literal, TernaryExpression, Variable};
use lang\ast\syntax\Extension;

class PatternOperator implements Extension {

  public function setup($language, $emitter) {
    $language->infix('~', 60, function($parse, $token, $left) {
      $line= $token->line;
      $pattern= $this->expression($parse, 60);
      return new PatternExpression($pattern, $left, $line);
    });

    $emitter->transform('pattern', function($codegen, $node) {
      $temp= new Variable($codegen->symbol());
      return new TernaryExpression(
        new InvokeExpression(new Literal('preg_match'), [$node->pattern, $node->expression, $temp]),
        $temp,
        new ArrayLiteral([])
      );
    });
  }
}
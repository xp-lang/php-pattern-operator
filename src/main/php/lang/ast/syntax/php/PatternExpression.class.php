<?php namespace lang\ast\syntax\php;

use lang\ast\Node;

class PatternExpression extends Node {
  public $kind= 'pattern';
  public $pattern, $expression;

  public function __construct($pattern, $expression, $line= -1) {
    $this->pattern= $pattern;
    $this->expression= $expression;
    $this->line= $line;
  }

  /** @return iterable */
  public function children() { return [$pattern, $expression]; }
}
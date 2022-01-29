<?php namespace lang\ast\syntax\php\unittest;

use lang\ast\unittest\emit\EmittingTest;
use unittest\{Assert, Test};

class PatternOperatorTest extends EmittingTest {

  #[Test, Values([['Test', ['Test']], ['test', ['test']], ['hello', []]])]
  public function matches($input, $matches) {
    $r= $this->run('class <T> {
      public function run($input) {
        return $input ~ "/test/i";
      }
    }', $input);

    Assert::equals($matches, $r);
  }

  #[Test, Values([['Test', true], ['test', true], ['hello', false]])]
  public function cast_to_bool($input, $matches) {
    $r= $this->run('class <T> {
      public function run($input) {
        return (bool)($input ~ "/test/i");
      }
    }', $input);

    Assert::equals($matches, $r);
  }
}
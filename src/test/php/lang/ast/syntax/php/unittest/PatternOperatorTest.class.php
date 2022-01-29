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

  #[Test, Values([['hallo', 'a'], ['HELLO', 'e'], ['test', null]])]
  public function work_with_matches($input, $matched) {
    $r= $this->run('class <T> {
      public function run($input) {
        if ($matches= $input ~ "/h([ea])llo/i") {
          return strtolower($matches[1]);
        }
        return null;
      }
    }', $input);

    Assert::equals($matched, $r);
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

  #[Test]
  public function does_not_conflict_with_prefix_operator() {
    $r= $this->run('class <T> {
      public function run($input) {
        return [~0, ~$input];
      }
    }', 1);

    Assert::equals([-1, -2], $r);
  }
}
<?php

namespace Drupal\form_data_utilities\FormElement;

use Drupal\form_data_utilities\FormBuilder;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class TextfieldTest extends TestCase {

  protected Button $element;

  protected FormBuilder $mockFormBuilder;

  #[Test] public function testGetRenderArray(): void {
    $this->element = new Button($this->mockFormBuilder);
    $this->assertEquals(
      [
        '#type' => 'button',
      ],
      $this->element->getRenderArray()
    );
  }

  #[Test] public function testMethodsExist(): void {
    $this->element = new Button($this->mockFormBuilder);
    $this->assertTrue(method_exists($this->element, 'setValue'));
  }

  #[Test] public function testDataMethods(): void {
    $this->element = new Button($this->mockFormBuilder);
    $this->element
      ->setValue('My Button');

    $this->assertEquals(
      [
        '#type' => 'button',
        '#title' => 'My Button',
      ],
      $this->element->getRenderArray()
    );
  }

  protected function setUp(): void {
    parent::setUp();
    $this->mockFormBuilder = $this->createMock(FormBuilder::class);
  }

}

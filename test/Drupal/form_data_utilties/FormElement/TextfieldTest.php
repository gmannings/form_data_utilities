<?php

namespace Drupal\form_data_utilities\FormElement;

use Drupal\form_data_utilities\FormBuilder;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class TextfieldTest extends TestCase {

  protected Textfield $element;

  protected FormBuilder $mockFormBuilder;

  #[Test] public function testGetRenderArray(): void {
    $this->element = new Textfield($this->mockFormBuilder);
    $this->assertEquals(
      [
        '#type' => 'textfield',
      ],
      $this->element->getRenderArray()
    );
  }

  #[Test] public function testMethodsExist(): void {
    $this->element = new Textfield($this->mockFormBuilder);
    $this->assertTrue(method_exists($this->element, 'setTitle'));
    $this->assertTrue(method_exists($this->element, 'setDefaultValue'));
    $this->assertTrue(method_exists($this->element, 'setMaxlength'));
    $this->assertTrue(method_exists($this->element, 'setPattern'));
    $this->assertTrue(method_exists($this->element, 'setSize'));
    $this->assertTrue(method_exists($this->element, 'setRequired'));
  }

  protected function setUp(): void {
    parent::setUp();
    $this->mockFormBuilder = $this->createMock(FormBuilder::class);
  }

}

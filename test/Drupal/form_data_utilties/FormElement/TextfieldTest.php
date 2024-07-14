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
        '#required' => FALSE,
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

  #[Test] public function testDataMethods(): void {
    $this->element = new Textfield($this->mockFormBuilder);
    $this->element
      ->setTitle('Title')
      ->setDefaultValue('Default value')
      ->setSize(60)
      ->setRequired(TRUE)
      ->setMaxlength(120)
      ->setPattern('some-prefix-[a-z]+');
    $this->assertEquals(
      [
        '#type' => 'textfield',
        '#title' => 'Title',
        '#default_value' => 'Default value',
        '#size' => 60,
        '#required' => TRUE,
        '#maxlength' => 120,
        '#pattern' => 'some-prefix-[a-z]+',
      ],
      $this->element->getRenderArray()
    );
  }

  protected function setUp(): void {
    parent::setUp();
    $this->mockFormBuilder = $this->createMock(FormBuilder::class);
  }

}

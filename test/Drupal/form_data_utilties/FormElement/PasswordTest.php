<?php

namespace Drupal\form_data_utilities\FormElement;

use Drupal\form_data_utilities\FormBuilder;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase {

  protected Password $element;

  protected FormBuilder $mockFormBuilder;

  #[Test] public function testGetRenderArray(): void {
    $this->element = new Password($this->mockFormBuilder);
    $this->assertEquals(
      [
        '#type' => 'password',
        '#required' => FALSE,
      ],
      $this->element->getRenderArray()
    );
  }

  #[Test] public function testMethodsExist(): void {
    $this->element = new Password($this->mockFormBuilder);
    $this->assertTrue(method_exists($this->element, 'setTitle'));
    $this->assertTrue(method_exists($this->element, 'setDefaultValue'));
    $this->assertTrue(method_exists($this->element, 'setMaxlength'));
    $this->assertTrue(method_exists($this->element, 'setSize'));
    $this->assertTrue(method_exists($this->element, 'setRequired'));
  }

  #[Test] public function testDataMethods(): void {
    $this->element = new Password($this->mockFormBuilder);
    $this->element
      ->setTitle('Title')
      ->setDefaultValue('Default value')
      ->setSize(60)
      ->setRequired(TRUE)
      ->setMaxlength(120);
    $this->assertEquals(
      [
        '#type' => 'password',
        '#title' => 'Title',
        '#default_value' => 'Default value',
        '#size' => 60,
        '#required' => TRUE,
        '#maxlength' => 120,
      ],
      $this->element->getRenderArray()
    );
  }

  #[Test] public function testAttributeMethods(): void {
    $this->element = new Password($this->mockFormBuilder);
    $this->element
      ->setAttributeId('my-id')
      ->setAttributeClass(['my-class'])
      ->setAttributeName('my-name');

    $this->assertEquals(
      [
        '#type' => 'password',
        '#attributes' => [
          'id' => 'my-id',
          'class' => ['my-class'],
          'name' => 'my-name',
        ],
        '#required' => FALSE,
      ],
      $this->element->getRenderArray()
    );
  }

  #[Test] public function testFromArgumentsMethod(): void {
    $this->element = new Password($this->mockFormBuilder);
    $this->element->fromArguments(
      'Test field',
      size: 60,
      attributeId: 'test-id'
    );
    $this->assertEquals(
      [
        '#type' => 'password',
        '#title' => 'Test field',
        '#size' => 60,
        '#attributes' => [
          'id' => 'test-id',
        ],
        '#required' => FALSE,
      ],
      $this->element->getRenderArray()
    );
  }

  protected function setUp(): void {
    parent::setUp();
    $this->mockFormBuilder = $this->createMock(FormBuilder::class);
  }

}

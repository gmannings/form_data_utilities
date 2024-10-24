<?php

namespace Drupal\form_data_utilities\FormElement;

use Drupal\form_data_utilities\FormBuilder;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ButtonTest extends TestCase {

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
        '#value' => 'My Button',
      ],
      $this->element->getRenderArray()
    );
  }

  #[Test] public function testFromArgumentsMethod(): void {
    $this->element = new Button($this->mockFormBuilder);
    $this->element->fromArguments(
      'Test button',
      attributeId: 'test-id',
    );
    $this->assertEquals(
      [
        '#type' => 'button',
        '#value' => 'Test button',
        '#attributes' => [
          'id' => 'test-id',
        ],
      ],
      $this->element->getRenderArray()
    );
  }

  protected function setUp(): void {
    parent::setUp();
    $this->mockFormBuilder = $this->createMock(FormBuilder::class);
  }

}

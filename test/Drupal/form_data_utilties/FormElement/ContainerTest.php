<?php

namespace Drupal\form_data_utilities\FormElement;

use Drupal\form_data_utilities\FormBuilder;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase {

  protected Container $element;

  protected FormBuilder $mockFormBuilder;

  #[Test] public function testGetRenderArray(): void {
    $this->element = new Container($this->mockFormBuilder);
    $this->assertEquals(
      [
        '#type' => 'container',
      ],
      $this->element->getRenderArray()
    );
  }

  #[Test] public function testMethodsExist(): void {
    $this->element = new Container($this->mockFormBuilder);
    $this->assertTrue(method_exists($this->element, 'setAttributeId'));
    $this->assertTrue(method_exists($this->element, 'setAttributeClass'));
  }

  #[Test] public function testDataMethods(): void {
    $this->element = new Container($this->mockFormBuilder);
    $this->element
      ->setAttributeId('test')
      ->setAttributeClass(['test']);

    $this->assertEquals(
      [
        '#type' => 'container',
        '#attributes' => [
          'id' => 'test',
          'class' => ['test'],
        ],
      ],
      $this->element->getRenderArray()
    );
  }

  #[Test] public function testChildren(): void {
    $container = new Container($this->mockFormBuilder);
    $container->children()
      ->addButton('button')
      ->setValue('My Button');

    $this->assertEquals(
      [
        '#type' => 'container',
        'button' => [
          '#type' => 'button',
          '#value' => 'My Button',
        ]
      ],
      $container->getRenderArray()
    );
  }

  protected function setUp(): void {
    parent::setUp();
    $this->mockFormBuilder = $this->createMock(FormBuilder::class);
  }

}

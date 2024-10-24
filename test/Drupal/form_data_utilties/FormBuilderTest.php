<?php

namespace Drupal\form_data_utilities;

use Drupal\form_data_utilities\FormElement\Textfield;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class FormBuilderTest extends TestCase {

  protected FormBuilder $formBuilder;

  #[Test] public function testAddElement(): void {
    $formElement = $this->formBuilder->addElement(
      ElementType::TEXT_FIELD,
      'textfield'
    );
    $this->assertEquals(Textfield::class, $formElement::class);
    $this->assertCount(1, $this->formBuilder->getFormElements());
  }

  /**
   * Test that creating a form with elements
   *
   * @return void
   */
  #[Test] public function testCreateForm(): void {
    $this->formBuilder
      ->addButton('button')
      ->setValue('My Button')
      ->done()
      ->addTextfield('textfield')
      ->setTitle('My text field')
      ->setSize(60);

    $this->assertEquals(
      [
        'button' => [
          '#type' => 'button',
          '#value' => 'My Button',
        ],
        'textfield' => [
          '#type' => 'textfield',
          '#title' => 'My text field',
          '#size' => 60,
          '#required' => FALSE,
        ],
      ],
      $this->formBuilder->getRenderArray()
    );
  }

  #[Test] public function testParentChildTraversal(): void {
    $this->formBuilder
      ->addButton('button')
      ->setValue('My Button')
      ->done()
      ->addContainer('container')
      ->children()
      ->addTextfield('textfield')
      ->setTitle('My text field')
      ->setSize(60)
      ->toParent()
      ->addButton('button_2')
      ->setValue('My button 2')
      ->done();

    $this->assertEquals(
      [
        'button' => [
          '#value' => 'My Button',
          '#type' => 'button',
        ],
        'container' => [
          '#type' => 'container',
          'textfield' => [
            '#type' => 'textfield',
            '#title' => 'My text field',
            '#size' => 60,
            '#required' => FALSE,
          ]
        ],
        'button_2' => [
          '#type' => 'button',
          '#value' => 'My button 2',
        ]
      ],
      $this->formBuilder->getRenderArray()
    );
  }

  protected function setUp(): void {
    parent::setUp();
    $this->formBuilder = new FormBuilder();
  }

}

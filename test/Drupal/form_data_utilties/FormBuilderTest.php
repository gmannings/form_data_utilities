<?php

namespace Drupal\form_data_utilities;

use Drupal\form_data_utilities\FormElement\Textfield;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class FormBuilderTest extends TestCase {

  protected FormBuilder $formBuilder;

  #[Test] public function testAddElement(): void {
    $formElement = $this->formBuilder->addElement(ElementType::TEXT_FIELD);
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
      ->addButton()
      ->setValue('My Button')
      ->done()
      ->addTextfield()
      ->setTitle('My text area')
      ->setSize(60);

    $this->assertEquals(
      [
        [
          '#type' => 'button',
          '#value' => 'My Button',
        ],
        [
          '#type' => 'textfield',
          '#title' => 'My text area',
          '#size' => 60,
          '#required' => FALSE,
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

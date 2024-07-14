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

  protected function setUp(): void {
    parent::setUp();
    $this->formBuilder = new FormBuilder();
  }

}

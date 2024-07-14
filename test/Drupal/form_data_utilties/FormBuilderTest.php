<?php

namespace Drupal\form_data_utilities;

use Drupal\form_data_utilities\FormElement\Textfield;
use PHPUnit\Framework\TestCase;

class FormBuilderTest extends TestCase {

  protected FormBuilder $formBuilder;

  protected function setUp(): void {
    parent::setUp();
    $this->formBuilder = new FormBuilder();
  }

  public function testAddElement() {
    $formElement = $this->formBuilder->addElement(ElementType::TEXT_FIELD);
    $this->assertEquals(Textfield::class, $formElement::class);
  }

}

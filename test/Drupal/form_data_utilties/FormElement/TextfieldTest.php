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

  protected function setUp(): void {
    parent::setUp();
    $this->mockFormBuilder = $this->createMock(FormBuilder::class);
  }

}

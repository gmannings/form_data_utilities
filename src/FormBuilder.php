<?php

namespace Drupal\form_data_utilities;

use Drupal\form_data_utilities\FormBuilder\FormElementInterface;

/**
 * Builder pattern for creating Drupal form render arrays.
 */
class FormBuilder {

  /**
   * @var FormElementInterface[] $formElements
   */
  protected array $formElements = [];

  /**
   * Convert the Drupal render element name to the corresponding class.
   *
   * @param \Drupal\form_data_utilities\ElementType $elementType
   *
   * @return string
   */
  protected function getElementClassName(ElementType $elementType): string {
    $elementType = $elementType->value;
    $parts = explode('_', $elementType);

    foreach ($parts as $index => &$part) {
      if ($index !== 0) {
        $part = ucfirst($part);
      }
    }
    return '\\Drupal\\form_data_utilities\\FormElement\\' . implode('', $parts);
  }

  /**
   * @param \Drupal\form_data_utilities\ElementType $elementType
   *
   * @return \Drupal\form_data_utilities\FormBuilder\FormElementInterface
   */
  public function addElement(ElementType $elementType): FormElementInterface {
    $fqn = $this->getElementClassName($elementType);
    $formElement = new $fqn();
    $this->formElements[] = &$formElement;
    return $formElement;
  }



}
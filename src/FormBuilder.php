<?php

namespace Drupal\form_data_utilities;

use Drupal\form_data_utilities\FormElement\Button;
use Drupal\form_data_utilities\FormElement\Container;
use Drupal\form_data_utilities\FormElement\Textfield;

/**
 * Builder pattern for creating Drupal form render arrays.
 */
class FormBuilder {

  /**
   * @var FormElementInterface[] $formElements
   */
  protected array $formElements = [];

  protected ?FormBuilder $parent = NULL;

  public function setParent(?FormBuilder $parent): FormBuilder {
    $this->parent = $parent;
    return $this;
  }

  /**
   * Get the list of form elements.
   *
   * @return \Drupal\form_data_utilities\FormElementInterface[]
   */
  public function getFormElements(): array {
    return $this->formElements;
  }

  /**
   * @return array
   */
  public function getRenderArray(): array {
    return array_map(
      fn($element) => $element->getRenderArray(),
      $this->formElements
    );
  }

  /**
   * @param string $key
   *
   * @return \Drupal\form_data_utilities\FormElement\Textfield|\Drupal\form_data_utilities\FormElementInterface
   */
  public function addTextfield(string $key): Textfield|FormElementInterface {
    return $this->addElement(ElementType::TEXT_FIELD, $key);
  }

  /**
   * @param \Drupal\form_data_utilities\ElementType $elementType
   * @param string $key
   *
   * @return \Drupal\form_data_utilities\FormElementInterface
   */
  public function addElement(ElementType $elementType, string $key): FormElementInterface {
    $fqn = $this->getElementClassName($elementType);
    $formElement = new $fqn($this, $this->parent);
    $this->formElements[$key] = &$formElement;
    return $formElement;
  }

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
   * @param string $key
   *
   * @return \Drupal\form_data_utilities\FormElement\Button|\Drupal\form_data_utilities\FormElementInterface
   */
  public function addButton(string $key): Button|FormElementInterface {
    return $this->addElement(ElementType::BUTTON, $key);
  }

  /**
   * @param string $key
   *
   * @return \Drupal\form_data_utilities\FormElement\Container|\Drupal\form_data_utilities\FormElementInterface
   */
  public function addContainer(string $key): Container|FormElementInterface {
    return $this->addElement(ElementType::CONTAINER, $key);
  }

}
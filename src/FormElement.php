<?php

namespace Drupal\form_data_utilities;

use Drupal\form_data_utilities\FormElementTrait\Children;

abstract class FormElement implements FormElementInterface {

  protected ElementType $type;

  public function __construct(
    protected FormBuilder $formBuilder,
    protected ?FormBuilder $parent = NULL
  ) {}

  /**
   * Provide access back to the FormBuilder when using fluent interfaces.
   *
   * @return \Drupal\form_data_utilities\FormBuilder
   */
  public function done(): FormBuilder {
    return $this->formBuilder;
  }

  /**
   * Navigate to the parent FormBuilder if it exists.
   *
   * @return \Drupal\form_data_utilities\FormBuilder|\Drupal\form_data_utilities\FormElementInterface
   */
  public function toParent(): ?FormBuilder {
    return $this->parent;
  }

  /**
   * Recursive method to build the current element's render array, and children.
   *
   * @return array
   */
  public function getRenderArray(): array {
    $render = [];

    $reflection = new \ReflectionClass($this);
    $traits = $reflection->getTraits();

    foreach ($traits as $trait) {

      // Handle child form builders.
      if ($trait->getName() === Children::class) {
        $childRenderArray = $this->children()->getRenderArray();
        if (!empty($childRenderArray)) {
          $render = array_merge($render, $childRenderArray);
        }
      }

      foreach ($trait->getProperties() as $property) {
        $propertyName = $property->getName();
        $getterMethod = 'get' . ucfirst($propertyName);

        if (!$reflection->hasMethod($getterMethod)) {
          continue;
        }
        $value = $this->$getterMethod();
        if (is_null($value)) {
          continue;
        }
        // Attributes are a special case that need nesting correctly.
        if (str_contains($propertyName, 'attribute')) {
          if (!isset($render['#attributes'])) {
            $render['#attributes'] = [];
          }
          $snakeCaseName = $this->camelToSnakeCase(
            str_replace('attribute', '', $propertyName)
          );
          $render['#attributes'][$snakeCaseName] = $value;
        }
        else {
          $snakeCaseName = $this->camelToSnakeCase($propertyName);
          $render['#' . $snakeCaseName] = $value;
        }
      }
    }

    $render['#type'] = $this->type->value;

    return $render;
  }

  /**
   * Converts camelCase to snake_case
   *
   * @param string $input
   *
   * @return string
   */
  protected function camelToSnakeCase(string $input): string {
    return strtolower(preg_replace('/[A-Z]/', '_$0', lcfirst($input)));
  }

  /**
   * Call setters based of a list of property keys and values.
   *
   * @param array $argumentList
   *   Arguments in key => value format, usually from get_defined_vars().
   *
   * @return void
   */
  protected function callSettersFromArgList(array $argumentList): void {
    foreach ($argumentList as $argName => $argValue) {
      // Convert the argument name setter method.
      $setter = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $argName)));

      if (method_exists($this, $setter)) {
        $this->{$setter}($argValue);
      }
    }
  }

}
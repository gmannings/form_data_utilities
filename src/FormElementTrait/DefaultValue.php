<?php

namespace Drupal\form_data_utilities\FormElementTrait;

/**
 *
 */
trait DefaultValue {

  /**
   * @var string|null
   */
  protected ?string $defaultValue = NULL;

  /**
   * @return string|null
   */
  public function getDefaultValue(): ?string {
    return $this->defaultValue;
  }

  /**
   * @param string|null $defaultValue
   *
   * @return void
   */
  public function setDefaultValue(?string $defaultValue): void {
    $this->defaultValue = $defaultValue;
  }

}
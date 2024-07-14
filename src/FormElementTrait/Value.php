<?php

namespace Drupal\form_data_utilities\FormElementTrait;

/**
 *
 */
trait Value {

  /**
   * @var string|null
   */
  protected ?string $value = NULL;

  /**
   * @return string|null
   */
  public function getValue(): ?string {
    return $this->value;
  }

  /**
   * @param string|null $value
   */
  public function setValue(?string $value): self {
    $this->value = $value;
    return $this;
  }

}
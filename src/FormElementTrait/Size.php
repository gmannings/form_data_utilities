<?php

namespace Drupal\form_data_utilities\FormElementTrait;

/**
 *
 */
trait Size {

  /**
   * @var int|null
   */
  protected ?int $size = NULL;

  /**
   * @return int|null
   */
  public function getSize(): ?int {
    return $this->size;
  }

  /**
   * @param int|null $size
   */
  public function setSize(?int $size): self {
    $this->size = $size;
    return $this;
  }

}
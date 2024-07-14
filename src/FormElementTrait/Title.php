<?php

namespace Drupal\form_data_utilities\FormElementTrait;

/**
 * Title trait.
 */
trait Title {

  // @todo add translate trait

  /**
   * @var string|null
   */
  protected ?string $title = NULL;

  /**
   * @return string|null
   */
  public function getTitle(): ?string {
    return $this->title;
  }

  /**
   * @param string|null $title
   */
  public function setTitle(?string $title): self {
    $this->title = $title;
    return $this;
  }

}
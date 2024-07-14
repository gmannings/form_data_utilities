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
   * @param string|null $title
   *
   * @return void
   */
  public function setTitle(?string $title): void {
    $this->title = $title;
  }

  /**
   * @return string|null
   */
  public function getTitle(): ?string {
    return $this->title;
  }

}
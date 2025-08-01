<?php

namespace Eduardoaraujo01\NovaEnv;

use Laravel\Nova\Card;

class NovaEnv extends Card
{
    public $envName = '.env';
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    public function envName($envName)
    {
        $this->envName = value($envName);

        return $this;
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-env';
    }
    public function jsonSerialize(): array
    {
        return array_merge(parent::jsonSerialize(),[
            'envName' => $this->envName
        ]);
    }
}

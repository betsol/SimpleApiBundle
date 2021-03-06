<?php

namespace Betsol\Bundle\SimpleApiBundle\Controller\Annotations;

use Doctrine\Common\Annotations\Annotation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationAnnotation;

/**
 * @Annotation
 * @Target({"CLASS", "METHOD"})
 */
class Disable extends ConfigurationAnnotation
{
    /**
     * @inheritdoc;
     *
     * @return string
     */
    public function getAliasName()
    {
        return 'simple-api.disable';
    }

    /**
     * @inheritdoc;
     *
     * @return bool
     */
    public function allowArray()
    {
        return false;
    }
}

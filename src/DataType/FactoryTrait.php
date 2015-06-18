<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\FactoryTrait.
 */

namespace Triquanta\IziTravel\DataType;

use JsonSchema\RefResolver;
use JsonSchema\Validator;
use Triquanta\IziTravel\MtgApiJsonSchemaUriRetriever;

/**
 * Implements parts of \Triquanta\IziTravel\DataType\FactoryInterface.
 */
Trait FactoryTrait
{

    public static function createFromJson($json)
    {
        $data = json_decode($json);
        if (is_null($data)) {
            throw new InvalidJsonFactoryException($json);
        }
        $schemaPath = static::getJsonSchemaPath();
        if ($schemaPath) {
            $schemaUri = 'file://' . $schemaPath;
            $schemaRetriever = new MtgApiJsonSchemaUriRetriever();
            $schema = $schemaRetriever->retrieve($schemaUri);

            $schemaReferenceResolver = new RefResolver($schemaRetriever);
            $schemaReferenceResolver->resolve($schema, $schemaUri);

            $schemaValidator = new Validator();
            $schemaValidator->check($data, $schema);

            if (!$schemaValidator->isValid()) {
                foreach ($schemaValidator->getErrors() as $error) {
                    throw new InvalidJsonFactoryException($json,
                      sprintf('[%s] %s', $error['property'],
                        $error['message']));
                }
            }
        }

        return static::createFromData($data);
    }

    /**
     * Gets the path to the JSON schema file for this data type.
     *
     * @return string
     *   An absolute path.
     */
    protected static function getJsonSchemaPath()
    {
        return null;
    }

}

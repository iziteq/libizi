<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\TestHelper.
 */

namespace Triquanta\IziTravel\Tests;

use Symfony\Component\Yaml\Yaml;

/**
 * Provides testing helpers.
 */
class TestHelper
{

    /**
     * Gets the testing configuration.
     *
     * @return mixed[]
     *
     * @throws |Exception
     */
    public static function getConfiguration()
    {
        $examplePath = __DIR__ . '/../test_configuration.example.yml';
        $localPath = __DIR__ . '/../test_configuration.local.yml';

        if (!file_exists($localPath)) {
            throw new \Exception(sprintf('%s does not exist. Copy %s to %s and fill out the values.',
              $localPath, $examplePath, $localPath));
        } elseif (!is_readable($localPath)) {
            throw new \Exception(sprintf('%s is not readable.', $localPath));
        } else {
            $configuration = Yaml::parse(file_get_contents($localPath));
            $requiredKeys = ['apiKey'];
            foreach ($requiredKeys as $requiredKey) {
                if (!isset($requiredKey, $configuration)) {
                    throw new \Exception(sprintf('Configuration key %s is required.',
                      $requiredKey));
                }
            }

            return $configuration;
        }

    }

    /**
     * Gets a testing JSON response.
     *
     * @param string $name
     *   The response's name.
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public static function getJsonResponse($name)
    {
        $filename = __DIR__ . '/responses/' . $name . '.json';
        if (is_readable($filename)) {
            return file_get_contents($filename);
        } else {
            throw new \InvalidArgumentException(sprintf('The file %s does not exist or is not readable.',
              $filename));
        }
    }

}

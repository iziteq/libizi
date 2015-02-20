<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\TestConfiguration.
 */

namespace Triquanta\IziTravel\Tests;

use Symfony\Component\Yaml\Yaml;

/**
 * Provides configuration for testing.
 */
class TestConfiguration
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

}

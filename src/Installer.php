<?php

declare(strict_types=1);

namespace OxidEsales\GraphQL\Skeleton;

use Composer\Factory;
use Composer\IO\IOInterface;
use Composer\Json\JsonFile;
use Composer\Script\Event;

class Installer
{
    /** @var array */
    private static $packageName;

    public static function preInstall(Event $event): void
    {
        $io = $event->getIO();
        $vendor = self::ask($io, 'What is the vendor?', 'MyVendor');
        $package = self::ask($io, 'What is the package?', 'MyPackage');
        $packageFull = sprintf('%s/%s', self::camel2dashed($vendor), self::camel2dashed($package));
        $json = new JsonFile(Factory::getComposerFile());
        $composerDefinition = self::getDefinition($vendor, $package, $packageFull, $json);
        self::$packageName = [$vendor, $package, $packageFull];
        // Update composer definition
        $json->write($composerDefinition);
        $io->write("<info>composer.json for {$composerDefinition['name']} is created.\n</info>");
    }

    public static function postInstall(Event $event = null): void
    {
        unset($event);
        list($vendor, $package, $packageFull) = self::$packageName;
        $skeletonRoot = dirname(__DIR__);
        self::recursiveJob("{$skeletonRoot}", self::rename($vendor, $package, $packageFull));
        // remove installer files
        unlink($skeletonRoot.'/README.md');
        unlink($skeletonRoot.'/LICENSE');
        unlink($skeletonRoot.'/.travis.yml');
        unlink($skeletonRoot.'/packages.json');
        rename($skeletonRoot.'/README.md.dist', $skeletonRoot.'/README.md');
        rename($skeletonRoot.'/.travis.yml.dist', $skeletonRoot.'/.travis.yml');
        unlink(__FILE__);
    }

    private static function ask(IOInterface $io, string $question, string $default): string
    {
        $ask = [
            sprintf("\n<question>%s</question>\n", $question),
            sprintf("\n(<comment>%s</comment>):", $default)
        ];

        return $io->ask($ask, $default);
    }

    private static function recursiveJob(string $path, callable $job): void
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path),
            \RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($iterator as $file) {
            if (strpos((string)$file, 'vendor/') !== false) {
                continue;
            }
            $job($file);
        }
    }

    private static function getDefinition(string $vendor, string $package, string $packageFull, JsonFile $json): array
    {
        $composerDefinition = $json->read();
        unset(
            $composerDefinition['autoload']['files'],
            $composerDefinition['scripts']['pre-install-cmd'],
            $composerDefinition['scripts']['pre-update-cmd'],
            $composerDefinition['scripts']['post-create-project-cmd'],
            $composerDefinition['homepage']
        );

        $composerDefinition['name'] = $packageFull;
        $composerDefinition['description'] = '';
        $composerDefinition['autoload']['psr-4'] = [
            "{$vendor}\\GraphQL\\{$package}\\" => 'src/',
            "{$vendor}\\GraphQL\\{$package}\\Tests\\" => 'tests/'
        ];
        $composerDefinition['extra']['oxideshop']['target-directory'] = $packageFull;

        return $composerDefinition;
    }

    private static function rename(string $vendor, string $package, string $packageFull): \Closure
    {
        $jobRename = function (\SplFileInfo $file) use ($vendor, $package, $packageFull): void {
            $fileName = $file->getFilename();
            $filePath = (string) $file;
            if ($file->isDir() || !is_writable($filePath)) {
                return;
            }
            $contents = file_get_contents($filePath);
            $contents = str_replace('__Vendor__', "{$vendor}", $contents);
            $contents = str_replace('__Package__', "{$package}", $contents);
            $contents = str_replace('__PackageFull__', "{$packageFull}", $contents);
            file_put_contents($filePath, $contents);
        };

        return $jobRename;
    }

    private static function camel2dashed(string $name): string
    {
        return strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1-', $name));
    }

}

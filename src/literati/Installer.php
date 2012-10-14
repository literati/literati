<?php
/**
 * * ComposerInstaller
 * */
namespace literati;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
/**
 * * Install sledgehammer modules via composer.
 * * @link http://getcomposer.org
 * */
class Installer extends LibraryInstaller {

        /**
         * {@inheritDoc}
         */
        public function getInstallPath(PackageInterface $package) {
            list($vendor, $name) = explode('/', $package->getName());
            return "plugins/".strtolower($name);
        }

        /**
         * {@inheritDoc}
         */
        public function supports($packageType) {
            return $packageType == 'omeka-plugin';
        }
}

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
            switch($package->getType()){
            case "omeka-plugin":
                return "plugins/".strtolower($name);
                break;
            case "omeka-theme":
                return "themes/".strtolower($name);
                break;
            case "main-project":
                return ".";
                break;
            }
        }

        /**
         * {@inheritDoc}
         */
        public function supports($packageType) {
            $types = array('omeka-plugin','omeka-theme');
            return in_array($types, $packageType);
        }
}

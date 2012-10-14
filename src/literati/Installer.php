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
                return "plugins/".$name;
                echo sprintf("setting install path for %s => %s", $vendor.'/'.$name, 'plugins/'.$name);
                break;
            case "omeka-theme":
                return "themes/".$name;
                echo sprintf("setting install path for %s => %s", $vendor.'/'.$name, 'themes/'.$name);
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
            return in_array($packageType, $types);
        }
}

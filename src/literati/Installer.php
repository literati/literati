<?php
/**
 * * ComposerInstaller
 * */
namespace literati;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

/**
 * patterned after:
 * https://github.com/RobLoach/composer-installer
 * https://github.com/sledgehammer/composer-installer
 */
class Installer extends LibraryInstaller {

        /**
         * {@inheritDoc}
         */
        public function getInstallPath(PackageInterface $package) {
            list($vendor, $name) = explode('/', $package->getName());

            switch(strtolower($name)){
                case "teiinteract":
                    $name = "TeiInteract";
                    break;
                case "teidisplay":
                    $name = "TeiDisplay";
                    break;
                case "plugin-itemrelations":
                    $name = "ItemRelations";
                    break;
                case "annotations":
                    $name = "Annotations";
                    break;
            }


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

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

            $namesMap = array(
                'teiinteract'           => 'TeiInteract',
                'teidisplay'            => 'TeiDisplay',
                'plugin-itemrelations'  => 'ItemRelations',
                'plugin-collectiontree' => 'CollectionTree',
                'plugin-geolocation'    => 'Geolocation',
                'neatline'              => 'Neatline',
                'neatlinefeatures'      => 'NeatlineFeatures',
                'neatlinemaps'          => 'NeatlineMaps',
                'neatlinetime'          => 'NeatlineTime',
                'annotations'           => 'Annotations'
                );
            
            foreach($namesMap as $k => $v){
                if(strtolower($k) == strtolower($name)){
                    $name = $v;
                }
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

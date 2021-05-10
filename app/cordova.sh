#!/bin/bash
echo "Adding Cordova Plugins"
cordova plugin add https://github.com/apache/cordova-plugin-whitelist/archive/1.3.4.tar.gz
cordova plugin add https://github.com/apache/cordova-plugin-statusbar/archive/2.4.3.tar.gz
cordova plugin add https://github.com/apache/cordova-plugin-splashscreen/archive/6.0.0.tar.gz
cordova plugin add https://github.com/apache/cordova-plugin-inappbrowser/archive/5.0.0.tar.gz
echo "Adding Cordova iOS"
cordova platform add https://github.com/apache/cordova-ios/archive/6.2.0.tar.gz
echo "Adding Cordova Android"
cordova platform add https://github.com/apache/cordova-android/archive/9.1.0.tar.gz
echo "Building iOS"
cordova build ios --developmentTeam=763YX9TPBQ --packageType=appe-store --provisioningProfile=0f6ceae4-1645-44dc-88b3-ab3ed917ec07
echo "Building Android"
cordova build android --release -- --keystore=./MyBobcat.keystore --storePassword=MalterTech --alias=com.maltertech.my-bobcat --password=MalterTech
echo "Building Complete"
open ./platforms/ios/*.xcworkspace
cp ./platforms/android/app/build/outputs/apk/release/app-release.apk ~/Insync/zach@maltertech.com/Google\ Drive/app-release.apk
<?php
namespace CallFire\Generator;

use CallFire\Generator\Soap as SoapGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\FileGenerator;

require __DIR__."/../vendor/autoload.php";

$name = "Client";
$namespace = "CallFire\Api\Soap";
$extendedClass = "SoapClient";
$wsdlURL = "http://callfire.com/api/1.1/wsdl/callfire-service-http-soap12.wsdl";

$requestNamespacePart = "Request";
$requestNamespace = "{$namespace}\\{$requestNamespacePart}";

$sourceDirectory = realpath(__DIR__."/../src/CallFire")."/Soap";

$generator = new SoapGenerator($wsdlURL);

$classGenerator = new ClassGenerator($name, $namespace, null, $extendedClass);
$classGenerator->addUse($extendedClass);
$generator->setClassGenerator($classGenerator);

$generator->generateFunctions($requestNamespace);
$generator->generateStructures($requestNamespace);
$generator->generateClasses($requestNamespace);
$classFiles = $generator->generateClassFiles();
$structureFiles = $generator->generateStructureFiles();

if(!is_dir($sourceDirectory)) {
    mkdir($sourceDirectory, 0777, true);
}
if(!is_dir("{$sourceDirectory}/{$requestNamespacePart}")) {
    mkdir("{$sourceDirectory}/{$requestNamespacePart}", 0777, true);
}

foreach($classFiles as $classFile) {
    $classFile->setFilename("{$sourceDirectory}/{$classFile->getClass()->getName()}.php");
    $classFile->write();
}

foreach($structureFiles as $structureFile) {
    $structureFile->setFilename("{$sourceDirectory}/{$requestNamespacePart}/{$structureFile->getClass()->getName()}.php");
    $structureFile->write();
}

<?php

$xml = new SimpleXMLElement_Plus('<xml><content /></xml>');

$xml->addProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="xsl/xsl.xsl"');

echo $xml->asXML();

?>
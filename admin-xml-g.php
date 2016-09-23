<?php
//Almente o tempo de execução e memória caso seja necessário
set_time_limit(3000);
ini_set('memory_limit', '-1');


include_once 'app/Mage.php';
include_once 'geraratributos.php';
$atr = new GerarAtributos();
umask(0);
Mage::app();
$products = Mage::getModel('catalog/product')->getCollection();
$products->addAttributeToSelect('*');
$products->load();
$baseUrl = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
    $output = '<?xml version="1.0"?>
                  <rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">
    <channel>';

if (count($products)):

  foreach ($products as $id => $product):

  if($product['visibility'] !==1 &&  $product['status'] == 1 &&  strstr($product['sku'],"-") == false):
  $categoryIds = $product->getCategoryIds();
  //$category = Mage::getModel('catalog/category')->load($categoryId);

  $category = Mage::getModel('catalog/product')->load($product->getId())->getCategoryIds();


  $url = $product->getProductUrl();

  $nome = $atr->GerarTitulo($product['name'],$categoryIds);
  $gca = $atr->GerarGoogleCat($categoryIds);
  $descri = $atr->GerarDescricao($product['name'],$categoryIds);
  $gtip = $atr->GerarTipoProduto($categoryIds);

  $output .= '
<item>
  <g:id>'. $product['sku'].'</g:id>
  <title><![CDATA['. $nome .']]></title>
  <description><![CDATA['. $descri .']]></description>
  <g:google_product_category>'. $gca .'</g:google_product_category>
  <link><![CDATA['. $url.']]></link>
  <g:image_link><![CDATA['. $baseUrl ."media/catalog/product". $product['thumbnail'] .']]></g:image_link>
  <g:condition>new</g:condition>
  <g:availability>in stock</g:availability>
  <g:product_type>'. $gtip .'</g:product_type>
  <g:price><![CDATA['. $product['price'] .' BRL]]></g:price>
  <g:brand>Decora Online</g:brand>
  <g:mpn>'. $product['sku'].'</g:mpn>
  <g:adwords_redirect><![CDATA['. $url.']]></g:adwords_redirect>';
  if (isset($attributes[$product['entity_id']])) {
  $output .= '
  <attributes>';
  foreach ($attributes[$product['entity_id']] as $attribute => $values)
   $output .= '
    <attribute>
     <name>'. $attribute .'</name>
      <values>'.  join(', ', $values) . '</values>
     </attribute>';
   $output .= '
 </attributes>';
  }

$output .= '
</item>';
endif;
endforeach;
endif;
header ("Content-Type: text/xml; charset=utf-8");
print $output .= '
 </channel>
 </rss>
 ';
?>


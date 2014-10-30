<?php
set_time_limit(0);
require_once('app/Mage.php'); //Path to Magento
umask(0);
Mage::app();

$collectionConfigurable = Mage::getResourceModel('catalog/product_collection')->addAttributeToFilter('type_id', array('eq' => 'configurable'));

echo '<table border="1"><thead><tr>';
    echo '<th>Configurable product</th>';
    echo '<th>Base Image</th>';
    echo '<th>Small Image</th>';
    echo '<th>Thumbnail</th>';
    echo '<th>simple product(SKU)</th>';
    echo '<th>Base Image</th>';
    echo '<th>Small Image</th>';
    echo '<th>Thumbnail</th>';
    echo '</tr></thead><tbody>';
foreach ($collectionConfigurable as $_configurableproduct) {
    /**
    * Load product by product id
    */
    $product = Mage::getModel('catalog/product')->load($_configurableproduct->getId());
    
    /**
    * Set counter for rowspan
    */
        $c=0;
        $childProducts = Mage::getModel('catalog/product_type_configurable')->getUsedProducts(null,$product);
        foreach($childProducts as $child) {
            
            $c++;
        
        }
        
         echo '<tr>';

        

                  
                 echo '<td rowspan="'.$c.'" >'.$product->getSku().'</td>';

        foreach($childProducts as $child) {

            
                if ($product->getImage()==NULL) {
                    # code...
                     echo '<td bgcolor="#FF0000">'.'</td>';
                }else{
                echo '<td  bgcolor="#00FF00">'.'</td>';
                }
                if ($product->getSmallImage()==NULL) {
                    # code...
                    echo '<td bgcolor="#FF0000">'.'</td>';
                }else{
                echo '<td  bgcolor="#00FF00">'.'</td>';
                }
                if ($product->getThumbnail()==NULL) {
                    # code...
                    echo '<td bgcolor="#FF0000">'.'</td>';
                }
                else{
                echo '<td bgcolor="#00FF00">'.'</td>';
                }

                echo '<td>'.$child->getSku().'</td>';
                if ($child->getImage()==NULL) {
                    # code...
                      echo '<td bgcolor="#FF0000">'.'</td>';
                }else{
                echo '<td bgcolor="#00FF00">'.'</td>';
                }
                if ($child->getSmallImage()==NULL) {
                    # code...
                     echo '<td bgcolor="#FF0000">'.'</td>';
                }else{
                echo '<td bgcolor="#00FF00">'.'</td>';
                }
                if ($child->getThumbnail()==NULL) {
                    # code...
                     echo '<td bgcolor="#FF0000">'.'</td>';
                }else{
                echo '<td bgcolor="#00FF00">'.'</td>';
                }
                echo '</tr>'; 

         }
        
   
   
}
echo '</tbody></table>';
?>

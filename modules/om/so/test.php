<?php
include_once('om_so.inc');

$item = new item;


echo "<br/><br/><br/><br/><br/>current page is : ". thisPage_url();

echo "<br/>decimal of 1 is : ". ino_showDecimal(1);
echo "<br/>decimal of 1.1 is : ". ino_showDecimal(1.1);
echo "<br/>decimal of 1.12 is : ". ino_showDecimal(1.12);
echo "<br/>decimal of 1.123 is : ". ino_showDecimal(1.123);
echo "<br/>decimal of 1.1234 is : ". ino_showDecimal(1.1234);
echo "<br/>decimal of 1.12345 is : ". ino_showDecimal(1.12345);
echo "<br/>decimal of 1.10 is : ". ino_showDecimal(1.10);
echo "<br/>decimal of 66.00000 is : ". ino_showDecimal(66.00000,'.');
echo "<br/>decimal of 1.1001 is : ". ino_showDecimal(1.1001);

//$item_number = 'buy_03';
////function find_all_assigned_org_ids($item_number){
// global $db;
//	$sql = "SELECT * FROM " .
//					'supplier';
//$result = $db->result_array_assoc($sql);	
//
//$result  = file_reference::find_all();
////$assigned_inventory_orgs_array = [];
//  echo '<pre>';
//  print_r($result);
//  echo '<pre>';

//

?>


<!--<form action="item_download.php" method="POST" name="item_download">
  
  
  <input type="submit" class="button" value="download">
</form>-->

<?php 
global $db;
//$item_types = item::item_types();

        
//$query = "SHOW COLUMNS FROM item ";
//
//$query="Select * from information_schema.tables where table_name='item'";

//$query="select *
//from information_schema.key_column_usage
//where constraint_schema = 'inoideas_erp' AND TABLE_NAME LIKE '%item%'";
//
//$result = $db->query($query);
//while($rows = $db->fetch_array($result)){
//  echo '<pre>';
//  print_r($rows);
//  echo '<pre>';
//}

$query1= "ALTER TABLE om_so_line 
  CHANGE `line_uom` uom int(12) " ;
//	ADD `accepted_quantity` int(12) NOT NULL AFTER received_quantity,
//	ADD `delivered_quantity` int(12) NOT NULL AFTER accepted_quantity,
//	ADD `invoiced_quantity` int(12) NOT NULL AFTER delivered_quantity,
//	ADD `paid_quantity` int(12) NOT NULL AFTER invoiced_quantity";

$result1 = $db->query($query1);

//$query2= "ALTER TABLE om_so_detail 
//  CHANGE `received_quantity` received_quantity int(12),
//	CHANGE `accepted_quantity` accepted_quantity int(12),
//	CHANGE `delivered_quantity` delivered_quantity int(12),
//	CHANGE `invoiced_quantity` invoiced_quantity int(12),
//	CHANGE `paid_quantity` paid_quantity int(12)";
//$result2 = $db->query($query2);
//
//$query3= "ALTER TABLE om_so_line 
//  ADD `line_uom` int(12) AFTER line_description " ;
//$result3 = $db->query($query3);

//$query1="ALTER TABLE supplier_bu
//ADD pay_on  varchar(50)   after remittance_advice_email,
//ADD debit_memo_onreturn boolean   after pay_on,
//ADD fob  varchar(256)   after debit_memo_onreturn,
//ADD freight_terms  varchar(256)   after fob,
//ADD transom_sortation  varchar(256)   after freight_terms,
//ADD country_of_origin  varchar(256)   after transom_sortation
// ";
//
//$query1= "ALTER TABLE supplier_site
//  ADD site_tax_country varchar(256) after supplier_site_name,
//	ADD site_tax_reg_no varchar(100) after site_tax_country,
//	ADD site_tax_payer_id varchar(100) after site_tax_reg_no,
//	ADD site_tax_code varchar(100) after site_tax_payer_id";
//	
//	$query1= "ALTER TABLE om_so_detail
//  ADD ship_to_inventory varchar(50)";
//////
//////
////
//$query1="
//	 CREATE OR REPLACE VIEW all_om_so_v
//(
//om_so_header_id, bu_org_id, om_so_type, om_so_number, supplier_id, supplier_site_id, buyer, currency, header_amount, om_so_status,
//payment_term_id,
//supplier_name, supplier_number,
//supplier_site_name, supplier_site_number,
//payment_term, payment_term_description,
//om_so_line_id, line_type, line_number,	item_id, item_description, line_description, line_quantity, unit_price, line_price,
//item_number, uom_id, item_status,
//om_so_detail_id, shipment_number, ship_to_id, sub_inventory_id, locator_id, requestor, quantity,
//need_by_date, promise_date, 
//ship_to_org
//)
//AS
//SELECT 
//om_so_header.om_so_header_id, om_so_header.bu_org_id, om_so_header.om_so_type, om_so_header.om_so_number, om_so_header.supplier_id, 
//om_so_header.supplier_site_id, om_so_header.buyer, om_so_header.currency, om_so_header.header_amount, om_so_header.om_so_status,
//om_so_header.payment_term_id,
//supplier.supplier_name, supplier.supplier_number,
//supplier_site.supplier_site_name, supplier_site.supplier_site_number,
//payment_term.payment_term, payment_term.description,
//om_so_line.om_so_line_id, om_so_line.line_type, om_so_line.line_number,	om_so_line.item_id, om_so_line.item_description, om_so_line.line_description, 
//om_so_line.line_quantity, om_so_line.unit_price, om_so_line.line_price,
//item.item_number, item.uom_id, item.item_status,
//om_so_detail.om_so_detail_id, om_so_detail.shipment_number, om_so_detail.ship_to_inventory, om_so_detail.sub_inventory_id, 
//om_so_detail.locator_id, om_so_detail.requestor, om_so_detail.quantity, om_so_detail.need_by_date, om_so_detail.promise_date,
//org.org
//
//FROM om_so_header 
//LEFT JOIN supplier ON om_so_header.supplier_id = supplier.supplier_id
//LEFT JOIN supplier_site ON om_so_header.supplier_site_id = supplier_site.supplier_site_id
//LEFT JOIN payment_term ON om_so_header.payment_term_id = payment_term.payment_term_id
//LEFT JOIN om_so_line ON om_so_header.om_so_header_id = om_so_line.om_so_header_id
//LEFT JOIN item ON om_so_line.item_id = item.item_id
//LEFT JOIN om_so_detail ON om_so_line.om_so_line_id = om_so_detail.om_so_line_id
//LEFT JOIN org ON om_so_detail.ship_to_inventory = org.org_id
//
//";
//$result1 = $db->query($query1);

//$query = "RENAME TABLE om_so_shipment TO om_so_detail ";
//$result = $db->query($query);
//
$query = "SHOW COLUMNS FROM om_so_line ";
//$query = "Select *  FROM all_om_so_v ";
////
//echo '<h2>New values </h2>' ;
//
////echo "<pre>"; 
////print_r(om_so_header::find_all());
////$query="Select * from information_schema.tables where table_name='enterprise'";
$result = $db->query($query);
////
//echo "<pre>";
//print_r($result);
//echo "<pre>";
////
while($rows = $db->fetch_array($result)){
  echo '<br /> field_name is '.$rows['Field'];
// echo "<pre>";
// print_r($rows);
}
//echo '<h2>New values </h2>' ;
//$query="Select * from information_schema.tables where table_name='om_so_header'";
//$result = $db->query($query);
//while($rows = $db->fetch_array($result)){
//  echo '<pre>';
//  print_r($rows);
//  echo '<pre>';
//}



?>
<!--  <select name="inventory_id" id="inventory_id" > 
   
  <?php
//  $item_masters= inventory_org::find_all_item_master();
  
//  echo '<pre>';
//  print_r($item_masters);
//  echo '<pre>';
  
//  foreach ($item_masters as $key=>$value) {
//    echo '<option value="' . $value->inventory_id .'"';
////    echo $types[$i]->option_line_code == $org->type ? 'selected' : 'NONE';
//    echo '>' . $value->code . ' (inventory id '. $value->inventory_id .') </option>';
//  }
  ?> 
<option value="" ></option> 
  </select> -->
<!--   end of structure-->

<?php 
execution_time(); 
include_template('footer.inc') ?>
<?php
include_once('./Database.php');

DEFINE("MARK_SQUARE",2);
DEFINE("MARK_UTRIANGLE",1);
DEFINE("MARK_DTRIANGLE",3);
DEFINE("MARK_DIAMOND",4);
DEFINE("MARK_CIRCLE",5);
DEFINE("MARK_FILLEDCIRCLE",6);
DEFINE("MARK_CROSS",7);
DEFINE("MARK_STAR",8);
DEFINE("MARK_X",9);

$PlotInfo = array (
		'number_of_stations' => 
		array(
			'function'=>'ScatterPlot', 
			'title' => '%s From %s',
			'x_label' => 'Date',
			'y_label' => 'Number Of Stations', 
			'y_min' => 0, 
			'y_max' => 40, 
			'x_col' => 'observation_date',
			'y_col_count' => 1,
			'y_data' => array('number_of_stations','Number Of Stations',MARK_SQUARE, "red")
		     ),
		'obs' =>
		array(
			'function'=>'ScatterPlot', 
			'title' => '%s From %s',
			'x_label' => 'Date',
			'y_label' => 'Number Of Observation', 
			'y_min' => 0, 
			'y_max' => 10000, 
			'x_col' => 'observation_date',
			'y_col_count' => 1,
			'y_data' => array('obs','Number Of Observation',MARK_CROSS, "red")
		     ),  

		'unk' =>
		array(
			'function'=>'ScatterPlot', 
			'title' => '%s From %s',
			'x_label' => 'Date',
			'y_label' => 'Number Of Unknowns', 
			'y_min' => 0, 
			'y_max' => 700, 
			'x_col' => 'observation_date',
			'y_col_count' => 1,
			'y_data' => array('unk','Number Of Unknowns',MARK_SQUARE, "blue")
		     ), 
		'wssoc' => 
		array(
			'function'=>'ScatterPlot', 
			'title' => '%s From %s',
			'x_label' => 'Date',
			'y_label' => 'SUM OF SQUARED WEIGHTED MISCLOSURES', 
			'y_min' => 0, 
			'y_max' => 8, 
			'x_col' => 'observation_date',
			'y_col_count' => 1,
			'y_data' => array('wssoc','SUM OF SQUARED WEIGHTED MISCLOSURES ',MARK_DIAMOND, "black")
		     ),

		'vf' =>
		array(
			'function'=>'ScatterPlot', 
			'title' => '%s From %s',
			'x_label' => 'Date',
			'y_label' => 'Variance Factor', 
			'y_min' => 0.000001, 
			'y_max' => 0.004, 
			'x_col' => 'observation_date',
			'y_col_count' => 1,
			'y_data' => array('vf','Variance Factor',MARK_FILLEDCIRCLE, "blue"),
			'y_scale' => 'log'
		     ), 
		'Txyz' => 
		array(
'function'=>'ScatterPlot',
		#	'function'=>'ErrorPlot', 
			'title' => '%s vs SLRF2014 From %s',
			'x_label' => 'Date',
			#'y_label' => 'Origin Offset Tx, Ty, Tz [mm]', 
			'y_label' => 'Origin Offset %s [mm]', 
			'y_min' => -200, 
			'y_max' => 200, 
			'x_col' => 'observation_date',
			'y_col_count' => 3,
			'y_data' => array('tx','Tx',MARK_X, "red",
						'ty', 'Ty', MARK_SQUARE, "blue",
						'tz', 'Tz', MARK_DIAMOND, "black"),
			'y_error_data' => array('txs', 'tys', 'tzs'),
			'addon_text' => array( "Tx [mm]", "Ty [mm]", "Tz [mm]")
		     ),
		'Scale' =>
		array(
'function'=>'ScatterPlot',
#			'function'=>'ErrorPlot', 
			'title' => '%s vs SLRF2014 From %s',
			'x_label' => 'Date',
			'y_label' => 'SCALE [ppb]', 
			'y_min' => -15, 
			'y_max' => 15, 
			'x_col' => 'observation_date',
			'y_col_count' => 1,
			'y_data' => array('scal','SCALE', MARK_SQUARE, "blue"),
			'y_error_data' => array('scals'),
			'addon_text' => ""
		     ),
		'Rxyz' => 
		array(
			'function'=>'ErrorPlot', 
			'title' => '%s vs ITRF2000 From %s',
			'x_label' => 'Date',
			#'y_label' => 'Rotation Rx, Ry, Rz [mas]', 
			'y_label' => 'Rotation %s [mas]', 
			//'y_min' => -100, 
			//'y_max' => 100, 
			'x_col' => 'observation_date',
			'y_col_count' => 3,
			'y_data' => array('rx','Rx',MARK_X, "red",
						'ry', 'Ry', MARK_SQUARE, "blue",
						'rz', 'Rz', MARK_DIAMOND, "black"),
			'y_error_data' => array('rxs', 'rys', 'rzs'),
			'addon_text' => array("Rx [mas]","Ry [mas]", "Rz [mas]")
		     ),
		'GRMS' =>
		array(
			'function'=>'ScatterPlot', 
			'title' => '%s vs SLRF2014 From %s',
			'x_label' => 'Date',
			'y_label' => 'WRMS [mm]', 
			'y_min' => 0, 
			'y_max' => 100, 
			'x_col' => 'observation_date',
			'y_col_count' => 1,
			'y_data' => array('grms','Gloabal WRMS',MARK_SQUARE, "red")
		     ),
		'CRMS' =>
		array(
			'function'=>'ScatterPlot', 
			'title' => '%s vs SLRF2014 From %s',
			'x_label' => 'Date',
			'y_label' => 'CRMS [mm]', 
			'y_min' => 0, 
			'y_max' => 100, 
			'x_col' => 'observation_date',
			'y_col_count' => 1,
			'y_data' => array('crms','Core RMS',MARK_SQUARE, "red")
		     ),
		'eop' =>
		array(
			'function'=>'ErrorPlot', 
			'title' => '%s vs IERS Bulletin A From %s',
			'x_label' => 'Date',
			'y_label' => 'Polar Motion [{/Symbol m}as]', 
			'y2_label' => 'LOD [{/Symbol m}ts]',
			//'y_min' => -5000, 
			//'y_max' => 5000, 
			'x_col' => 'observation_date',
			'y_col_count' => 3,
			'y_data' => array('eopx','X - pole', MARK_X, "red",
						'eopy', 'Y - pole', MARK_SQUARE, "blue",
						'eoplod', 'LOD', MARK_DIAMOND, "black"),
			'y_error_data' => array('sigeopx', 'sigeopy', 'sigeoplod'),
			'addon_text' => array("X-pole [{/Symbol m}as]", "Y-pole [{/Symbol m}as]", "LOD [{/Symbol m}ts]")
		     ),
		'eopmean' =>
		array(
			'function'=>'ScatterPlot', 
			'title' => '%s vs IERS Bulletin A From %s',
			'x_label' => 'Date',
			'y_label' => 'Weighted Mean EOP Offset [{/Symbol m}as]', 
			'y2_label' => 'LOD [{/Symbol m}ts]',
			//'y_min' => -5000, 
			//'y_max' => 5000, 
			'x_col' => 'observation_date',
			'y_col_count' => 3,
			'y_data' => array('eopmean_x','X - pole', MARK_X, "red",
						'eopmean_y', 'Y - pole', MARK_SQUARE, "blue",
						'eopmean_lod', 'LOD', MARK_DIAMOND, "black"),
			'addon_text' => array("X-pole[{/Symbol m}as]", "Y-pole[{/Symbol m}as]", "LOD[{/Symbol m}ts]"),
			'table_info' => 'eopmean'
		     ),
		'eopSTD' =>
		array(
			'function'=>'ScatterPlot', 
			'title' => '%s vs IERS Bulletin A From %s',
			'x_label' => 'Date',
			'y_label' => 'Standard Deviation EOP [{/Symbol m}as]', 
			'y2_label' => 'LOD [{/Symbol m}ts]',
			//'y_min' => -5000, 
			//'y_max' => 5000, 
			'x_col' => 'observation_date',
			'y_col_count' => 3,
			'y_data' => array('eopstd_x','X - pole', MARK_X, "red",
						'eopstd_y', 'Y - pole', MARK_SQUARE, "blue",
						'eopstd_lod', 'LOD', MARK_DIAMOND, "black"),
			'addon_text' => array("X-pole[{/Symbol m}as]", "Y-pole[{/Symbol m}as]", "LOD[{/Symbol m}ts]"),
			'table_info' => 'eopstd'
		     ),
		'XYZ' =>
		array(
			'function'=>'ErrorPlot', 
			'title' => '%s %s vs SLRF2014 From %s',
			'x_label' => 'Date',
			#'y_label' => 'X, Y, Z Offset [mm]', 
			'y_label' => '%s Offset [mm]', 
			//'y_min' => -5000, 
			//'y_max' => 5000, 
			'x_col' => 'observation_date',
			'y_col_count' => 3,
			'y_data' => array('x', 'X %s', MARK_X, "black",
						'y', 'Y %s', MARK_FILLEDCIRCLE, "blue",
						'z', 'Z %s', MARK_SQUARE, "red"),
			'y_error_data' => array('sigx', 'sigy', 'sigz'),
			'addon_text' => array("X [mm]","Y [mm]","Z [mm]"),
			'table_info' => 'position'
		     ),
		'NEU' =>
		array(
			'function'=>'ErrorPlot', 
			'title' => '%s %s vs SLRF2014 From %s',
			'x_label' => 'Date',
			#'y_label' => 'N, E, U Offset [mm]', 
			'y_label' => '%s Offset [mm]', 
			//'y_min' => -5000, 
			//'y_max' => 5000, 
			'x_col' => 'observation_date',
			'y_col_count' => 3,
			'y_data' => array('n','N %s', MARK_X, "red",
						'e', 'E %s', MARK_SQUARE, "blue",
						'u', 'U %s', MARK_DIAMOND, "black"),
			'y_error_data' => array('sign', 'sige', 'sigu'),
			'addon_text' => array("N [mm]","E [mm]","U [mm]"),
			'table_info' => 'euposition'
		     ),                                   
		'3DWRM' =>
		array(
			'function'=>'ScatterPlot', 
			'title' => '%s %s vs SLRF2014 From %s',
			'x_label' => 'Date',
			'y_label' => '3D Position WRMS [mm]', 
			//'y_min' => -5000, 
			//'y_max' => 5000, 
			'x_col' => 'observation_date',
			'y_col_count' => 1,
			'y_data' => array('drwrms','%s', MARK_UTRIANGLE, "red"),
			'table_info' => 'position'
		     ),

		'Helmert_Txyz_COM' =>
		array(
                        'function'=>'ScatterPlot',
#			'function'=>'ErrorPlot', 
			'title' => '%s vs ILRS-A From %s',
			'x_label' => 'Date',
			#'y_label' => 'Origin Offset Tx, Ty, Tz,[mm]', 
			'y_label' => 'Origin Offset %s [mm]', 
			//'y_min' => -5000, 
			//'y_max' => 5000, 
			'x_col' => 'observation_date',
			'y_col_count' => 3,
			'y_data' => array('tx','Tx', MARK_X, "red",
						'ty', 'Ty', MARK_SQUARE, "blue",
						'tz', 'Tz', MARK_DIAMOND, "black"),
			'y_error_data' => array('txs', 'tys', 'tzs'),
			'addon_text' => array("Tx [mm]","Ty [mm]","Tz [mm]"),
			'table_info' => 'helemrtinfo'
		     ),
		'Scale_COM' =>
		array(
                        'function'=>'ScatterPlot',
#			'function'=>'ErrorPlot', 
			'title' => '%s ILRS-A From %s',
			'x_label' => 'Date',
			'y_label' => 'SCALE [ppb]', 
			//'y_min' => -5000, 
			//'y_max' => 5000, 
			'x_col' => 'observation_date',
			'y_col_count' => 1,
			'y_data' => array('scale','SCALE', MARK_SQUARE, "blue"),
			'y_error_data' => array('scales'),
			'table_info' => 'helemrtinfo'
		     ),
		'Helmert_Rxyz_COM' => 
		array(
			'function'=>'ErrorPlot', 
			'title' => '%s vs ILRS-A From %s',
			'x_label' => 'Date',
			#'y_label' => 'Rotation Rx, Ry, Rz [mas]', 
			'y_label' => 'Rotation %s [mas]', 
			'y_min' => -150, 
			'y_max' => 180, 
			'x_col' => 'observation_date',
			'y_col_count' => 3,
			'y_data' => array('rx','Rx',MARK_X, "red",
						'ry', 'Ry', MARK_SQUARE, "blue",
						'rz', 'Rz', MARK_DIAMOND, "black"),
			'y_error_data' => array('rxs', 'rys', 'rzs'),  
			'addon_text' => array("Rx [mas]","Ry [mas]","Rz [mas]"),
			'table_info' => 'helemrtinfo'
		     ), 
		'EOPX_STD' =>
		array(
				'function'=>'StockPlot', 
				'title' => '',
				'x_label' => 'Analysis Center',
				'y_label' => 'Range of WRMS (AC - Combination)', 
				'x_col' => 'observation_date',
				'y_col_count' => 1,
				'y_data' => array('eopx','RMS for X-pole higher than Combination',MARK_CIRCLE, "red",
								"RMS for X-pole less than Combination", MARK_CIRCLE, "blue"),
				'table_info' => 'eop'
		     ),                                    
		'EOPY_STD' =>
		array(
				'function'=>'StockPlot', 
				'title' => '',
				'x_label' => 'Analysis Center',
				'y_label' => 'Range of WRMS (AC - Combination)', 
				'x_col' => 'observation_date',
				'y_col_count' => 1,
				'y_data' => array('eopy','RMS for Y-pole higher than Combination',MARK_CIRCLE,"red",
								"RMS for Y-pole less than Combination", MARK_CIRCLE, "blue"),
				'table_info' => 'eop'
		     ),
		'EOPLOD_STD' =>
		array(
				'function'=>'StockPlot', 
				'title' => '',
				'x_label' => 'Analysis Center',
				'y_label' => 'Range of WRMS (AC - Combination)', 
				'x_col' => 'observation_date',
				'y_col_count' => 1,
				'y_data' => array('eoplod','RMS for LOD higher than Combination',MARK_CIRCLE, "red",
								"RMS for LOD less than Combination", MARK_CIRCLE, "blue"),
				'table_info' => 'eop'
		     ),
		'GRMS1' =>
		array(
				'function'=>'StockPlot', 
				'title' => '',
				'x_label' => 'Analysis Center',
				'y_label' => 'Range of WRMS (AC - Combination)', 
				'y_min' => -100, 
				'y_max' => 100, 
				'x_col' => 'observation_date',
				'y_col_count' => 1,
				'y_data' => array('grms','Global Network WRMS higher than Combination',MARK_CIRCLE, "red",
								"Global Network WRMS less than Combination", MARK_CIRCLE, "blue"),
				'table_info' => 'info'
		     ),
		'CRMS1' =>
		array(
				'function'=>'StockPlot', 
				'title' => '',
				'x_label' => 'Analysis Center',
				'y_label' => 'Range of WRMS (AC - Combination)', 
				'y_min' => -100, 
				'y_max' => 100, 
				'x_col' => 'observation_date',
				'y_col_count' => 1,
				'y_data' => array('crms','Core Network WRMS higher than Combination',MARK_CIRCLE, "red",
								"Core Network WRMS less than Combination", MARK_CIRCLE, "blue"),
				'table_info' => 'info'
		     ),                                   

		)
?>

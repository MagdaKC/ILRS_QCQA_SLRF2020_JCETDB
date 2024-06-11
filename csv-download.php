<?php
  // Creates a new csv file and store it in tmp directory
  $new_csv = fopen('/tmp/report.csv', 'w');
    fputcsv($new_csv, $row);
	  fclose($new_csv);
	   
	    // output headers so that the file is downloaded rather than displayed
	    header("Content-type: text/csv");
		  header("Content-disposition: attachment; filename = report.csv");
		    readfile("/tmp/report.csv");
			?>

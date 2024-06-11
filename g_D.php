//The PLOT 1 works with conditions
if ($_POST[PLOTS2]=="number_of_stations" or $_POST[PLOTS2]=="obs" or  $_POST[PLOTS2]=="unk" or  $_POST[PLOTS2]=="wssoc" or  $_POST[PLOTS2]=="vf"  or $_POST[PLOTS2]=="drwrms" )
{if ($_POST[analysis_center]!="com")
{ include "data_plot1N_D.php"; }

//THe plot 3 work with conditions
if ($_POST[PLOTS2]=="XYZ"  or $_POST[PLOTS2]=="eop" or $_POST[PLOTS2]=="eopmean" or $_POST[PLOTS2]=="eopSTD" or $_POST[PLOTS2]=="NEU"  )
if($_POST['var0']=="" and $_POST['var1']=="" and $_POST['var2']=="")
include"data_plot4N_D_A.php";
include"$station_numberA";
include"$station_numberADH";
include"$station_numberADD";
include"data_plot4N_D_B.php";
include"$station_numberB";
include"$station_numberBDH";
include"$station_numberBDD";
include"data_plot4N_D_C.php";
include"$station_numberC";
include"$station_numberCDH";
include"$station_numberCDD";
include"data_plot4N_D_D.php";


elseif ($_POST['var0']=="yes" and $_POST['var1']=="yes" and $_POST['var2']=="")
     include "data_plot4N_D_A.php";
     include "$station_numberA";
     include "$station_numberADH";
     include "$station_numberADD";
     include "data_plot4N_D_B.php";
     include "$station_numberB";
     include "$station_numberBDH";
     include "$station_numberBDD";
     include "data_plot4N_D_C2.php";
     include "data_plot4N_D_D2.php";

elseif ($_POST['var0']=="yes" and $_POST['var1']=="" and $_POST['var2']=="yes")
     include "data_plot4N_D_A.php";
     include "$station_numberA";
     include "$station_numberADH";
     include "$station_numberADD";
     include "data_plot4N_D_B3.php";
     include "data_plot4N_D_C3.php";
     include "$station_numberC";
     include "$station_numberCDH";
     include "$station_numberCDD";
     include "data_plot4N_D_D3.php";
elseif ($_POST['var0']=="" and $_POST['var1']=="yes" and $_POST['var2']=="yes")
     include "data_plot4N_D_A4.php";
     include "data_plot4N_D_B4.php";
     include "$station_numberB";
     include "$station_numberBDH";
     include "$station_numberBDD";
     include "data_plot4N_D_C4.php";
     include "$station_numberC";
     include "$station_numberCDH";
     include "$station_numberCDD";
     include "data_plot4N_D_D4.php";

elseif ($_POST['var0']=="yes" and $_POST['var1']=="" and $_POST['var2']=="")
     include "data_plot4N_D_A.php";
     include "$station_numberA";
     include "$station_numberADH";
     include "$station_numberADD";
     include "data_plot4N_D_B5.php";
     include "data_plot4N_D_D5.php";
}}

elseif ($_POST['var0']=="" and $_POST['var1']=="yes" and $_POST['var2']=="")
     include "data_plot4N_D_A6.php";
     include "data_plot4N_D_B6.php";
     include "$station_numberB";
     include "$station_numberBDH";
     include "$station_numberBDD";
     include "data_plot4N_D_C6.php";
     include "data_plot4N_D_D6.php";

elseif ($_POST['var0']=="" and $_POST['var1']=="" and $_POST['var2']=="yes")
     include "data_plot4N_D_A7.php";
     include "data_plot4N_D_C7.php";
     include "$station_numberC";
     include "$station_numberCDH";
     include "$station_numberCDD";
     include "data_plot4N_D_D7.php";
 

//THe plot 3 work with conditions TXYZ
if ( $_POST[PLOTS2]=="Txyz"  )
if($_POST['var0']=="" and $_POST['var1']=="" and $_POST['var2']=="")
{
include "data_plot3N_D.php";
}
elseif ($_POST['var0']=="yes" and $_POST['var1']=="yes" and $_POST['var2']=="")
{
	include "data_plot3N2_D.php";
}
elseif ($_POST['var0']=="yes" and $_POST['var1']=="" and $_POST['var2']=="yes")
{
	    include "data_plot3N3_D.php";
}
elseif ($_POST['var0']=="" and $_POST['var1']=="yes" and $_POST['var2']=="yes")
{
	        include "data_plot3N4_D.php";
}

elseif ($_POST['var0']=="yes" and $_POST['var1']=="" and $_POST['var2']=="")
{
	        include "data_plot3N5_D.php";
}

elseif ($_POST['var0']=="" and $_POST['var1']=="yes" and $_POST['var2']=="")
{
	        include "data_plot3N6_D.php";
}

elseif ($_POST['var0']=="" and $_POST['var1']=="" and $_POST['var2']=="yes")
{
	        include "data_plot3N7_D.php";
}



}

//THe plot 3 work with conditions RXYZ
if ($_POST[PLOTS2]=="Rxyz" and $_POST[combination_center]=="ilrsa")
{
if($_POST['var0']=="" and $_POST['var1']=="" and $_POST['var2']=="")
include "data_plot3N_D.php";
}
elseif ($_POST['var0']=="yes" and $_POST['var1']=="yes" and $_POST['var2']=="")
	include "data_plot3N2_D.php";
elseif ($_POST['var0']=="yes" and $_POST['var1']=="" and $_POST['var2']=="yes")
	    include "data_plot3N3_D.php";
elseif ($_POST['var0']=="" and $_POST['var1']=="yes" and $_POST['var2']=="yes")
	        include "data_plot3N4_D.php";
elseif ($_POST['var0']=="yes" and $_POST['var1']=="" and $_POST['var2']=="")
	        include "data_plot3N5_D.php";
elseif ($_POST['var0']=="" and $_POST['var1']=="yes" and $_POST['var2']=="")
	        include "data_plot3N6_D.php";
elseif ($_POST['var0']=="" and $_POST['var1']=="" and $_POST['var2']=="yes")
	        include "data_plot3N7_D.php";




if ($_POST[PLOTS2]=="Helmert_Rxyz_COM" and $_POST[combination_center]=="ilrsb")
{
if ( $_POST[PLOTS2]=="Helmert_Txyz_COM"  )
elseif ($_POST['var0']=="" and $_POST['var1']=="" and $_POST['var2']=="")
{
$ANSWER="Please select the parameters from the sidebar.";
echo "<br><br><br><br><br><br><br><br><br><center><font color='red' size='24'>$ANSWER</font>".'<br/><br/>';
}
elseif ($_POST['var0']=="yes" and $_POST['var1']=="yes" and $_POST['var2']=="yes")
include "data_plot3N_D.php";
elseif ($_POST['var0']=="yes" and $_POST['var1']=="yes" and $_POST['var2']=="")
	include "data_plot3N2_D.php";
elseif ($_POST['var0']=="yes" and $_POST['var1']=="" and $_POST['var2']=="yes")
	    include "data_plot3N3_D.php";
elseif ($_POST['var0']=="" and $_POST['var1']=="yes" and $_POST['var2']=="yes")
	        include "data_plot3N4_D.php";
elseif ($_POST['var0']=="yes" and $_POST['var1']=="" and $_POST['var2']=="")
	        include "data_plot3N5_D.php";
elseif ($_POST['var0']=="" and $_POST['var1']=="yes" and $_POST['var2']=="")
	        include "data_plot3N6_D.php";
elseif ($_POST['var0']=="" and $_POST['var1']=="" and $_POST['var2']=="yes")
	        include "data_plot3N7_D.php";



if (  $_POST[PLOTS2]=="Helmert_Rxyz_COM" and $_POST[combination_center]=="ilrsa" )
elseif ($_POST['var0']=="yes" and $_POST['var1']=="yes" and $_POST['var2']=="yes")
include "data_plot3N_D.php";
elseif ($_POST['var0']=="yes" and $_POST['var1']=="yes" and $_POST['var2']=="")
	include "data_plot3N2_D.php";
elseif ($_POST['var0']=="yes" and $_POST['var1']=="" and $_POST['var2']=="yes")
	    include "data_plot3N3_D.php";
elseif ($_POST['var0']=="" and $_POST['var1']=="yes" and $_POST['var2']=="yes")
	        include "data_plot3N4_D.php";
elseif ($_POST['var0']=="yes" and $_POST['var1']=="" and $_POST['var2']=="")
	        include "data_plot3N5_D.php";
elseif ($_POST['var0']=="" and $_POST['var1']=="yes" and $_POST['var2']=="")
	        include "data_plot3N6_D.php";
elseif ($_POST['var0']=="" and $_POST['var1']=="" and $_POST['var2']=="yes")
	        include "data_plot3N7_D.php";


if ($_POST[PLOTS2]=="Scale" or $_POST[PLOTS2]=="GRMS" or  $_POST[PLOTS2]=="CRMS")
{ include "data_plot5N_D.php";
}

 if( $_POST[PLOTS2]=="Scale_COM" and $_POST[analysis_center]=="com" )
        { include "data_plot5N_D.php";


<?php

//include library
include('TCPDF/tcpdf.php');

//Make TCPDF object
$pdf = new TCPDF('P', 'mm', 'A4');
 

//remove defaut header and footer because by default the are set to true
$pdf->setPrintHeader(false);
$pdf->setPrintHeader(false);

//add page
$pdf->AddPage();

//add content
//using cell
$pdf->Cell(190, 10, "this is a cell", 1, 1, 'C');

//using html cell
$html = '<html>
            <head></head>
                <body>
                    <table border="1">
                        <tr>
                            <th>name</th>
                            <th>company</th></tr>
                        <tr>
                            <td>hello</td>
                            <td>xx technologies</td>
                        </tr>
                </table>
            </body>
        </html>';
$pdf->writeHTML($html, true, 0, true, 0);

//output
$pdf->Output();

//save the file automatically when opening the page
//$pdf->Output('saved', 'D');
?>

<?php
require('fpdf/fpdf.php');
require('htmlparser.inc');
require('html_table.php');

$htmlTable='<TABLE>
<TR>
<TD>S. No.</TD>
<TD>Name</TD>
<TD>Age</TD>
<TD>Sex</TD>
<TD>Location</TD>
<TD>Contry</TD>
</TR>

<TR>
<TD>1</TD>
<TD>Azeem</TD>
<TD>24</TD>
<TD>Male</TD>
<TD>Pakistan</TD>
<TD>Contry</TD>
</TR>

<TR>
<TD>2</TD>
<TD>Atiq</TD>
<TD>24</TD>
<TD>Male</TD>
<TD>Pakistan</TD>
<TD>Contry</TD>
</TR>

<TR>
<TD>3</TD>
<TD>Shahid</TD>
<TD>24</TD>
<TD>Male</TD>
<TD>Pakistan</TD>
<TD>Contry</TD>
</TR>

<TR>
<TD>4</TD>
<TD>Roy Montgome</TD>
<TD>36</TD>
<TD>Male</TD>
<TD>USA</TD>
<TD>Contry</TD>
</TR>

<TR>
<TD>5</TD>
<TD>M.Bony</TD>
<TD>18</TD>
<TD>Female</TD>
<TD>&nbsp;</TD>
<TD>Contry</TD>
</TR>
</TABLE>';


$tab = '<table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>';

$pdf=new PDF_HTML_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$pdf->WriteHTML(utf8_decode("lançamento").".<BR>". $tab ."<BR>End of the table.");
$pdf->Output();
